<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- favicon generator --}}

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/images/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/images/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/images/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('front/images/site.webmanifest') }}">

        @include('cookie-consent::cookie-consent-head')

        
          {{-- DEFAULT GLOBAL SEO --}}
         @hasSection('head')
            @yield('head')
         @else
            <x-seo :seo="\App\Services\SeoManager::resolve()" />
        @endif

          <!-- TAILWIND CDN -->
        <script src="https://cdn.tailwindcss.com"></script>

       <!-- Font Awesome Css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!--odometer css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/themes/odometer-theme-default.min.css">
        <!-- swiper css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        
        <!--  Toastify css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

        {{-- Leaflet Css --}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

        <link  rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css"/>

        <!-- Flipbook -->
        <link rel="stylesheet" href="{{ asset('front/css/themify-icons.min.css') }}">

        <!-- Floating Whatsapp -->
        <link rel="stylesheet" href="{{ asset('front/css/floating-wpp.css') }}">

        <!-- Flipbook -->
        <link rel="stylesheet" href="{{ asset('front/css/dflip.min.css') }}">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">

         @livewireStyles
    </head>
    <body>
      @include('cookie-consent::cookie-consent-body')
        <div class="progress-container">
              <div class="progress-bar" id="myBar"></div>
        </div>

      <x-filament-menu-builder::menu slug="main-menu"   :is-mega="true" 
    :columns="4" view="filament-menu-builder::components.bootstrap5.menu"/>

        {{ $slot }}

        {{-- <footer class="bg-black/80 pt-14 pb-6 px-12 tracking-wide">
          <div class="max-w-2xl mx-auto text-center">
            <a href='{{ route('home') }}' class="inline-block">
              <img src="{{ asset('front/images/minimax-logo-white.png') }}" alt="logo"
              class="w-44" /></a>
            <p class="text-sm mt-6 text-slate-300 leading-relaxed">
              Minimax was established as 1st Indian fire extinguisher brand in 1903 with the head office in Kolkata. Later in 1973 the brand was transferred to Steelage which was subsequently renamed as Gunnebo India Ltd in 2005.
            </p>

            <ul class="flex flex-wrap justify-center gap-6 mt-8">
              <li>
                <a href='https://www.facebook.com/MinimaxFireProducts' target="_blank">
                
                  <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 49.652 49.652"
                    class="w-8 h-8 transition-transform duration-300">

                  <path
                    fill="#1877F2"
                    d="M24.826 0C11.137 0 0 11.137 0 24.826c0 13.688 11.137 24.826 24.826 24.826 13.688 0 24.826-11.138 24.826-24.826C49.652 11.137 38.516 0 24.826 0z"
                  />

                      
                      <path
                        fill="#ffffff"
                        d="M31 25.7h-4.039v14.396h-5.985V25.7h-2.845v-5.088h2.845v-3.291c0-2.357 1.12-6.04 6.04-6.04l4.435.017v4.939h-3.219c-.524 0-1.269.262-1.269 1.386v2.99h4.56z"
                      />
                    </svg>

                </a>
              </li>
              <li>
                <a href='https://www.linkedin.com/company/minimax-fire-extinguishers/' target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 transition-transform duration-300" viewBox="0 0 112.196 112.196">
                    <circle cx="56.098" cy="56.097" r="56.098" fill="#007ab9" data-original="#007ab9" />
                    <path fill="#fff" d="M89.616 60.611v23.128H76.207V62.161c0-5.418-1.936-9.118-6.791-9.118-3.705 0-5.906 2.491-6.878 4.903-.353.862-.444 2.059-.444 3.268v22.524h-13.41s.18-36.546 0-40.329h13.411v5.715c-.027.045-.065.089-.089.132h.089v-.132c1.782-2.742 4.96-6.662 12.085-6.662 8.822 0 15.436 5.764 15.436 18.149zm-54.96-36.642c-4.587 0-7.588 3.011-7.588 6.967 0 3.872 2.914 6.97 7.412 6.97h.087c4.677 0 7.585-3.098 7.585-6.97-.089-3.956-2.908-6.967-7.496-6.967zm-6.791 59.77H41.27v-40.33H27.865v40.33z" data-original="#f1f2f2" />
                  </svg>
                </a>
              </li>
              <li>
                <a href='https://www.instagram.com/minimax_fireproducts/' target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 transition-transform duration-300" viewBox="0 0 152 152">
                    <linearGradient id="a" x1="22.26" x2="129.74" y1="22.26" y2="129.74" gradientUnits="userSpaceOnUse">
                      <stop offset="0" stop-color="#fae100" />
                      <stop offset=".15" stop-color="#fcb720" />
                      <stop offset=".3" stop-color="#ff7950" />
                      <stop offset=".5" stop-color="#ff1c74" />
                      <stop offset="1" stop-color="#6c1cd1" />
                    </linearGradient>
                    <g data-name="Layer 2">
                      <g data-name="03.Instagram">
                        <rect width="152" height="152" fill="url(#a)" data-original="url(#a)" rx="76" />
                        <g fill="#fff">
                          <path fill="#ffffff10" d="M133.2 26c-11.08 20.34-26.75 41.32-46.33 60.9S46.31 122.12 26 133.2q-1.91-1.66-3.71-3.46A76 76 0 1 1 129.74 22.26q1.8 1.8 3.46 3.74z" data-original="#ffffff10" />
                          <path d="M94 36H58a22 22 0 0 0-22 22v36a22 22 0 0 0 22 22h36a22 22 0 0 0 22-22V58a22 22 0 0 0-22-22zm15 54.84A18.16 18.16 0 0 1 90.84 109H61.16A18.16 18.16 0 0 1 43 90.84V61.16A18.16 18.16 0 0 1 61.16 43h29.68A18.16 18.16 0 0 1 109 61.16z" data-original="#ffffff" />
                          <path d="m90.59 61.56-.19-.19-.16-.16A20.16 20.16 0 0 0 76 55.33 20.52 20.52 0 0 0 55.62 76a20.75 20.75 0 0 0 6 14.61 20.19 20.19 0 0 0 14.42 6 20.73 20.73 0 0 0 14.55-35.05zM76 89.56A13.56 13.56 0 1 1 89.37 76 13.46 13.46 0 0 1 76 89.56zm26.43-35.18a4.88 4.88 0 0 1-4.85 4.92 4.81 4.81 0 0 1-3.42-1.43 4.93 4.93 0 0 1 3.43-8.39 4.82 4.82 0 0 1 3.09 1.12l.1.1a3.05 3.05 0 0 1 .44.44l.11.12a4.92 4.92 0 0 1 1.1 3.12z" data-original="#ffffff" />
                        </g>
                      </g>
                    </g>
                  </svg>
                </a>
              </li>
              <li>
                <a href='https://www.youtube.com/channel/UCxLtgKBQzg6U7lp2J86E2_g/' target="_blank" >
                  <svg xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 50 50"
                      class="w-8 h-8 hover:scale-110 transition-transform duration-300">

                    <!-- 🔴 Red circle -->
                    <circle cx="25" cy="25" r="25" fill="#FF0000"/>

                    <!-- ▶ White play icon -->
                    <path
                      fill="#ffffff"
                      d="M20 16L36 25L20 34V16Z"
                    />
                  </svg>

                </a>
              </li>
            </ul>
          </div>

          <ul class="grid max-sm:grid-cols-1 max-lg:grid-cols-2 lg:grid-cols-4 gap-12 mt-20">
            <li class="flex items-center">
              <div class="bg-gray-300 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-black" viewBox="0 0 482.6 482.6">
                  <path
                    d="M98.339 320.8c47.6 56.9 104.9 101.7 170.3 133.4 24.9 11.8 58.2 25.8 95.3 28.2 2.3.1 4.5.2 6.8.2 24.9 0 44.9-8.6 61.2-26.3.1-.1.3-.3.4-.5 5.8-7 12.4-13.3 19.3-20 4.7-4.5 9.5-9.2 14.1-14 21.3-22.2 21.3-50.4-.2-71.9l-60.1-60.1c-10.2-10.6-22.4-16.2-35.2-16.2-12.8 0-25.1 5.6-35.6 16.1l-35.8 35.8c-3.3-1.9-6.7-3.6-9.9-5.2-4-2-7.7-3.9-11-6-32.6-20.7-62.2-47.7-90.5-82.4-14.3-18.1-23.9-33.3-30.6-48.8 9.4-8.5 18.2-17.4 26.7-26.1 3-3.1 6.1-6.2 9.2-9.3 10.8-10.8 16.6-23.3 16.6-36s-5.7-25.2-16.6-36l-29.8-29.8c-3.5-3.5-6.8-6.9-10.2-10.4-6.6-6.8-13.5-13.8-20.3-20.1-10.3-10.1-22.4-15.4-35.2-15.4-12.7 0-24.9 5.3-35.6 15.5l-37.4 37.4c-13.6 13.6-21.3 30.1-22.9 49.2-1.9 23.9 2.5 49.3 13.9 80 17.5 47.5 43.9 91.6 83.1 138.7zm-72.6-216.6c1.2-13.3 6.3-24.4 15.9-34l37.2-37.2c5.8-5.6 12.2-8.5 18.4-8.5 6.1 0 12.3 2.9 18 8.7 6.7 6.2 13 12.7 19.8 19.6 3.4 3.5 6.9 7 10.4 10.6l29.8 29.8c6.2 6.2 9.4 12.5 9.4 18.7s-3.2 12.5-9.4 18.7c-3.1 3.1-6.2 6.3-9.3 9.4-9.3 9.4-18 18.3-27.6 26.8l-.5.5c-8.3 8.3-7 16.2-5 22.2.1.3.2.5.3.8 7.7 18.5 18.4 36.1 35.1 57.1 30 37 61.6 65.7 96.4 87.8 4.3 2.8 8.9 5 13.2 7.2 4 2 7.7 3.9 11 6 .4.2.7.4 1.1.6 3.3 1.7 6.5 2.5 9.7 2.5 8 0 13.2-5.1 14.9-6.8l37.4-37.4c5.8-5.8 12.1-8.9 18.3-8.9 7.6 0 13.8 4.7 17.7 8.9l60.3 60.2c12 12 11.9 25-.3 37.7-4.2 4.5-8.6 8.8-13.3 13.3-7 6.8-14.3 13.8-20.9 21.7-11.5 12.4-25.2 18.2-42.9 18.2-1.7 0-3.5-.1-5.2-.2-32.8-2.1-63.3-14.9-86.2-25.8-62.2-30.1-116.8-72.8-162.1-127-37.3-44.9-62.4-86.7-79-131.5-10.3-27.5-14.2-49.6-12.6-69.7z"
                    data-original="#000000" />
                </svg>
              </div>
              <a href="javascript:void(0)" class="text-slate-300 text-sm ml-3">
                <small class="block">Toll Free (MTNL & BSNL lines)</small>
                <span class="font-medium"> 1800 22 3525</span>

                <small class="block">Toll Free (All Lines)</small>
                <span class="font-medium"> 1800 209 3040</span>

              </a>
            </li>
            <li class="flex items-center">
              <div class="bg-gray-300 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-black" viewBox="0 0 479.058 479.058">
                  <path
                    d="M434.146 59.882H44.912C20.146 59.882 0 80.028 0 104.794v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159L239.529 264.631 39.173 90.982a14.902 14.902 0 0 1 5.738-1.159zm0 299.411H44.912c-8.26 0-14.971-6.71-14.971-14.971V122.615l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z"
                    data-original="#000000" />
                </svg>
              </div>
              <a href="javascript:void(0)" class="text-slate-300 text-sm ml-3">
                <small class="block">Mail</small>
                <span class="font-medium">info@minimax.co.in</span>
              </a>
            </li>
            <li class="flex items-center">
              <div class="bg-gray-300 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-black" viewBox="0 0 368.16 368.16">
                  <path
                    d="M184.08 0c-74.992 0-136 61.008-136 136 0 24.688 11.072 51.24 11.536 52.36 3.576 8.488 10.632 21.672 15.72 29.4l93.248 141.288c3.816 5.792 9.464 9.112 15.496 9.112s11.68-3.32 15.496-9.104l93.256-141.296c5.096-7.728 12.144-20.912 15.72-29.4.464-1.112 11.528-27.664 11.528-52.36 0-74.992-61.008-136-136-136zM293.8 182.152c-3.192 7.608-9.76 19.872-14.328 26.8l-93.256 141.296c-1.84 2.792-2.424 2.792-4.264 0L88.696 208.952c-4.568-6.928-11.136-19.2-14.328-26.808-.136-.328-10.288-24.768-10.288-46.144 0-66.168 53.832-120 120-120s120 53.832 120 120c0 21.408-10.176 45.912-10.28 46.152z"
                    data-original="#000000" />
                  <path
                    d="M184.08 64.008c-39.704 0-72 32.304-72 72s32.296 72 72 72 72-32.304 72-72-32.296-72-72-72zm0 128c-30.872 0-56-25.12-56-56s25.128-56 56-56 56 25.12 56 56-25.128 56-56 56z"
                    data-original="#000000" />
                </svg>
              </div>
              <a href="javascript:void(0)" class="text-slate-300 text-sm ml-3">
                <small class="block">Address</small>
                <span class="font-medium">Gunnebo India Private Ltd.
                  Unit No. 102, 1st Floor,
                  Akruti SMC, LBS Marg, Khopat,
                  Thane (W) – 400 601 India</span>
              </a>
            </li>
            <li class="flex items-center">
              <div class="bg-gray-300 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-black" viewBox="0 0 100 100">
                  <path
                    d="M83 23h-3V11c0-3.309-2.692-6-6-6H26c-3.308 0-6 2.691-6 6v12h-3C8.729 23 2 29.729 2 38v30c0 4.963 4.037 9 9 9h9v12c0 3.309 2.692 6 6 6h48c3.308 0 6-2.691 6-6V77h9c4.963 0 9-4.037 9-9V38c0-8.271-6.729-15-15-15zM26 11h48v12H26zm0 78V59h48v30zm66-21c0 1.654-1.345 3-3 3h-9V59h3a3 3 0 1 0 0-6H17a3 3 0 1 0 0 6h3v12h-9c-1.655 0-3-1.346-3-3V38c0-4.963 4.037-9 9-9h66c4.963 0 9 4.037 9 9zm-27 0a3 3 0 0 1-3 3H38a3 3 0 1 1 0-6h24a3 3 0 0 1 3 3zm0 12a3 3 0 0 1-3 3H38a3 3 0 1 1 0-6h24a3 3 0 0 1 3 3zm21-42a3 3 0 0 1-3 3h-6a3 3 0 1 1 0-6h6a3 3 0 0 1 3 3z"
                    data-original="#000000" />
                </svg>
              </div>
              <a href="javascript:void(0)" class="text-slate-300 text-sm ml-3">
                <small class="block">Support</small>
                <span class="font-medium">+91 22 6780 3500</span><br>

              </a>
            </li>
          </ul>

          <hr class="mt-14 mb-6 border-gray-600" />

          <div class="flex max-md:flex-col max-md:text-center gap-4">
            <ul class="flex flex-wrap gap-4 max-md:justify-center">
              <li class="text-sm">
                <a href='{{ route('page.view', 'terms-and-conditions') }}' class="text-slate-300 font-medium hover:underline">Terms of Service</a>
              </li>
              <li class="text-sm">
                <a href='{{ route('page.view', 'privacy-policy') }}' class="text-slate-300 font-medium hover:underline">Privacy Policy</a>
              </li>
              
            </ul>
            <p class="text-sm text-slate-300 md:ml-auto">Copyright © 2025 Minimax By Gunnebo . All rights reserved.</p>
          </div>
        </footer> --}}


        

          <!-- Footer Section -->
            <footer class="relative bg-black/80 text-white pt-16 overflow-hidden">
              <!-- Wave SVG background -->
              <div class="absolute -top-12 left-0 w-full h-12" style="background-image: url('data:image/svg+xml;utf8,<svg viewBox=...'); background-size: cover;"></div>
              
              <div class="max-w-7xl mx-auto px-5 grid grid-cols-[repeat(auto-fit,minmax(250px,1fr))] gap-10 relative z-10">
                <!-- About -->
                <div>
                  <h2 class="text-2xl font-bold text-pink-600 mb-4">
                      <a href='{{ route('home') }}' class="inline-block">
                          <img src="{{ asset('front/images/minimax-logo-white.png') }}" alt="logo"
                          class="w-44" /></a>
                  </h2>
                  <p class="mb-4 leading-relaxed opacity-90 text-white/70">
                    Minimax was established as 1st Indian fire extinguisher brand in 1903 with the head office in Kolkata. Later in 1973 the brand was transferred to Steelage which was subsequently renamed as Gunnebo India Ltd in 2005.
                  </p>
                  <!-- Social Links -->
                  <div class="flex space-x-3">
                    <a href="https://www.facebook.com/MinimaxFireProducts" class="w-10 h-10 bg-white bg-opacity-10 flex items-center justify-center rounded-full text-white transition-transform hover:-translate-y-1 hover:bg-orange-600">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/minimax-fire-extinguishers/" class="w-10 h-10 bg-white bg-opacity-10 flex items-center justify-center rounded-full text-white transition-transform hover:-translate-y-1 hover:bg-orange-600">
                      <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCxLtgKBQzg6U7lp2J86E2_g" class="w-10 h-10 bg-white bg-opacity-10 flex items-center justify-center rounded-full text-white transition-transform hover:-translate-y-1 hover:bg-orange-600">
                      <i class="fab fa-youtube"></i>
                    </a>
                  </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                  <h3 class="text-xl text-white/90 mb-6 border-b-2 border-dotted border-white/60 pb-2">Quick Links</h3>
                  <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="flex items-center gap-2 opacity-90 hover:opacity-100 hover:translate-x-1 transition text-white/70"><i class="fas fa-chevron-right text-white/70"></i> Home</a></li>
                    <li><a href="{{ route('about') }}" class="flex items-center gap-2 opacity-90 hover:opacity-100 hover:translate-x-1 transition text-white/70"><i class="fas fa-chevron-right text-white/70"></i> About Us</a></li>
                    <li><a href="{{ route('products') }}" class="flex items-center gap-2 opacity-90 hover:opacity-100 hover:translate-x-1 transition text-white/70"><i class="fas fa-chevron-right text-white/70"></i> Products</a></li>
                    <li><a href="{{ route('blog') }}" class="flex items-center gap-2 opacity-90 hover:opacity-100 hover:translate-x-1 transition text-white/70"><i class="fas fa-chevron-right text-white/70"></i> Blog</a></li>
                    <li><a href="{{ route('verify.extinguisher') }}" class="flex items-center gap-2 opacity-90 hover:opacity-100 hover:translate-x-1 transition text-white/70"><i class="fas fa-chevron-right text-white/70"></i> Extinguisher Verification</a></li>
                    <li><a href="{{ route('feInspection') }}" class="flex items-center gap-2 opacity-90 hover:opacity-100 hover:translate-x-1 transition text-white/70"><i class="fas fa-chevron-right text-white/70"></i> FE Inspection Card</a></li>



                  </ul>
                </div>
                
                <!-- Our Services -->
                <div>
                  <h3 class="text-xl text-white/90 mb-6 border-b-2 border-dotted border-white/60 pb-2 ">Important Links</h3>
                  <ul class="space-y-3">
                    <li><a href="{{ route('page.view', 'terms-and-conditions') }}" class="flex items-center gap-2 opacity-90 hover:opacity-100 hover:translate-x-1 transition text-white/70"><i class="fas fa-chevron-right text-white/70"></i> Terms & Conditions</a></li>
                    <li><a href="{{ route('page.view', 'privacy-policy') }}" class="flex items-center gap-2 opacity-90 hover:opacity-100 hover:translate-x-1 transition text-white/70"><i class="fas fa-chevron-right text-white/70"></i> Privacy Policy</a></li>
                    <li><a href="{{ route('sitemap') }}" class="flex items-center gap-2 opacity-90 hover:opacity-100 hover:translate-x-1 transition text-white/70"><i class="fas fa-chevron-right text-white/70"></i> Sitemap</a></li>
                  </ul>
                </div>
                
                <!-- Contact Us -->
                <div>
                  <h3 class="text-xl text-white/90 mb-6 border-b-2 border-dotted border-white/60 pb-2">Contact Us</h3>
                  <ul class="space-y-4 mb-6">
                    <li class="flex items-center gap-4">
                      <i class="fas fa-map-marker-alt text-white/70 mt-1"></i>
                      <div class="text-white/70">
                        Gunnebo India Private Ltd. Unit No. 102, 1st Floor, Akruti SMC, LBS Marg, Khopat, Thane (W) - 400 601 India.
            
                      </div>
                    </li>
                    
                    
                     <li class="flex items-center gap-4">
                      <i class="fas fa-phone text-white/70 mt-1"></i>
                      <div class="text-white/70">
                        +91 22 6780 3500
            
                      </div>
                    </li>
                    

                    <li class="flex items-center gap-4">
                      <i class="fas fa-envelope text-white/70 mt-1"></i>
                      <div>
                        <a href="mailto:info@minimax.co.in" class="block hover:underline opacity-90 hover:opacity-100 text-white/70">info@minimax.co.in</a>
                      </div>
                    </li>

                    <li class="flex items-center gap-4">
                      
                      <div>
                        <a href="tel:1800223525" class="block opacity-90 hover:opacity-100 text-white/70">
                            <img src="{{ asset('front/images/toll-free-number-mtnl-and-bsnl.png') }}" > 
                        </a>
                      </div>
                    </li>

                    <li class="flex items-center gap-4">
                      <div>
                        <a href="tel:18002093040" class="block opacity-90 hover:opacity-100 text-white/70">
                          <img src="{{ asset('front/images/toll-free-for-all-lines.png') }}" >
                        </a>

                      </div>
                    </li>
                  </ul>
                
                </div>
                
              </div>
              
              <!-- Footer Bottom -->
              <div class="max-w-7xl mx-auto px-5 mt-10 relative z-10">
                <hr class="mt-14 mb-6 border-gray-600" />

                      <div class="flex max-md:flex-col max-md:text-center gap-4">
                        <ul class="flex flex-wrap gap-4 max-md:justify-center">
                          <li class="text-sm">
                            <a href='{{ route('page.view', 'terms-and-conditions') }}' class="text-slate-300 font-medium hover:underline">Terms of Service</a>
                          </li>
                          <li class="text-sm">
                            <a href='{{ route('page.view', 'privacy-policy') }}' class="text-slate-300 font-medium hover:underline">Privacy Policy</a>
                          </li>
                          
                        </ul>
                        <p class="text-sm text-slate-300 md:ml-auto">Copyright 2026 Minimax By Gunnebo . All rights reserved.</p>
                      </div>
              </div>





              <svg class="wave-footer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#262424" fill-opacity="0.3"
                  d="M0,288L80,282.7C160,277,320,267,480,234.7C640,203,800,149,960,117.3C1120,85,1280,75,1360,69.3L1440,64L1440,320L0,320Z">
                </path>
              </svg>
                
            </footer>

            <div class="floating-wpp"></div>

    <!-- jquery link -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <!-- owl carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <!-- swiper js -->
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>  
    
      <!--Toastify js-->
      <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

       <script src="{{ asset('front/js/slider.js') }}"></script>    

       <!-- Odometer JS -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/odometer.min.js"></script>

       {{-- Leaflet JS --}}
       <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

       {{-- Marker Cluster JS --}}
       <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>

        {{-- Whatsapp JS --}}
        <script src="{{ asset('front/js/floating-wpp.js') }}"></script> 

       <script src="{{ asset('front/js/all.js') }}"></script> 

        <script src="{{ asset('front/js/dflip.min.js') }}"></script>   

        <script src="{{ asset('front/js/pdf.min.js') }}"></script>    

        <script src="{{ asset('front/js/pdf.worker.min.js') }}"></script>  
        

        <script>
window.dFlipLocation =
  "https://cdn.jsdelivr.net/npm/@dearhive/dearflip-jquery-flipbook@1.7.3/dflip/";

function destroyFlipbook() {
    const instance = $("#flipbookContainer").data("df-instance");
    if (instance) {
        instance.dispose();
    }
    $("#flipbookContainer").html("");
}

/* =========================
   FOLDER CLICK (FIXED)
========================= */
$(document).on("click", ".folder", function () {
    const folder = $(this).data("folder");

    if (!pdfData[folder]) {
        console.error("No PDFs for folder:", folder);
        return;
    }

    $("#pdfGrid").html("");

    pdfData[folder].forEach(pdf => {
        $("#pdfGrid").append(`
            <div class="p-4 bg-white rounded shadow cursor-pointer pdf-item"
                 data-src="${pdf.src}">
                <i class="fa-solid fa-file-pdf text-red-500 text-4xl"></i>
                <p class="mt-2 font-semibold">${pdf.name}</p>
            </div>
        `);
    });

    $("#folderView").hide();
    $("#pdfView").removeClass("hidden");
});

/* =========================
   BACK BUTTON
========================= */
$(document).on("click", "#backBtn", function () {
    $("#pdfView").addClass("hidden");
    $("#folderView").show();
});

/* =========================
   PDF CLICK (FIXED)
========================= */
$(document).on("click", ".pdf-item", function () {
    const src = $(this).data("src");

    if (!src) {
        console.error("PDF src missing");
        return;
    }

    destroyFlipbook();
    $("#flipbookModal").removeClass("hidden");

    // IMPORTANT: wait for modal to be visible
    setTimeout(() => {
        try {
            $("#flipbookContainer").flipBook(src, {
                webgl: true,
                backgroundColor: "#111",
                toolbar: true,
                zoomEnable: true,
            });
        } catch (e) {
            console.error("Flipbook error:", e);
        }
    }, 150);
});

/* =========================
   CLOSE MODAL
========================= */
function closeModal() {
    destroyFlipbook();
    $("#flipbookModal").addClass("hidden");
}

$(document).on("click", "#closeModal", closeModal);

/* Click outside */
$(document).on("click", "#flipbookModal", function (e) {
    if (e.target === this) closeModal();
});

/* ESC key */
$(document).on("keydown", function (e) {
    if (e.key === "Escape") closeModal();
});
</script>



 <!-- Enquiry Form Modal -->
<div 
    x-data="{ open: false }"

    x-on:open-enquiry.window="open = true"
    
    {{-- x-init="setTimeout(() => open = true, 3000)" --}}
>
    <!-- Floating Button -->
    <button
        @click="open = true"
        class="fixed bottom-3 right-1 z-50 w-10 h-10 bg-orange-600 text-white font-semibold 
               rounded-full shadow-lg hover:bg-orange-700 animate-pulse  transition">
        <i class="fas fa-edit"></i>
        
    </button>

    <!-- Modal -->
    <div
        x-show="open"
        x-cloak
        class="fixed inset-0 z-[1000] flex items-center justify-center p-4"
    >
        <!-- Overlay -->
        <div
            @click="open = false"
            class="absolute inset-0 bg-black/50"
        ></div>

        <!-- Modal Card -->
        <div
            x-show="open"
            x-transition
            class="relative w-full max-w-lg bg-gray-50 rounded-2xl shadow-2xl p-8"
        >
            <!-- Close Button -->
            <button
                @click="open = false"
                class="absolute top-5 right-5 text-gray-400 hover:text-red-500 transition"
            >
                ✕
            </button>


            <!-- Livewire Form -->
            <livewire:enquiry-form />
        </div>
    </div>
</div>


<!-- VIDEO MODAL -->
<div
  id="videoModal"
  class="fixed inset-0 bg-black/70 flex items-center justify-center z-50 hidden px-4"
>

  <div class="relative w-full max-w-4xl bg-black rounded-lg overflow-hidden">

    <!-- Close Button -->
    <button
      onclick="closeVideo()"
      class="absolute top-3 right-3 text-white text-3xl z-10"
    >
      &times;
    </button>

    <!-- Responsive Video -->
    <div class="relative pt-[56.25%]">
      <iframe
        id="videoFrame"
        class="absolute inset-0 w-full h-full"
        src=""
        title="Video"
        frameborder="0"
        allow="autoplay; fullscreen"
        allowfullscreen
      ></iframe>
    </div>

  </div>
</div>

       @livewireScripts

    </body>
</html>
