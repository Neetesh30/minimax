
@props(['seo'])

<title>{{ $seo['title'] ?? config('app.name') }}</title>

<link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">

<meta name="description" content="{{ $seo['description'] ?? '' }}">
<meta name="keywords" content="{{ $seo['keywords'] ?? '' }}">

<meta property="og:title" content="{{ $seo['title'] ?? '' }}">
<meta property="og:description" content="{{ $seo['description'] ?? '' }}">
<meta property="og:image" content="{{ isset($seo['og_image']) ? asset('storage/'.$seo['og_image']) : '' }}">

<meta name="twitter:card" content="summary_large_image">

@if(!empty($seo['schema']))
<script type="application/ld+json">
{!! json_encode($seo['schema'], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
</script>
@endif
