@section('head')
    @if ($isPreview ?? false)
        <meta name="robots" content="noindex, nofollow">
    @endif
    <title>{{ $article->meta_title ?: $article->title }} | Minimax</title>
    <meta name="description" content="{{ $article->meta_description ?: $article->summary }}">
    <link rel="canonical" href="{{ route('news.details', $article->slug) }}">
@endsection

<main class="min-h-screen bg-gray-50 pt-20">
    @if ($isPreview ?? false)
        <div role="status" class="bg-orange-100 px-6 py-3 text-center text-sm font-semibold text-orange-900">
            Admin preview &middot; {{ ucfirst($article->status) }} &middot; Showing saved content
        </div>
    @endif
    <section class="bg-gray-900 px-6 py-10 text-center text-white sm:py-14" aria-labelledby="news-banner-heading">
        <h2 id="news-banner-heading" class="text-3xl font-medium uppercase tracking-wide sm:text-4xl">News</h2>
        <p class="mx-auto mt-4 max-w-3xl text-sm leading-relaxed text-gray-200">{{ $article->title }}</p>
    </section>

    <nav aria-label="Breadcrumb" class="bg-gray-800 py-4 text-xs text-gray-200">
        <ol class="mx-auto flex w-[90%] flex-wrap items-center gap-2">
            <li><a href="{{ route('home') }}" class="hover:text-white hover:underline">Home</a></li>
            <li aria-hidden="true">&rsaquo;</li>
            <li><a href="{{ route('news') }}" class="hover:text-white hover:underline">News</a></li>
            <li aria-hidden="true">&rsaquo;</li>
            <li aria-current="page" class="text-orange-300">{{ $article->title }}</li>
        </ol>
    </nav>

    <article class="mx-auto w-[90%] pt-10 pb-12 sm:pt-14">
        <div class="flex flex-wrap items-center gap-3 text-sm font-semibold text-gray-600">
            @if ($article->article_category)
                <span>{{ $article->article_category }}</span>
                <span aria-hidden="true">|</span>
            @endif
            @if ($article->published_at)
                <time datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->format('D jS F Y') }}</time>
            @else
                <span>Not yet published</span>
            @endif
            <span aria-hidden="true" class="h-px w-20 bg-gray-300"></span>
        </div>
        <h1 class="mt-4 text-3xl font-medium leading-tight text-gray-900 sm:text-4xl lg:text-5xl">{{ $article->title }}</h1>
        @if ($article->sub_title)
            <p class="mt-4 text-xl text-gray-600">{{ $article->sub_title }}</p>
        @endif
        @if ($article->author)
            <p class="mt-4 text-sm text-gray-600">By {{ $article->author }}</p>
        @endif
        <img
            src="{{ $article->cover_image ? \Illuminate\Support\Facades\Storage::disk('public')->url($article->cover_image) : asset('front/images/minimax-logo.png') }}"
            alt="{{ $article->cover_image ? ($article->cover_image_alt ?? '') : 'Minimax' }}"
            class="my-8 w-full bg-white {{ $article->cover_image ? 'h-auto' : 'aspect-[5/2] object-contain p-10' }}"
            data-fallback="{{ asset('front/images/minimax-logo.png') }}"
            onerror="this.onerror = null; this.src = this.dataset.fallback; this.alt = 'Minimax'; this.style.objectFit = 'contain'; this.style.aspectRatio = '5 / 2'; this.style.padding = '2.5rem';"
        >
        @if (
            $article->article_link &&
            in_array(strtolower(parse_url($article->article_link, PHP_URL_SCHEME) ?? ''), ['http', 'https'], true)
        )
            <p class="mt-5 break-words text-sm text-gray-600">
                <span class="font-semibold text-orange-600">Article link:</span>
                <a href="{{ $article->article_link }}" target="_blank" rel="noopener noreferrer" class="underline decoration-gray-300 underline-offset-4 hover:text-orange-600">
                    {{ $article->article_link }}<span class="sr-only"> (opens in a new tab)</span>
                </a>
            </p>
        @endif
        <div class="mt-8 break-words text-base leading-8 text-gray-700 [&_p]:mb-6 [&_h2]:mt-10 [&_h2]:mb-4 [&_h2]:text-2xl [&_h2]:font-bold [&_h3]:mt-8 [&_h3]:mb-3 [&_h3]:text-xl [&_h3]:font-bold [&_ul]:mb-6 [&_ul]:list-disc [&_ul]:pl-6 [&_ol]:mb-6 [&_ol]:list-decimal [&_ol]:pl-6 [&_a]:text-orange-600 [&_a]:underline [&_blockquote]:border-l-4 [&_blockquote]:border-orange-600 [&_blockquote]:pl-5 [&_img]:max-w-full">
            {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make($article->body)->toHtml() !!}
        </div>
        <nav aria-label="News navigation" class="mt-12 border-t border-gray-200 pt-6">
            @if ($previousArticle || $nextArticle)
                <div class="mb-8 grid grid-cols-2 gap-4">
                    <div>
                        @if ($previousArticle)
                            <a href="{{ route('news.details', $previousArticle->slug) }}" rel="prev" class="inline-flex flex-col gap-2 rounded border border-orange-600 px-5 py-3 text-orange-600 transition hover:bg-orange-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-orange-600">
                                <span class="text-sm font-semibold">&larr; Previous article</span>
                                <span class="text-sm text-gray-600">{{ $previousArticle->title }}</span>
                            </a>
                        @endif
                    </div>
                    <div class="text-right">
                        @if ($nextArticle)
                            <a href="{{ route('news.details', $nextArticle->slug) }}" rel="next" class="inline-flex flex-col gap-2 rounded border border-orange-600 px-5 py-3 text-orange-600 transition hover:bg-orange-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-orange-600">
                                <span class="text-sm font-semibold">Next article &rarr;</span>
                                <span class="text-sm text-gray-600">{{ $nextArticle->title }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            @endif
            <a href="{{ route('news') }}" class="text-sm font-semibold text-orange-600 hover:underline">&larr; Back to all news</a>
        </nav>
    </article>

    <section class="mx-auto w-[90%] pb-16" aria-labelledby="news-contact-heading">
        <div class="flex flex-col gap-6 border-t-2 border-orange-600 bg-white p-8 shadow-md sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-orange-600">Contact us</p>
                <h2 id="news-contact-heading" class="mt-3 text-3xl font-medium leading-tight text-gray-900">Got a question?<br>We're here to help</h2>
            </div>
            <a href="{{ route('enquiry') }}" class="inline-flex self-start rounded bg-orange-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-orange-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-orange-600">Contact us</a>
        </div>
    </section>
</main>
