<main>


 <div class="mt-12 relative overflow-hidden" oncontextmenu="event.preventDefault(); return false;">
     <video src="{{ asset('front/video/Gunnebo-video.mp4') }}" class="block w-full pointer-events-none select-none" autoplay muted loop playsinline controlslist="nodownload" disablepictureinpicture draggable="false" aria-hidden="true" tabindex="-1"></video>
     <div class="absolute inset-0" aria-hidden="true"></div>
  </div>


<!--  <div class="video-container">-->
<!--  <iframe-->
<!--    src="https://www.youtube.com/embed/vfdv0__JDfM?autoplay=1&mute=1&loop=1&playlist=vfdv0__JDfM"-->
<!--    frameborder="0"-->
<!--    allow="autoplay; encrypted-media"-->
<!--    allowfullscreen>-->
<!--  </iframe>-->
<!--</div>-->


<section class="bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative">

    <!-- items-stretch instead of items-center -->
    <div class="flex flex-col lg:flex-row items-stretch gap-12">

      <!-- LEFT IMAGE WITH VIDEO OVERLAY -->
      <div class="w-full lg:w-1/2 relative">

        <div class="h-full relative">
          <img
            src="{{ asset('front/images/contact-banner.jpg') }}"
            alt="Minimax"
            class="w-full h-full object-cover"
          />


          
          <!-- Overlay -->
          {{-- <div class="absolute inset-0 flex items-center justify-center bg-black/40">
            <button
              onclick="openVideo()"
              class="relative flex items-center justify-center w-20 h-20 rounded-full bg-white/90 text-orange-600 hover:scale-110 transition"
            >
              <span class="absolute inline-flex h-full w-full rounded-full bg-white opacity-75 animate-ping"></span>
              <svg class="relative w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"/>
              </svg>
            </button>
          </div>

      --}}

      
        </div>

      </div>

      <!-- RIGHT CONTENT (Defines height) -->
      <div class="w-full lg:w-1/2 flex flex-col justify-center">

        <p class="text-sm font-bold uppercase text-slate-600 mb-3 tracking-widest">
          About Minimax
        </p>

        <h2 class="text-4xl font-bold mb-10">
          About Minimax
        </h2>
        

        <p class="mb-4 text-[15px] text-slate-600 leading-relaxed border-b-2 pb-3">
         Minimax was established as 1st Indian fire extinguisher brand in 1903 with the head office in Kolkata. Later in 1973 the brand was transferred to Steelage which was subsequently renamed as Gunnebo India Ltd in 2005. Fire Extinguishers and accessories under this brand are manufactured by Gunnebo India, at its factory in Halol, Gujarat since 2012. Halol factory is among the 8 factories of Gunnebo worldwide and it follows the highly efficient Gunnebo Operations System (GOS) which focuses on quality, delivery, cost, use of resources, health & safety and securing employee commitment to drive continuous improvement and bring value to the customers. The factory complex also houses a fully equipped lab and fire room to support continuous development and ensures consistent quality.
        </p>

        <p class="mb-4 text-[15px] text-slate-600 leading-relaxed border-b-2 pb-3">
        The Gunnebo Group has a legacy that goes back to 250 years and are global leaders in security products, services and solutions with presence across Europe, Middle East, Africa, Asia-Pacific and U.S.A. The company has been active on the Indian security market through Steelage Industries as a leading supplier of Safes and Vaults and Fire Safety Solutions. It believes in professionalism, integrity, commitment to quality, cooperation, and is committed to creating business sustainability.
        </p>

        <p class="text-[15px] text-slate-600 leading-relaxed">
          With a vision to become the leading provider of a safer future, Gunnebo specializes in providing the highest quality products, services and support to meet the growing demands of the customers.


        </p>

      </div>

    </div>
  </div>
</section>

<livewire:timeline-section />


</main>
