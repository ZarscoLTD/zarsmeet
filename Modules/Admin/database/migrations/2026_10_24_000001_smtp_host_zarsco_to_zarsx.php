<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/* zarsco.com is on registrar hold: an SMTP host on it (mail.zarsco.com) no longer resolves. Same server as zarsx.in. */
return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('smtp_settings')) {
            return;
        }
        foreach (DB::table('smtp_settings')->get(['id', 'host', 'from_email']) as $row) {
            $host = preg_replace('/(^|\.)zarsco\.(com|in)$/i', '$1zarsx.in', (string) $row->host);
            $from = preg_replace('/@zarsco\.(com|in)$/i', '@zarsx.in', (string) $row->from_email);
            if ($host !== $row->host || $from !== $row->from_email) {
                DB::table('smtp_settings')->where('id', $row->id)->update(['host' => $host, 'from_email' => $from ?: null, 'updated_at' => now()]);
            }
        }
    }

    public function down(): void
    {
    }
};
