<main>
    
<section class="bg-black/80 px-12 py-24 reveal">

    <div class="max-w-7xl mx-auto">
        <p class="text-orange-600 text-sm font-bold uppercase mb-3 tracking-widest">
            Sectors
        </p>

    <h2 class="text-4xl text-white font-semibold">Industries We Serve</h2>
    
      <div class="grid grid-cols-1 md:grid-cols-3  lg:grid-cols-4 gap-6 mt-12">
            @foreach ($industries as $industry)
            <a href="{{ route('industry.details', ['slug' => $industry->slug]) }}">
                <div
                    class="aspect-[1/1] group relative  h-100 overflow-hidden rounded-2xl cursor-pointer
                        will-change-transform
                        transition-transform duration-700 ease-[cubic-bezier(0.16,1,0.3,1)]
                        hover:-translate-y-1.5">

                    <!-- Background Image -->
                    <div
                        class="absolute inset-0 bg-cover bg-center
                            will-change-transform
                            transition-transform duration-1000 ease-[cubic-bezier(0.16,1,0.3,1)]
                            group-hover:scale-150"
                        style="background-image: url('{{ asset('storage/' . $industry->image) }}')">
                    </div>

                    <!-- Overlay -->
                    <div
                        class="absolute inset-0 bg-black/40
                            transition-opacity duration-700 ease-[cubic-bezier(0.16,1,0.3,1)]
                            group-hover:bg-black/55">
                    </div>

                    <!-- Soft Shadow Layer -->
                    <div
                        class="absolute inset-0 rounded-2xl
                            transition-shadow duration-700 ease-[cubic-bezier(0.16,1,0.3,1)]
                            group-hover:shadow-[0_20px_40px_rgba(0,0,0,0.35)]">
                    </div>

                    <!-- Content -->
                    <div class="relative z-10 h-full flex items-end p-6">
                    
                            <h3
                                class="text-white text-xl font-medium tracking-wide
                                    transition-transform duration-700 ease-[cubic-bezier(0.16,1,0.3,1)]
                                    group-hover:-translate-y-1">
                                {{ $industry->name }}
                            </h3>
                                        
                    </div>
                </div>
            </a>
            @endforeach
       </div>

    </div>

</section>

</main>
