<main class="py-19 bg-gray-50">

    <section class="">
        <img src="{{ asset('front/images/contactusmain.jpg') }}" alt="" class="w-full">
    </section>

     <section class="p-8 lg:p-16 bg-gray-50 reveal">
          
       <div class="max-w-7xl mx-auto px-4">

          <p class="blue text-sm font-semibold font-bold uppercase mb-3 tracking-widest">Find Us</p>
            <h2 class="text-4xl font-bold mb-10">Our Branched Across India</h2>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($offices as $office)
                <div class="group bg-white/70 backdrop-blur-xl rounded-2xl shadow-md p-6 
                           transition-all duration-300 ease-out 
                           hover:shadow-xl hover:-translate-y-2 hover:bg-white/90 animate-fadeIn"
                >
                    <h5 class="text-xl font-bold blue group-hover:text-orange-600 transition">
                        {{ $office->title }}
                    </h5>

                    <h3 class="text-sm text-gray-500 mt-1 border-b border-gray-300 pb-2 ">
                        {{ $office->company_name }}
                    </h3>

                    <div class="mt-4 space-y-1 text-gray-700">
                          
                        <p><span class="font-semibold">Address:</span> {{ $office->address }}</p>
                       
                    </div>

                    <p class="text-gray-700 mt-4">
                        <span class="font-semibold">Phone No:</span> 
                        {{ $office->phone }}
                    </p>

                    <p class="text-gray-700 mt-2">
                        <span class="font-semibold">Email:</span>
                        <a 
                            href="mailto:{{ $office->email }}"
                            class="text-black-600 hover:underline break-all"
                        >
                            {{ $office->email }}
                        </a>
                    </p>
                </div>
            @empty
                <div class="col-span-full">
                    <div 
                        class="bg-yellow-100 border border-yellow-200 text-yellow-800 
                               px-6 py-4 rounded-xl text-center font-medium animate-fadeIn"
                    >
                        No offices available.
                    </div>
                </div>
            @endforelse
        </div>

       </div>

     </section>
   
</main>
