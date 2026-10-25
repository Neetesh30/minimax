<main>
    <section class="py-16 bg-gray-50 reveal">
  <div class="max-w-7xl mx-auto px-6">

    <p class="blue text-sm font-bold uppercase mb-3 tracking-widest">Testimonials</p>
    <h2 class="text-4xl font-bold mb-10">What Our Clients Say</h2>

    <div id="testimonial-slider" class="swiper-container">
      <div class="swiper-wrapper">

        @foreach($testimonials as $testimonial)
        <div class="swiper-slide px-3 sm:px-4">
  <div class="bg-white border border-gray-200 rounded-lg p-8 md:p-10 hover:shadow-md transition duration-300">

    {{-- Rating --}}
    <div class="flex mb-4 text-yellow-500 text-sm">
      @for($i=1; $i<=5; $i++)
        <!--<i class="fas fa-star {{ $i <= $testimonial->rating ? '' : 'opacity-20' }}"></i>-->
         <i class="pr-2 fas fa-star {{ $i <= $testimonial->rating }}"></i>
      @endfor
    </div>

    {{-- Message --}}
    <p class="text-gray-700 leading-relaxed mb-8 text-sm">
      {{ $testimonial->message }}
    </p>

    <div class="border-t border-gray-100 pt-6 flex items-center gap-4">
      {{-- Avatar --}}
      <img
        src="{{ $testimonial->image 
          ? asset('storage/'.$testimonial->image) 
          : asset('front/images/placeholder.png') }}"
        class="w-14 h-14 rounded-md object-cover"
      />

      {{-- Client Info --}}
      <div>
        <p class="text-gray-900 font-semibold text-sm">
          {{ $testimonial->name }}
        </p>

        <p class="text-gray-500 text-xs tracking-wide">
          {{ $testimonial->designation }}
          <br>
          @if($testimonial->company)
            <small> {{ $testimonial->company }} </small>
          @endif
        </p>
      </div>

    </div>

  </div>
</div>
        @endforeach

      </div>
    </div>

  </div>
</section>

</main>
