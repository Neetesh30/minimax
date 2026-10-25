@section('head')
    <title>News - Coming Soon | Minimax</title>
    <meta name="description" content="Minimax news and announcements are coming soon. Check back for our latest updates.">
    <link rel="canonical" href="{{ route('news') }}">
@endsection

<main class="bg-gray-50">
    <section class="mt-16 flex min-h-[60vh] items-center justify-center px-6 py-24" aria-labelledby="news-heading">
        <div class="mx-auto max-w-2xl text-center">
            <p class="mb-4 text-sm font-semibold uppercase tracking-widest text-orange-600">Minimax News</p>
            <h1 id="news-heading" class="mb-6 text-4xl font-extrabold text-gray-900 sm:text-6xl">Coming soon</h1>
            <p class="mx-auto max-w-lg text-lg leading-relaxed text-gray-600">
                Our latest news and announcements will be here soon. Check back for updates from Minimax.
            </p>
            <a href="{{ route('home') }}" class="mt-10 inline-flex rounded-full bg-orange-600 px-8 py-3 font-semibold text-white transition hover:bg-orange-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-orange-600">
                Back to home
            </a>
        </div>
    </section>
</main>
