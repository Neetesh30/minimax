@section('head')
    <x-seo :seo="$seo" />
@endsection

<!-- component -->
    <main class="mt-10 bg-gray-50">
        <div class="max-w-7xl mx-auto py-24">
          <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
              style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
            <img src="{{ $post->banner_url }}" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
            <div class="p-4 absolute bottom-0 left-0 z-20">
              <a href="#"
                class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{ $post->category?->name }}</a>
              <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                {{ $post->title }}
              </h2>
              <div class="flex mt-3">
                
                <div>
                  <p class="font-semibold text-gray-200 text-sm">{{ $post->author->name }}</p>
                  <p class="font-semibold text-gray-400 text-xs"> {{ $post->published_at->format('d M Y') }} </p>
                </div>
              </div>
            </div>
          </div>
           <div class="px-4 lg:px-0 mt-12 pb-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed space-y-3">
            {!! $post->content !!}
          </div>
        </div>

        <!-- Related Post -->
        <section class="products px-12 py-16 reveal bg-gray-100">
           <div class="p-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-semibold mb-8">Related Posts</h2>

            @if($relatedPosts->count())
                <div class="swiper relatedPostsSwiper">

                     <!-- Arrows -->
                <div class="flex justify-end space-x-4 mb-5">
                    <button id="prev-testimonial" class="arrow left p-3 rounded-full border border-gray-300 text-gray-500 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </button>

                    <button id="next-testimonial" class="arrow right p-3 rounded-full border border-gray-300 text-gray-500 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>
                
                    <div class="swiper-wrapper">

                        @foreach($relatedPosts as $related)
                            <div class="swiper-slide">
                                <div class="bg-purple-100 rounded-lg overflow-hidden group">
                                    <div class="relative overflow-hidden">
                                        <img src="{{ $related->banner_url }}"
                                             alt="{{ $related->title }}"
                                             class="w-full h-60 object-cover aspect-square group-hover:scale-125 transition-all duration-300" />

                                        <div class="px-4 py-2.5 text-white text-sm font-medium tracking-wider bg-orange-500 absolute bottom-0 right-0">
                                            {{ $related->published_at->format('d M Y') }}
                                        </div>
                                    </div>

                                    <a href="{{ route('blog.details', $related->slug) }}" class="block p-6">
                                        <h3 class="text-lg font-semibold text-slate-900 mb-2">
                                            {{ $related->title }}
                                        </h3>
                                        <p class="text-[15px] text-slate-600 leading-relaxed line-clamp-2">
                                            {{ $related->excerpt }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    
                </div>
            @endif
        </div>
    </div>
        </section>


    </main>
    <!-- main ends here -->





   
