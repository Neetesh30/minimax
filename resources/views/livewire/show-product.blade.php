

@section('head')
    <x-seo :seo="$seo" />
@endsection

<main>
    <section class="bg-gray-50 py-12">
             <ul class="hidden lg:flex items-center space-x-5 mt-24 px-4 lg:px-16">

    {{-- CATEGORY --}}
    @if($product->category)
        <li class="flex items-center gap-3 text-slate-500 font-medium text-base">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current" viewBox="0 0 511 511.999">
                <path d="M498.7 222.695c..." />
            </svg>

            <a href="{{ route('products.byCategory', $product->category->slug) }}"
               class="hover:text-gray-700">
                {{ $product->category->name }}
            </a>
        </li>
    @endif

    {{-- CATEGORY → SUBCATEGORY --}}
    @if($product->category && $product->subcategory)
        <li>
            @include('partials.breadcrumb-arrow')
        </li>
    @endif

    {{-- SUBCATEGORY --}}
    @if($product->subcategory)
        <li class="flex items-center gap-2 text-slate-500 font-medium text-base">
            <a href="{{ route('products.byCategory', $product->subcategory->slug) }}"
               class="hover:text-gray-700">
                {{ $product->subcategory->name }}
            </a>
        </li>
    @endif

    {{-- SUBCATEGORY → SUBSUBCATEGORY --}}
    @if($product->subcategory && $product->subsubcategory)
        <li>
            @include('partials.breadcrumb-arrow')
        </li>
    @endif

    {{-- SUBSUBCATEGORY --}}
    @if($product->subsubcategory)
        <li class="flex items-center gap-2 text-slate-900 font-semibold">
            <a href="{{ route('products.byCategory', $product->subsubcategory->slug) }}"
               class="hover:text-gray-700">
                {{ $product->subsubcategory->name }}
            </a>
        </li>
    @endif

    {{-- LAST ARROW (ONLY IF ANY CATEGORY EXISTS) --}}
    @if($product->category || $product->subcategory || $product->subsubcategory)
        <li>
            @include('partials.breadcrumb-arrow')
        </li>
    @endif

    {{-- PRODUCT NAME --}}
    <li class="flex items-center gap-2 text-orange-500 font-semibold">
        {{ $product->name }}
    </li>

