<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Authentication\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Task 3.1 - "/" redirects based on authentication status instead of
     * showing Laravel's default welcome page.
     */
    public function test_visitors_see_the_product_website(): void
    {
        // owner 2026-11-13: sales pages and pricing like Teams for visitors; the app itself needs a sign-in
        $this->get('/')->assertOk()->assertSee('in one app', false)->assertSee('Start free');
        $this->get('/features')->assertOk()->assertSee('Live captions and recording');
        $this->get('/pricing')->assertOk()->assertSee('Business Standard')->assertSee('₹79', false);
        $this->get('/download')->assertOk()->assertSee('download.php?p=ZARSX-Meet', false);
        $this->get('/sitemap.xml')->assertOk()->assertSee(url('/pricing'));
    }

    public function test_authenticated_users_are_redirected_to_chat(): void
    {
        $user = User::factory()->create(['status' => 'active', 'email_verified_at' => now()]);

        $this->actingAs($user, 'web')->get('/')->assertRedirect(route('chat.index'));
    }
}
