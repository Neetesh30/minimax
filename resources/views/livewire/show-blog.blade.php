
<main class="bg-gray-50">
<livewire:page-banner />


  <div class="p-4 py-24">
      <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-xl mx-auto">
          <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">Latest Blog</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-12 max-lg:max-w-3xl max-md:max-w-md mx-auto">

          @forelse($posts as $post)

          <a href="{{ route('blog.details', $post->slug) }}"
              
                 class="bg-white cursor-pointer rounded-lg overflow-hidden group relative 
                        before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-30">

                  <img src="{{ $post->banner_url }}"
                       alt="{{ $post->title }}"
                       class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />

                  <div class="bg-gradient-to-t from-black/60 via-black/60 to-transparent p-6 
                              absolute bottom-0 left-0 right-0 z-20">

                    <span class="text-sm block mb-2 text-white/80 font-semibold">
                      {{ $post->published_at->format('d M Y') }}
                 | {{ strtoupper($post->author?->name ?? 'UNKNOWN') }} 
                      | Category: {{ $post->category?->name }}
                    </span>
                    
                    <h3 class="text-xl font-semibold text-white">{{ $post->title }}</h3>
                  </div>
              </a>
          @empty
              <p class="text-center text-gray-500 col-span-3">No blog posts found.</p>
          @endforelse

        </div>

        <div class="mt-10 pagination" wire:navigate>
            {{ $posts->links() }}
        </div>

      </div>
  </div>

</main>
