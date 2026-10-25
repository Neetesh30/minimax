<main>

<livewire:page-banner />

    <section class="products bg-gray-50">

         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative">
              <h2 class="text-4xl font-semibold">Products</h2>  

        <ul class="flex items-center space-x-2 pt-10">

            @php
                $breadcrumbs = [];
                if($category) $breadcrumbs[] = ['name' => $category->name, 'url' => route('products.byCategory', $category->slug)];
                if($subcategory) $breadcrumbs[] = ['name' => $subcategory->name, 'url' => route('products.bySubcategory', $subcategory->slug)];
                if($subsubcategory) $breadcrumbs[] = ['name' => $subsubcategory->name, 'url' => route('products.bySubsubcategory', $subsubcategory->slug)];
            @endphp

            @foreach($breadcrumbs as $index => $crumb)
                <li class="flex items-center gap-2 text-base font-medium {{ $index === count($breadcrumbs)-1 ? 'text-slate-900 font-semibold' : 'text-slate-500' }}">
                    <a href="{{ $crumb['url'] }}" class="hover:text-gray-700 transition-colors duration-300">{{ $crumb['name'] }}</a>
                    @if($index < count($breadcrumbs)-1)
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-slate-500 w-3" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                                clip-rule="evenodd"></path>
                        </svg>
                    @endif
                </li>
            @endforeach

        </ul>

    
        <div class="mt-12 products-container">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3  gap-6">
                
                @forelse($products as $product)
                <div>
                    <a href="{{ route('products.show', $product->slug) }}">
                        <div
                            class="group bg-white/40 border border-gray-200 shadow-md w-full max-w-sm rounded-lg mx-auto transform hover:transition duration-300" style="background: #CCD9D9;
                                background: linear-gradient(180deg, rgba(204, 217, 217, 1) 2%, rgba(204, 217, 217, 1) 9%, rgba(204, 217, 217, 1) 17%, rgba(240, 243, 241, 1) 35%, rgba(224, 232, 230, 1) 70%, rgba(240, 243, 241, 1) 96%);">

                            <!-- Image Wrapper -->
                            <div class="aspect-[1/1] overflow-hidden">
                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    class="block mx-auto w-full aspect-square object-contain transform transition duration-500 group-hover:scale-105"
                                    alt="{{ $product->name }}"
                                />
                            </div>

                            <!-- Content -->
                            <div class="p-6 bg-black text-center">
                                <h3
                                    class="text-white text-xl font-semibold transition-colors duration-300 group-hover:text-orange-600">
                                    {{ $product->name }}
                                </h3>
                            </div>

                        </div>
                    </a>
                </div>
                @empty
                    <p class="text-gray-500 col-span-full">No products found.</p>
                @endforelse

            </div>
        </div>


            <!-- Pagination -->
            <div class="mt-12 pagination" wire:navigate>
                {{ $products->links() }}
            </div>


         </div>

      
    </section>
    
</main>