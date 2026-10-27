@section('head')
    <title>{{ $articles->total() === 0 ? 'News - Coming Soon | Minimax' : 'News | Minimax' }}</title>
    <meta name="description" content="{{ $articles->total() === 0 ? 'Minimax news and announcements are coming soon. Check back for our latest updates.' : 'Latest news and announcements from Minimax.' }}">
    <link rel="canonical" href="{{ route('news') }}">
@endsection

<main class="bg-gray-50">
    @if ($articles->total() === 0)
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
    @else
    <section class="min-h-screen pt-24 pb-16" aria-labelledby="news-heading">
    <div class="mx-auto max-w-screen-2xl px-6 lg:px-12">
        <header class="sr-only">
            <h1 id="news-heading" class="text-4xl font-bold text-gray-900">
                Latest News
            </h1>
            <p class="mt-4 text-lg text-gray-600">
                News and announcements from Minimax.
            </p>
        </header>

        <div class="space-y-10 lg:space-y-14">
            @forelse ($articles as $article)
                <article
                    wire:key="news-{{ $article->id }}"
                    class="flex flex-col overflow-hidden bg-white shadow-lg md:flex-row"
                >
                        <div class="shrink-0 border-4 border-orange-600 bg-white md:w-1/3">
                        <img
                            src="{{ $article->cover_image ? \Illuminate\Support\Facades\Storage::disk('public')->url($article->cover_image) : asset('front/images/minimax-logo.png') }}"
                            alt="{{ $article->cover_image ? ($article->cover_image_alt ?? '') : 'Minimax' }}"
                            class="aspect-[5/3] h-full w-full {{ $article->cover_image ? 'object-cover' : 'object-contain p-10' }}"
                            data-fallback="{{ asset('front/images/minimax-logo.png') }}"
                            onerror="this.onerror = null; this.src = this.dataset.fallback; this.alt = 'Minimax'; this.style.objectFit = 'contain'; this.style.padding = '2.5rem';"
                            loading="lazy"
                        >
                        </div>

                    <div class="min-w-0 flex-1 p-6 lg:px-8 lg:py-5">
                        <div class="flex items-center gap-4">
                        <time
                            datetime="{{ $article->published_at->toIso8601String() }}"
                            class="text-sm font-semibold text-gray-900 sm:text-base"
                        >
                            {{ $article->published_at->format('D jS F Y') }}
                        </time>
                        <span aria-hidden="true" class="h-px w-24 bg-gray-300"></span>
                        </div>

                        <h2 class="mt-4 text-2xl font-medium leading-snug text-gray-900 lg:text-3xl">
                            {{ $article->title }}
                        </h2>

                        @if ($article->article_category)
                            <p class="mt-4 text-base font-semibold text-gray-600">
                                {{ $article->article_category }}
                            </p>
                        @endif


                        @if ($article->summary)
                            <p class="mt-4 leading-relaxed text-gray-600">
                                {{ $article->summary }}...
                            </p>
                        @endif

                        @if ($article->author)
                            <p class="mt-4 text-sm text-gray-500">
                                By {{ $article->author }}
                            </p>
                        @endif

                            <a
                                href="{{ route('news.details', $article->slug) }}"
                                class="mt-6 inline-flex items-center justify-center rounded-md border border-orange-600 px-8 py-3 text-sm font-medium uppercase tracking-wide text-orange-600 transition hover:bg-orange-600 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-orange-600"
                            >
                                Read more
                            </a>
                    </div>
                </article>
            @empty
                <p class="col-span-full py-16 text-center text-gray-600">
                    No news articles are available yet. Check back soon.
                </p>
            @endforelse
        </div>

        @if ($articles->hasPages())
            <div class="mt-12">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
    </section>
    @endif
</main>
