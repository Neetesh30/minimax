<main class="bg-gray-50 font-sans text-gray-900">

    {{-- Hero Section --}}
    <section class="relative h-[70vh] flex items-center text-white overflow-hidden">
        {{-- Background Image with Overlay --}}
        <div class="absolute inset-0">
            <img src="{{ asset('storage/' . $industry->image) }}"
                 alt="{{ $industry->name }}"
                 class="w-full h-full object-cover transform scale-105 transition-transform duration-500 ease-in-out hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/20 to-black/50"></div>
        </div>

        {{-- Hero Text --}}
        <div class="relative z-10  px-6 py-12 bg-black/30 max-w-4xl space-y-3">
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-white drop-shadow-lg animate-fade-in">
                {{ $industry->name }}
            </h1>
            <div class="w-28 h-1 bg-orange-500  mt-6 rounded-full animate-pulse"></div>
            <p class="mt-6 text-lg md:text-xl text-white max-w-2xl  animate-fade-in-delay">
                {!! $industry->intro !!}
            </p>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="max-w-7xl py-20 px-6 md:px-12 mx-auto space-y-16">

        {{-- Key Risks --}}
        @if($industry->key_risks)
        <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Key Fire Risks</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($industry->key_risks as $risk)
                    <div class="p-6 bg-white rounded-xl shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-1">
                        <div class="flex items-start gap-4">
                           
                             <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.75 18.5V8.67794L19.25 10.1779V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.314L19.2936 3.77034C19.3842 3.67974 19.4806 3.59848 19.5816 3.52657C19.2607 3.35027 18.8921 3.25 18.5 3.25H5.5C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5C19.7426 20.75 20.75 19.7426 20.75 18.5Z" fill="#323544"/>
                                    <path d="M20.4838 6.51868C20.7767 6.22578 20.7767 5.75091 20.4838 5.45802C20.1909 5.16512 19.7161 5.16512 19.4232 5.45802L11.9298 12.9514L8.57686 9.59849C8.28396 9.3056 7.80909 9.3056 7.5162 9.5985C7.22331 9.89139 7.22331 10.3663 7.5162 10.6592L11.3995 14.5424C11.6924 14.8353 12.1672 14.8353 12.4601 14.5424L20.4838 6.51868Z" fill="#323544"/>
                                </svg>
                                
                            <p class="text-gray-800 font-medium">{{ $risk['risk'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Solutions --}}
        @if($industry->solutions)
        <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Recommended Minimax Solutions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($industry->solutions as $solution)
                    <div class="p-6 bg-white rounded-xl shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-1">
                        <div class="flex items-start gap-4">
                           
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.75 18.5V8.67794L19.25 10.1779V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.314L19.2936 3.77034C19.3842 3.67974 19.4806 3.59848 19.5816 3.52657C19.2607 3.35027 18.8921 3.25 18.5 3.25H5.5C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5C19.7426 20.75 20.75 19.7426 20.75 18.5Z" fill="#323544"/>
                                    <path d="M20.4838 6.51868C20.7767 6.22578 20.7767 5.75091 20.4838 5.45802C20.1909 5.16512 19.7161 5.16512 19.4232 5.45802L11.9298 12.9514L8.57686 9.59849C8.28396 9.3056 7.80909 9.3056 7.5162 9.5985C7.22331 9.89139 7.22331 10.3663 7.5162 10.6592L11.3995 14.5424C11.6924 14.8353 12.1672 14.8353 12.4601 14.5424L20.4838 6.51868Z" fill="#323544"/>
                                </svg>
                                
                            <p class="text-gray-800 font-medium">{{ $solution['solution'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Why Choose Us --}}
        @if($industry->why_choose_us)
        <div class="bg-gradient-to-r from-gray-100 via-white to-gray-100 p-10 rounded-2xl shadow-lg space-y-3">
            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Why Minimax?</h3>
            <p class="text-gray-700 text-lg md:text-xl max-w-3xl leading-relaxed">
                {!! $industry->why_choose_us !!}
            </p>
        </div>
        @endif

    </section>

   

</main>