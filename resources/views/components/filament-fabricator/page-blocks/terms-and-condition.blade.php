@aware(['page'])

@section('head')
    <x-seo :seo="$page->seo" />
@endsection

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 bg-white relative reveal overflow-hidden">
    <div class="max-w-7xl mx-auto">
        @if ($title)
          <h2 class="font-heading text-4xl sm:text-5xl lg:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">{{ $title }}</h2>
          @endif

        @if ($description)
            <div class="prose space-y-3">{!! $description !!}</div>
        @endif
    </div>
</section>
