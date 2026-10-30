<?php

namespace Tests\Feature;

use Tests\TestCase;

class SitemapViewTest extends TestCase
{
    public function test_sitemap_renders_valid_xml_with_escaped_urls(): void
    {
        $xml = view('seo.sitemap', ['urls' => [[
            'loc' => 'https://minimax.co.in/products/example?a=1&b=2',
            'lastmod' => '2026-10-30T00:00:00+00:00',
            'changefreq' => 'weekly',
            'priority' => '0.9',
        ]]])->render();

        $this->assertStringStartsWith('<?xml version="1.0" encoding="UTF-8"?>', $xml);
        $document = simplexml_load_string($xml);
        $this->assertNotFalse($document);
        $this->assertSame('https://minimax.co.in/products/example?a=1&b=2', (string) $document->url->loc);
    }
}
