<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicUrlRedirectTest extends TestCase
{
    public function test_cpanel_base_path_is_not_added_back_to_redirect(): void
    {
        $request = \Illuminate\Http\Request::create('https://minimax.co.in/public/about?ref=1', 'GET', [], [], [], [
            'SCRIPT_NAME' => '/public/index.php',
            'PHP_SELF' => '/public/index.php/about',
            'SCRIPT_FILENAME' => '/home/account/public_html/public/index.php',
            'THE_REQUEST' => 'GET /public/about?ref=1 HTTP/1.1',
        ]);
        $this->assertSame('/public', $request->getBaseUrl());
        $response = (new \App\Http\Middleware\RedirectPublicUrls)->handle($request, fn () => abort(500));
        $this->assertSame('/about?ref=1', $response->headers->get('Location'));
    }

    public function test_internal_public_rewrite_does_not_redirect_clean_browser_request(): void
    {
        $request = \Illuminate\Http\Request::create('/public/about', 'GET', [], [], [], [
            'THE_REQUEST' => 'GET /about HTTP/1.1',
        ]);
        $response = (new \App\Http\Middleware\RedirectPublicUrls)->handle(
            $request, fn () => new \Symfony\Component\HttpFoundation\Response('OK')
        );
        $this->assertSame(200, $response->getStatusCode());
        $this->assertFalse($response->headers->has('Location'));
    }

    public function test_audited_public_urls_redirect_to_clean_paths(): void
    {
        $file = fopen(base_path('minimax_url-audit.csv'), 'r');
        fgetcsv($file);
        $checked = 0;

        while (($row = fgetcsv($file)) !== false) {
            $path = parse_url($row[0], PHP_URL_PATH);
            if (! preg_match('#^/public(?:/|$)#', $path)) {
                continue;
            }

            $target = '/'.ltrim(substr($path, strlen('/public')), '/');
            $this->get($path)->assertStatus(301)->assertRedirect($target);
            $checked++;
        }

        fclose($file);
        $this->assertGreaterThan(0, $checked);
    }

    public function test_redirect_preserves_query_string_and_avoids_external_redirects(): void
    {
        $this->get('/public/products?category=1&page=2')
            ->assertStatus(301)->assertRedirect('/products?category=1&page=2');
        $this->get('/public//example.com')->assertRedirect('/example.com');
    }

    public function test_old_form_urls_preserve_the_request_method(): void
    {
        $this->post('/public/customer/register')->assertStatus(308)
            ->assertRedirect('/customer/register');
    }

    public function test_clean_requests_are_not_redirected(): void
    {
        $this->get('/up')->assertOk();
    }
}