</ul>

     <div class="space-x-5 py-12 px-4 lg:px-16">
            <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-8 max-lg:gap-12 max-sm:gap-8">
              <div class="w-full lg:sticky top-0 lg:col-span-2">
                <div class="flex flex-col gap-2">
                  <div class="flex-1" style="background: #CCD9D9;
                     background: linear-gradient(180deg, rgba(204, 217, 217, 1) 2%, rgba(204, 217, 217, 1) 9%, rgba(204, 217, 217, 1) 17%, rgba(240, 243, 241, 1) 35%, rgba(224, 232, 230, 1) 70%, rgba(240, 243, 241, 1) 96%);">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product" class="object-top object-contain d-block mx-auto" />
                    
                         @if($product->images)
                            <div class="flex justify-center gap-2 pb-4 bg-[#D0DCDC]">
                                @foreach($product->images as $img)
                                    <img src="{{ asset('storage/' . $img) }}" 
                                        class="h-16 rounded-xl border border-gray-300 cursor-pointer hover:shadow-lg transition" 
                                        alt="Product image">
                                @endforeach
                            </div>
                       @endif
                
                </div>
                </div>
              </div>

                  <div class="w-full lg:col-span-3">
                    <div class="mb-5 space-y-3">
                        <h1 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                            {{ $product->name }}
                        </h1>
                    
                        @if($product->footer_description)
                            <p class="text-gray-500 mt-2 text-sm">
                                {!! $product->footer_description !!}
                            </p>
                        @endif
                    </div>


                    @if($product->product_badges)
                    <div class="flex flex-wrap justify-center items-center gap-x-8 gap-y-12 mb-5 border-t border-b border-gray-200 py-6">
                        @foreach($product->product_badges as $badge)
                            <div class="flex items-center gap-3">
                                <img src="{{ Storage::url($badge['image']) }}"
                                    alt="{{ $badge['title'] }}"
                                    class="h-24">

                                <div class="text-sm font-semibold text-center">
                                    {{ $badge['title'] }}
                                    @if(!empty($badge['subtitle']))
                                        <br>{{ $badge['subtitle'] }}
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif




                    @if($product->application_areas)
                        <section class="bg-slate-50 p-8 rounded-lg max-w-4xl mx-auto">
                            <h2 class="text-2xl font-extrabold text-slate-700 mb-6">Application Area</h2>

                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8 text-gray-800">
                                @foreach($product->application_areas as $area)
                                    <li class="flex items-center gap-3">
                                        <i class="fa-solid fa-circle-check text-green-600"></i>
                                        {{ $area['title'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                        @endif



                    
                        <div class="mt-8">
                      <div class="mt-8">
                        <div class="flex gap-4">

                          <livewire:product-enquiry-form :product="$product" />


                        </div>
                      </div>
                    </div>

                  </div>
            </div>


                <div class="p-4 w-full">
                      <ul class="w-full flex gap-2">
                        <li id="homeTab"
                          class="flex-1 tab text-slate-700 font-semibold hover:text-slate-700 text-[15px] text-center py-2.5 px-5 border-b-2 border-slate-700 cursor-pointer transition-all">
                          Technical Specification
                        </li>
                        <li id="contentTab"
                          class="flex-1 tab text-slate-600 font-medium hover:text-slate-700 text-[15px] text-center py-2.5 px-5 border-b-2 border-slate-700 cursor-pointer transition-all">
                          Faq
                        </li>
                      
                      </ul>

                      <div id="homeContent" class="tab-content w-full block mt-8">
                          <div class="w-full overflow-x-auto">
                              <div class="
                                 w-full overflow-x-auto max-w-full
                                    rounded-xl border border-gray-200 shadow-sm overflow-hidden
                                    
                                  [&>table]:w-full
                                  [&>table]:min-w-[640px]
                                  [&>table]:border-collapse
                                  [&>table]:text-md
                                  [&>table]:text-gray-700


                                     [&>table>thead>tr>th:first-child]:border-r
                                    [&>table>tbody>tr>td:first-child]:border-r
                                    [&>table>thead>tr>th:first-child]:border-gray-300
                                    [&>table>tbody>tr>td:first-child]:border-gray-300
                                    [&>table>thead>tr>th:first-child]:font-semibold
                                    [&>table>tbody>tr>td:first-child]:font-semibold

                                  /* HEADER */
                                  [&>table>thead]:bg-gray-50
                                  [&>table>thead>tr>th]:px-5
                                  [&>table>thead>tr>th]:py-3
                                  [&>table>thead>tr>th]:text-left
                                  [&>table>thead>tr>th]:font-semibold
                                  [&>table>thead>tr>th]:text-gray-600
                                  [&>table>thead>tr>th]:uppercase
                                  [&>table>thead>tr>th]:text-xs
                                  [&>table>thead>tr>th]:tracking-wider
                                  [&>table>thead>tr>th]:border-b
                                  [&>table>thead>tr>th]:border-r
                                  [&>table>thead>tr>th]:sticky
                                  [&>table>thead>tr>th]:top-0
                                  [&>table>thead>tr>th]:z-10

                                  /* BODY */
                                  [&>table>tbody>tr]:border-b
                                  [&>table>tbody>tr:last-child]:border-0
                                  [&>table>tbody>tr:nth-child(even)]:bg-dark-50/50
                                  [&>table>tbody>tr:hover]:bg-blue-50
                                  [&>table>tbody>tr]:transition-colors

                                  [&>table>tbody>tr>td]:px-5
                                    [&>table>tbody>tr>td]:py-3
                                  [&>table>tbody>tr>td]:align-top
                                  [&>table>tbody>tr>td]:text-gray-700
                              ">
                                  {!! $product->html_table !!}
                              </div>
                          </div>
                     </div>

                      
                    <div id="contentContent" class="tab-content w-full block hidden mt-8">
                            <livewire:product-faq :product="$product" />
                     </div>
                   
                </div>

         </div>

    </section>



    <section class="bg-gray-100">
       @if($product->key_features)
            <section class="max-w-6xl mx-auto px-4 py-12">
                <h2 class="text-2xl md:text-3xl font-bold text-center mb-10">
                    Key Features
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-5">
                    @foreach($product->key_features as $feature)
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-green-600 mt-1 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <p>{{ $feature['feature'] }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
            @endif

    </section>

    <section class="products px-12 py-16 reveal bg-gray-50">
        <h2 class="text-4xl font-semibold">Related Product</h2>  
    
        <!-- SWIPER CONTAINER -->
        <div class="relatedSwiper relative mt-12 products-container overflow-hidden">

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
                @forelse($relatedProducts as $related)
                <div class="swiper-slide h-auto">
                    <a href="{{ route('products.show', $related->slug) }}">
                    <div
                        class="group bordeshadow-md w-full max-w-sm rounded-lg mx-auto mt-4 transform hover:transition duration-300" style="background: #CCD9D9;
                background: linear-gradient(180deg, rgba(204, 217, 217, 1) 2%, rgba(204, 217, 217, 1) 9%, rgba(204, 217, 217, 1) 17%, rgba(240, 243, 241, 1) 35%, rgba(224, 232, 230, 1) 70%, rgba(240, 243, 241, 1) 96%);">

                        <!-- Image Wrapper -->
                        <div class="aspect-[1/1] overflow-hidden">
                        <img
                            src="{{ asset('storage/' . $related->image) }}"
                            class="block mx-auto w-50 w-full aspect-square object-contain  transform transition duration-500 group-hover:scale-105" 
                            alt="Card image"
                        />
                        </div>

                        <!-- Content -->
                        <div class="p-6 bg-black text-center">
                        <h3
                            class="text-white text-md font-semibold transition-colors duration-300 group-hover:text-orange-600">
                            {{ $related->name  }}
                        </h3>

                        </div>

                    </div>
                    </a>
                </div>
                @empty
                    <p class="text-gray-500 col-span-full">No related products found.</p>
                @endforelse
            </div>

        </div>
    </section>

</main>





       