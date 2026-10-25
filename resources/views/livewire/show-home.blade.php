<main>
    <div class="custom-hero-slider mt-12 w-full sm:h-80 md:h-96  lg:h-[640px] xl:h-[640px]">
        <div class="swiper-wrapper">
            
        @forelse ($homeBanners as $banner)
            <div
                class="swiper-slide relative overflow-hidden"
                wire:key="home-banner-{{ $banner->id }}"
            >
                <img
                    src="{{ asset('storage/' . $banner->image) }}"
                    alt="Minimax home banner {{ $loop->iteration }}"
                    class="w-full"
                >
            </div>
        @empty
            <div class="swiper-slide relative overflow-hidden" wire:key="home-banner-fallback">
                <img
                    src="{{ asset('front/images/Banner 1.jpg.jpeg') }}"
                    alt="Minimax fire safety products"
                    class="w-full"
                >
            </div>
        @endforelse

            
            <!--<div class="swiper-slide slide-bg slide-7 h-full relative">-->
            <!--    <div class="absolute inset-0 bg-black opacity-20"></div>-->
               
            <!--</div>-->
            
            <!-- <div class="swiper-slide slide-bg slide-8 h-full relative">-->
            <!--    <div class="absolute inset-0 bg-black opacity-20"></div>-->
               
            <!--</div>-->
            
            <!-- <div class="swiper-slide slide-bg slide-9 h-full relative">-->
            <!--    <div class="absolute inset-0 bg-black opacity-20"></div>-->
               
            <!--</div>-->

            <!--<div class="swiper-slide slide-bg slide-4 h-full relative">-->
            <!--    <div class="absolute inset-0 bg-black opacity-40"></div>-->
            <!--    <div class="relative flex items-center h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">-->
            <!--        <div>-->
            <!--            <p-->
            <!--                class="bg-yellow-light px-5 py-2 animated-text animate-slide-in-up delay-1 backdrop-blur-md uppercase border border-white/30 shadow-lg cursor-pointer inline-block px-3 py-1 text-sm font-semibold rounded-full mb-4">-->
            <!--                Pioneering Safety Since 1903-->
            <!--            </p>-->

            <!--            <h1-->
            <!--                class="animated-text animate-slide-in-up delay-2 text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight mb-4">-->
            <!--                Less Water <br>Less Damage-->
            <!--            </h1>-->

            <!--            <p-->
            <!--                class="animated-text animate-slide-in-up delay-3 max-w-xl text-lg sm:text-xl mb-8 font-light">-->
            <!--                More Protection  That’s CAFS-->
            <!--            </p>-->

            <!--            <div class="flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4 w-full">-->
            <!--              <button-->
            <!--                  class="oranges w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white cursor-pointer animate-slide-in-up delay-1">-->
            <!--                 <a href="{{ route('products') }}"> See All Products </a>-->
            <!--              </button>-->

            <!--              <button-->
            <!--                  class="w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white backdrop-blur-md bg-white/10 border border-white/30 shadow-lg cursor-pointer animate-slide-in-up delay-2">-->
            <!--                  Enquire Now-->
            <!--              </button>-->

            <!--          </div>-->


            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div class="swiper-slide slide-bg slide-5 h-full relative">-->
            <!--    <div class="absolute inset-0 bg-black opacity-20"></div>-->
            <!--    <div class="relative flex items-center h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">-->
            <!--        <div>-->
            <!--            <p-->
            <!--                class="bg-yellow-light px-5 py-2 animated-text animate-slide-in-up delay-1 backdrop-blur-md uppercase border border-white/30 shadow-lg cursor-pointer inline-block px-3 py-1 text-sm font-semibold rounded-full mb-4">-->
            <!--                Pioneering Safety Since 1903-->
            <!--            </p>-->

            <!--            <h1-->
            <!--                class="animated-text animate-slide-in-up delay-2 text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight mb-4">-->
            <!--                Automatic Activation  <br>For Unmanned Areas-->
            <!--            </h1>-->

            <!--            <p-->
            <!--                class="animated-text animate-slide-in-up delay-3 max-w-xl text-lg sm:text-xl mb-8 font-light">-->
            <!--                Dry Powder Ceiling Mounted Fire Extinguisher-->
            <!--            </p>-->

            <!--            <div class="flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4 w-full">-->
            <!--              <button-->
            <!--                  class="oranges w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white cursor-pointer animate-slide-in-up delay-1">-->
            <!--                  See All Products-->
            <!--              </button>-->

            <!--              <button-->
            <!--                  class="w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white backdrop-blur-md bg-white/10 border border-white/30 shadow-lg cursor-pointer animate-slide-in-up delay-2">-->
            <!--                  Enquire Now-->
            <!--              </button>-->

            <!--          </div>-->


            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!-- <div class="swiper-slide slide-bg slide-6 h-full relative">-->
            <!--    <div class="absolute inset-0 bg-black opacity-20"></div>-->
            <!--    <div class="relative flex items-center h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">-->
            <!--        <div>-->
            <!--            <p-->
            <!--                class="bg-yellow-light px-5 py-2 animated-text animate-slide-in-up delay-1 backdrop-blur-md uppercase border border-white/30 shadow-lg cursor-pointer inline-block px-3 py-1 text-sm font-semibold rounded-full mb-4">-->
            <!--                Pioneering Safety Since 1903-->
            <!--            </p>-->

            <!--            <h1-->
            <!--                class="animated-text animate-slide-in-up delay-2 text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight mb-4">-->
            <!--                Invest in Safety   <br>Invest in Minimax-->
            <!--            </h1>-->

            <!--            <p-->
            <!--                class="animated-text animate-slide-in-up delay-3 max-w-xl text-lg sm:text-xl mb-8 font-light">-->
            <!--                Dry Powder Ceiling Mounted Fire Extinguisher-->
            <!--            </p>-->

            <!--            <div class="flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4 w-full">-->
            <!--              <button-->
            <!--                  class="oranges w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white cursor-pointer animate-slide-in-up delay-1">-->
            <!--                  See All Products-->
            <!--              </button>-->

            <!--              <button-->
            <!--                  class="w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white backdrop-blur-md bg-white/10 border border-white/30 shadow-lg cursor-pointer animate-slide-in-up delay-2">-->
            <!--                  Enquire Now-->
            <!--              </button>-->

            <!--          </div>-->


            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div class="swiper-slide slide-bg slide-1 h-full relative">-->
            <!--    <div class="absolute inset-0 bg-black opacity-20"></div>-->
            <!--    <div class="relative flex items-center h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">-->
            <!--        <div>-->
            <!--            <p-->
            <!--                class="bg-yellow-light px-5 py-2 animated-text animate-slide-in-up delay-1 backdrop-blur-md uppercase border border-white/30 shadow-lg cursor-pointer inline-block px-3 py-1 text-sm font-semibold rounded-full mb-4">-->
            <!--                Pioneering Safety Since 1902-->
            <!--            </p>-->

            <!--            <h1-->
            <!--                class="animated-text animate-slide-in-up delay-2 text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight mb-4">-->
            <!--                India’s Trusted  <br>Fire Safety Solutions-->
            <!--            </h1>-->

            <!--            <p-->
            <!--                class="animated-text animate-slide-in-up delay-3 max-w-xl text-lg sm:text-xl mb-8 font-light">-->
            <!--                Protecting lives and assets with cutting-edge fire suppression technology.-->
            <!--            </p>-->

            <!--            <div class="flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4 w-full">-->
            <!--              <button-->
            <!--                  class="oranges w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white cursor-pointer animate-slide-in-up delay-1">-->
            <!--                  See All Products-->
            <!--              </button>-->

            <!--              <button-->
            <!--                  class="w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white backdrop-blur-md bg-white/10 border border-white/30 shadow-lg cursor-pointer animate-slide-in-up delay-2">-->
            <!--                  Enquire Now-->
            <!--              </button>-->

            <!--          </div>-->


            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!-- <div class="swiper-slide slide-bg slide-2 h-full relative">-->
            <!--    <div class="absolute inset-0 bg-black opacity-20"></div>-->

            <!--    <div class="relative flex items-center h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">-->
            <!--        <div>-->
            <!--            <p-->
            <!--                class="bg-yellow-light px-5 py-2 animated-text animate-slide-in-up delay-1 backdrop-blur-md uppercase border border-white/30 shadow-lg cursor-pointer inline-block px-3 py-1 text-sm font-semibold rounded-full mb-4">-->
            <!--                Pioneering Safety Since 1903-->
            <!--            </p>-->

            <!--            <h1-->
            <!--                class="animated-text animate-slide-in-up delay-2 text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight mb-4">-->
            <!--               Pioneers in Fire Safety <br>Since 1903-->
            <!--            </h1>-->

            <!--            <p-->
            <!--                class="animated-text animate-slide-in-up delay-3 max-w-xl text-lg sm:text-xl mb-8 font-light">-->
            <!--                Protecting lives and assets with cutting-edge fire suppression technology.-->
            <!--            </p>-->

            <!--            <div class="flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4 w-full">-->
            <!--              <button-->
            <!--                  class="oranges w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white cursor-pointer animate-slide-in-up delay-1">-->
            <!--                  See All Products-->
            <!--              </button>-->

            <!--              <button-->
            <!--                  class="w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white backdrop-blur-md bg-white/10 border border-white/30 shadow-lg cursor-pointer animate-slide-in-up delay-2">-->
            <!--                  Enquire Now-->
            <!--              </button>-->

            <!--          </div>-->


            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!-- <div class="swiper-slide slide-bg slide-3 h-full relative">-->
            <!--    <div class="absolute inset-0 bg-black opacity-20"></div>-->

            <!--    <div class="relative flex items-center h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">-->
            <!--        <div>-->
            <!--            <p-->
            <!--                class="bg-yellow-light px-5 py-2 animated-text animate-slide-in-up delay-1 backdrop-blur-md uppercase border border-white/30 shadow-lg cursor-pointer inline-block px-3 py-1 text-sm font-semibold rounded-full mb-4">-->
            <!--                Pioneering Safety Since 1903-->
            <!--            </p>-->

            <!--            <h1-->
            <!--                class="animated-text animate-slide-in-up delay-2 text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight mb-4">-->
            <!--                Sustainable Safety <br>For A Safer Tomorrow-->
            <!--            </h1>-->

            <!--            <p-->
            <!--                class="animated-text animate-slide-in-up delay-3 max-w-xl text-lg sm:text-xl mb-8 font-light">-->
            <!--                Protecting lives and assets with cutting-edge fire suppression technology.-->
            <!--            </p>-->

            <!--            <div class="flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4 w-full">-->
            <!--              <button-->
            <!--                  class="oranges w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white cursor-pointer animate-slide-in-up delay-1">-->
            <!--                  See All Products-->
            <!--              </button>-->

            <!--              <button-->
            <!--                  class="w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full text-white backdrop-blur-md bg-white/10 border border-white/30 shadow-lg cursor-pointer animate-slide-in-up delay-2">-->
            <!--                  Enquire Now-->
            <!--              </button>-->

            <!--          </div>-->


            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

        </div>
        
        <div class="swiper-button-next custom-next-arrow text-white">
           <span class="text-3xl font-bold opacity-70 hover:opacity-100 transition-opacity">→</span>
        </div>
          <div class="swiper-button-prev custom-prev-arrow text-white">
              <span class="text-3xl font-bold opacity-70 hover:opacity-100 transition-opacity">←</span>
          </div>
    
         <div class="swiper-pagination custom-pagination"></div>
    </div>


 <!-- 2. MINIMAX ABOUT SECTION -->

  <section class="bg-gray-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative reveal overflow-hidden">
          
          <!-- Abstract Background Shapes (Z-index 10) -->
          <div class="abstract-shape absolute top-1/4 -right-10 w-96 h-96 rounded-3xl hidden md:block rotate-12"></div>
          <div class="abstract-shape absolute top-1/2 right-1/4 w-72 h-72 rounded-full hidden md:block -rotate-6"></div>
          <div class="abstract-shape absolute -bottom-10 right-20 w-80 h-80 rounded-2xl hidden md:block rotate-45"></div>

          <!-- Main Content Grid (Z-index 20) -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-12 relative z-20">

              <!-- A. LEFT COLUMN: Text and Certification -->
              <div class="flex flex-col justify-start">
                  <p class="blue text-sm font-semibold font-bold uppercase mb-3 tracking-widest">About Minimax</p>
                  
                  <h2 class="font-heading text-4xl sm:text-5xl lg:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                      A Legacy of Trust & Innovation in Fire Safety
                  </h2>
                  
                  <p class="text-md text-gray-600 mb-8 max-w-lg scrolling-text">
                      For over 120 years, Minimax has been a name India trusts in fire safety. Established in 1903 as India’s first fire extinguisher brand, Minimax has continually evolved to meet the changing risks of homes, businesses and industries. Today, our portfolio goes beyond fire extinguishers to advanced automatic suppression systems, hydrant solutions and specialised fire protection technologies. Manufactured by Gunnebo India at its Halol facility, our solutions bring together decades of experience, rigorous quality standards and continuous innovation — protecting people, property and businesses when it matters most.
                  </p>
                  
                  <!-- Certified Excellence Badge -->
                  <div class="flex items-center space-x-3 mb-10">
                      {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <div>
                          <p class="font-bold text-gray-900 uppercase tracking-wider text-sm">Certified Excellence</p>
                          <p class="text-sm text-gray-500">ISO 9001:2015 Certified Manufacturing</p>
                      </div> --}}

                      <img src="{{ asset('front/images/iso-certified-removebg-preview.png') }}" alt="">
                  </div>

                  <!-- Read History Link -->
                  <a href="{{ route('about') }}" class="blue font-semibold flex items-center space-x-2 group hover:text-red-700 transition duration-150">
                      <span>Read More About Minimax</span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:translate-x-1 transition duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                      </svg>
                  </a>
              </div>

              <!-- B. RIGHT COLUMN: Metrics and Stats -->
              <div class="self-start h-fit grid grid-cols-2 gap-6 px-4 py-4 md:py-32">

                  <!-- Stat Card 1: 120+ Years -->
                  <div class="col-span-2 md:col-span-1 bg-black text-white p-8 rounded-2xl shadow-xl transform hover:scale-[1.02] transition duration-300 text-center">
                    <!-- Stat Card 1 -->
                      <p class="text-5xl text-yellow-400 font-bold mb-2 odometer plus" data-count="120">0</p>
                      <span class="text-5xl text-yellow-400 font-bold">+</span>
                      <p class="text-sm text-white uppercase font-semibold"> Years Of Legacy</p>
                  </div>


                    <!-- Stat Card 3: 24/7 Support (Full width on small screens) -->
                  <div class="col-span-2 md:col-span-1 bg-white p-8 rounded-2xl shadow-lg border border-gray-100 transform hover:scale-[1.02] transition duration-300 text-center">
                      <!-- Stat Card 3 -->
                      <p class="text-5xl font-bold mb-2 text-red-600 odometer" data-count="50">0</p>
                      <span class="text-5xl text-red-600 font-bold">+</span>
                      <p class="text-sm text-gray-700 uppercase font-semibold">PAN India Authorized Dealers</p>
                  </div>

                  <!-- Stat Card 4: 100% Satisfaction (Full width on small screens) -->
                  <div class="col-span-2 md:col-span-1 bg-white p-8 pt-8 rounded-2xl shadow-lg border border-gray-100 transform hover:scale-[1.02] transition duration-300 text-center pt-3">
                      <!-- Stat Card 4 -->
                      <p class="text-5xl font-bold  text-orange-600 odometer" data-count="10" style="margin-top:-1.4rem">0</p>
                        <span class="text-5xl font-bold text-orange-600">M+</span>
                      <p class="text-sm text-gray-700 uppercase font-semibold">Client Site Secured</p>
                  </div>


                  <!-- Stat Card 2: 50k+ Projects (Full width on small screens) -->
                  <div class="col-span-2 md:col-span-1 bg-bluee text-white p-8 rounded-2xl shadow-xl transform hover:scale-[1.02] transition duration-300 text-center">
                    <!-- Stat Card 2 -->
                      <p class="text-5xl font-bold mb-2 odometer plus" data-count="360">0</p>
                      <span class="text-5xl text-white-400 font-bold">°</span>
                      <p class="text-sm  inline-block px-2 py-0.5 rounded uppercase font-semibold">Pan India Sales & Regional Presence</p>
                  </div>

              </div>

          </div>
        </div>

    </section>

  <!-- PRODUCTS -->
  <section class="products px-12 py-8 reveal bg-gray-50">

        <!-- Livewire Slider -->
        <livewire:category-slider :ids="[45,15,10,22,16,18,51]" />
           
  </section>

  <!-- INDUSTRIES -->
  <livewire:industries-section />



  {{-- <section class="p-8 lg:p-16 bg-gray-50 reveal">
      <p class="blue text-sm font-semibold font-bold uppercase mb-3 tracking-widest">Testimonials</p>
      <h2 class="text-4xl font-bold mb-10">What Our Clients Say</h2>

      <div class="flex flex-col lg:flex-row gap-10">

        <div class="lg:w-1/2">
          <div id="testimonial-slider" class="swiper-container">
            <div class="swiper-wrapper">
              
              <div class="swiper-slide p-8 bg-white rounded-lg shadow-xl relative overflow-hidden">
                <div class="absolute top-4 right-4 text-9xl font-serif text-gray-200 opacity-60">”</div>
                
                <div class="flex text-yellow-500 mb-4">
                  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279L12 18.896l-7.416 3.917 1.48-8.279L.01 9.306l8.332-1.151z"/></svg>
                  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279L12 18.896l-7.416 3.917 1.48-8.279L.01 9.306l8.332-1.151z"/></svg>
                  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279L12 18.896l-7.416 3.917 1.48-8.279L.01 9.306l8.332-1.151z"/></svg>
                  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279L12 18.896l-7.416 3.917 1.48-8.279L.01 9.306l8.332-1.151z"/></svg>
                  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279L12 18.896l-7.416 3.917 1.48-8.279L.01 9.306l8.332-1.151z"/></svg>
                </div>
                
                <p class="text-gray-700 text-lg mb-6 leading-relaxed z-10 relative">
                  "Minimax provided an **exceptional fire safety solution** for our new manufacturing unit. Their team's technical expertise and prompt service are **unmatched in the industry**."
                </p>
                
                <div class="flex items-center">
                
                  <div>
                    <p class="font-bold text-gray-900">Rajesh Kumar</p>
                    <p class="text-sm text-gray-500">Plant Manager, **Tata Steel**</p>
                  </div>
                </div>
              </div>

              <div class="swiper-slide p-8 bg-white rounded-lg shadow-xl relative overflow-hidden">
                <div class="absolute top-4 right-4 text-9xl font-serif text-gray-200 opacity-60">”</div>
                
                <div class="flex text-yellow-500 mb-4">
                  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279L12 18.896l-7.416 3.917 1.48-8.279L.01 9.306l8.332-1.151z"/></svg>
                  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279L12 18.896l-7.416 3.917 1.48-8.279L.01 9.306l8.332-1.151z"/></svg>
                  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279L12 18.896l-7.416 3.917 1.48-8.279L.01 9.306l8.332-1.151z"/></svg>
                  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279L12 18.896l-7.416 3.917 1.48-8.279L.01 9.306l8.332-1.151z"/></svg>
                  <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279L12 18.896l-7.416 3.917 1.48-8.279L.01 9.306l8.332-1.151z"/></svg>
                </div>
                
                <p class="text-gray-700 text-lg mb-6 leading-relaxed z-10 relative">
                  "Minimax provided an **exceptional fire safety solution** for our new manufacturing unit. Their team's technical expertise and prompt service are **unmatched in the industry**."
                </p>
                
                <div class="flex items-center">
                  <!-- <img src="/placeholder.jpg" alt="Rajesh Kumar" class="w-14 h-14 rounded-full object-cover mr-4 ring-2 ring-blue-500"> -->
                  <div>
                    <p class="font-bold text-gray-900">Rajesh Kumar</p>
                    <p class="text-sm text-gray-500">Plant Manager, **Tata Steel**</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
          
          <div class="flex mt-6 space-x-4">
            <button id="prev-testimonial" class="p-3 rounded-full border border-gray-300 text-gray-500 hover:bg-gray-100 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </button>
            <button id="next-testimonial" class="p-3 rounded-full border border-gray-300 text-gray-500 hover:bg-gray-100 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
          </div>
        </div>
        
        <div class="lg:w-1/2">
          <h3 class="text-lg font-semibold uppercase text-gray-500 mb-6 tracking-wider">Trusted by Industry Leaders</h3>
          
          <div id="logo-slider" class="swiper-container h-80 lg:h-96"> 
            <div class="swiper-wrapper">
              <div class="swiper-slide grid grid-cols-2 gap-4">
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/aditya-birla.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/alembic.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/appolo.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/axis.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/bajaj.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/beml.jpg') }}" alt=""></div>
              </div>

               <div class="swiper-slide grid grid-cols-2 gap-4">
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/aditya-birla.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/alembic.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/appolo.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/axis.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/bajaj.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/beml.jpg') }}" alt=""></div>
              </div>

               <div class="swiper-slide grid grid-cols-2 gap-4">
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/aditya-birla.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/alembic.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/appolo.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/axis.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/bajaj.jpg') }}" alt=""></div>
                <div class=""><img class="w-40" src="{{ asset('front/images/clients/beml.jpg') }}" alt=""></div>
              </div>
             
              
              
            </div>
          </div>
          
        </div>

      </div>
  </section> --}}



  <livewire:testimonials-slider />



 <section class="bg-gray-100 py-24 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6">

    <p class="blue text-sm font-semibold font-bold uppercase mb-3 tracking-widest">Clientele</p>
    <h2 class="text-4xl font-bold mb-10">Trusted by Industry Leaders</h2>

    <!-- ROW 1 (Left → Right) -->
    <div class="relative overflow-hidden mb-8">
      <div class="flex gap-8 animate-marquee">

        <!-- LOGO CARD -->
        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/aditya-birla.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Aditya Birla"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/alembic.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Alembic"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/appolo.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Appolo"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/axis.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Axis"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/bajaj.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Bajaj"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/beml.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="BEML"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/berger.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Berger"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/biocon.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Biocon"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/bombardier.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Bombardier"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/cipla.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/dabur.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>


        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/dda.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/finolex.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>


         <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/ford.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>


         <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/genpact.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>


      </div>
    </div>

    <!-- ROW 2 (Right → Left) -->
    <div class="relative overflow-hidden mb-8">
      <div class="flex gap-8 animate-marquee-reverse">

        <!-- Repeat same logo cards with bg-white + shadow -->
        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/hcl.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Aditya Birla"
          />
        </div>

        
           <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/hdfc.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Alembic"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/hero.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Appolo"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/hoda.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Axis"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/ipca.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Bajaj"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/itc.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="BEML"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/jcb.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Berger"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/jsq.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Biocon"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/l$t.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Bombardier"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/lg.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>


        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/lupin.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/mahindar.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/maruti-suzuki.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>


        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/max.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>

         <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/meitra.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>

         <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/mg.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/muthoot.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>


      </div>
    </div>

    <!-- ROW 3 (Left → Right) -->
    <div class="relative overflow-hidden mb-8">
      <div class="flex gap-8 animate-marquee">

        <!-- Repeat same logo cards with bg-white + shadow -->
        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/oberoi.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Aditya Birla"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/pepsico.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Alembic"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/sib.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Appolo"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/sify.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Axis"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/smartworks.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Bajaj"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/srf.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="BEML"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/sunpharma.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Berger"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/taj.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Biocon"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/tataaig.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Bombardier"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/tcs.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>


        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/times.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>


        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/torrent.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/tvs.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>

        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/welspun.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>


        <div class="group flex items-center justify-center bg-white p-5 rounded-md shadow-[0_4px_14px_rgba(0,0,0,0.08)]">
          <img
            src="{{ asset('front/images/clients/yesbank.jpg') }}"
            class="max-w-[120px] object-contain"
            alt="Cipla"
          />
        </div>


      </div>
    </div>

  </div>
</section>




  <div class="bg-gray-50 py-16 px-6 reveal">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="md:text-5xl text-3xl font-semibold mb-6 text-dark">Connect with us</h2>
      <p class="text-base text-slate-600">Stay updated with the latest news, trends, and special offers. Don't miss out on our exciting updates.</p>

      <livewire:newsletter-form />
      
    </div>
  </div>
</main>
