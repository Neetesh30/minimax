User-agent: *
Disallow:

@foreach ($disallowed as $path)
Disallow: {{ $path }}
@endforeach

Sitemap: {{ url('/sitemap.xml') }}
