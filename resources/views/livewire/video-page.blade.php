<main class="bg-gray-50">

  <livewire:page-banner />

  <section class="container mx-auto py-24 px-4">
    <div class="flex flex-col md:flex-row gap-8">
     
      <!-- Left: Main Video -->
      <div class="md:w-2/3 w-full">

         <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6 leading-tight"> Video Playlist</h2>

        @if($mainVideo)
        <div class="">
          <h3 id="videoTitle" class="my-3 text-xl font-semibold">
            Now Playing: {{ $mainVideo->title }}
          </h3>
          <div class="relative" style="padding-top: 56.25%;">
            <iframe id="mainVideo"
                    class="absolute top-0 left-0 w-full h-full rounded-lg"
                    src="https://www.youtube.com/embed/{{ $mainVideo->youtube_id }}?autoplay=1&mute=1"
                    allowfullscreen>
            </iframe>
          </div>
        </div>
        @else
        <p class="text-center text-gray-500">No videos available at the moment.</p>
        @endif
      </div>

      <!-- Right: Video Thumbnails -->
      <div class="md:w-1/3 w-full mt-28">
        <div class="bg-gray-100 p-4 rounded-lg max-h-[500px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400">
          <h5 class="mb-3 font-bold text-lg">Most Watched</h5>

          @forelse($videos->where('is_most_watched', true) as $video)
          <div class="flex items-center justify-between p-3 mb-3 bg-gray-100 rounded-lg cursor-pointer transition-all duration-300 hover:bg-gray-200 {{ $mainVideo && $mainVideo->id == $video->id ? 'bg-gray-300 border-l-4 border-red-600' : '' }}"
               wire:click="setMainVideo({{ $video->id }})">
            <div class="flex-1">
              <p class="text-sm mb-0">{{ $video->title }}</p>
            </div>
            <div class="w-1/3 ml-2">
              <img src="{{ $video->thumbnail ?: 'https://i.ytimg.com/vi/' . $video->youtube_id . '/hqdefault.jpg' }}"
                   class="w-full h-auto rounded-md" alt="{{ $video->title }}">
            </div>
          </div>
          @empty
          <p class="text-gray-500 text-sm">No most watched videos available.</p>
          @endforelse

        </div>
      </div>

    </div>
  </section>

</main>



