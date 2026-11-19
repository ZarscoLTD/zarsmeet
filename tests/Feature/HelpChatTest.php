<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/** The ZARS help chat on Meet (owner 2026-11-19: on every product): the script from Insights, allowed by the CSP, nothing else. */
class HelpChatTest extends TestCase
{
    use RefreshDatabase;

    public function test_website_pages_carry_the_help_chat_and_the_csp_allows_only_insights(): void
    {
        config(['services.insights.url' => 'https://insights.zarsx.in']);
        $r = $this->get('/features')->assertOk();
        $r->assertSee('https://insights.zarsx.in/zx/helpbot.js', false);
        $r->assertSee('data-product="meet"', false);
        $csp = (string) $r->headers->get('Content-Security-Policy');
        $this->assertStringContainsString("script-src 'self' 'unsafe-inline' 'wasm-unsafe-eval' https://insights.zarsx.in;", $csp);
        $this->assertStringContainsString('https://fcmregistrations.googleapis.com https://insights.zarsx.in;', $csp);
        $this->assertStringNotContainsString('*', $csp);
    }
}
