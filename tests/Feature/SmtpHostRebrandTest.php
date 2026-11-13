<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SmtpHostRebrandTest extends TestCase
{
    use RefreshDatabase;

    public function test_smtp_host_on_the_held_zarsco_domain_moves_to_zarsx(): void
    {
        DB::table('smtp_settings')->delete();
        DB::table('smtp_settings')->insert(['host' => 'mail.zarsco.com', 'port' => 465, 'encryption' => 'ssl', 'from_email' => 'noreply@zarsco.com', 'created_at' => now(), 'updated_at' => now()]);
        (require base_path('Modules/Admin/database/migrations/2026_10_24_000001_smtp_host_zarsco_to_zarsx.php'))->up();
        $row = DB::table('smtp_settings')->first();
        $this->assertSame(['mail.zarsx.in', 'noreply@zarsx.in'], [$row->host, $row->from_email]);

        // the updater changes the same key in .env
        require_once base_path('deploy/lib/DeployEnv.php');
        require_once base_path('deploy/lib/EnvTools.php');
        $env = tempnam(sys_get_temp_dir(), 'env');
        file_put_contents($env, "MAIL_HOST=mail.zarsco.com\nMAIL_PORT=465\nDB_HOST=db.zarsco.com\n");
        \Deploy\EnvTools::rebrand($env, (array) require base_path('deploy/env-rebrand.php'));
        $this->assertMatchesRegularExpression('/^MAIL_HOST="?mail\.zarsx\.in"?$/m', file_get_contents($env));
        $this->assertStringContainsString('DB_HOST=db.zarsco.com', file_get_contents($env)); // database settings untouched
        @unlink($env);
    }

    public function test_mail_account_hosts_on_zarsco_move_to_zarsx(): void
    {
        $u = \Modules\Authentication\Models\User::factory()->create(['status' => 'active', 'email_verified_at' => now()]);
        $acc = \Modules\Mailbox\Models\MailAccount::create(['user_id' => $u->id, 'kind' => 'imap', 'provider' => 'other', 'email' => 'info@zarsco.com',
            'imap_host' => 'mail.zarsco.com', 'imap_port' => 993, 'imap_security' => 'ssl', 'smtp_host' => 'mail.zarsco.com', 'smtp_port' => 465, 'smtp_security' => 'ssl']);
        $gmail = \Modules\Mailbox\Models\MailAccount::create(['user_id' => $u->id, 'kind' => 'imap', 'provider' => 'other', 'email' => 'a@gmail.com',
            'imap_host' => 'imap.gmail.com', 'smtp_host' => 'smtp.gmail.com']);
        (require base_path('Modules/Mailbox/database/migrations/2026_10_24_120000_mail_account_hosts_to_zarsx.php'))->up();
        $this->assertSame(['mail.zarsx.in', 'mail.zarsx.in'], [$acc->fresh()->imap_host, $acc->fresh()->smtp_host]);
        $this->assertSame('smtp.gmail.com', $gmail->fresh()->smtp_host);
        $this->assertSame('zarsx.in', \Modules\Mailbox\Services\Mailbox::host('zarsco.in'));
        $this->assertSame('mail.notzarsco.com', \Modules\Mailbox\Services\Mailbox::host('mail.notzarsco.com'));
    }
}
