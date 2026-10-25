<main>
   <!-- SWIPER CONTAINER -->
    <div class="products-swiper relative mt-12 products-container max-w-7xl mx-auto overflow-hidden">
          <p class="text-orange-600 text-sm font-semibold font-bold uppercase mb-3 tracking-widest">Popular Category</p>
          <h2 class="text-4xl font-semibold">Featured Categories</h2>
          
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
                 @foreach($categories as $category)
                <div class="swiper-slide h-auto">
                    <a href="{{ route('products.byCategory', $category->slug) }}">
                    <div
                        class="group border border-gray-200 shadow-md w-full max-w-sm rounded-lg mx-auto mt-4 transform hover:transition duration-300" style="background: #CCD9D9;
    background: linear-gradient(180deg, rgba(204, 217, 217, 1) 2%, rgba(204, 217, 217, 1) 9%, rgba(204, 217, 217, 1) 17%, rgba(240, 243, 241, 1) 35%, rgba(224, 232, 230, 1) 70%, rgba(240, 243, 241, 1) 96%);">
    
                        <!-- Image Wrapper -->
                        <div class="aspect-[1/1] overflow-hidden">
                        <img
                            src="{{ $category->image ? Storage::url($category->image) : asset('front/images/default-category.jpg') }}"
                            class="project-image block mx-auto w-50 w-full aspect-square object-contain  transform transition duration-500 group-hover:scale-105" 
                            alt="Card image"
                        />
                        </div>
    
                        <!-- Content -->
                        <div class="p-6 bg-black text-white text-center">
                        <h3
                            class="text-white text-xl font-semibold transition-colors duration-300 group-hover:text-orange-600">
                            {{ $category->name }}
                        </h3>
    
                      
                        </div>
    
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
         
    </div>
</main>