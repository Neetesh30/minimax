<main>

    <div x-data="{ openIndex: null }" class="space-y-4">

        @foreach ($product->faqs as $i => $faq)
            
            <div class="border-b pb-4 w-full">
                
                <!-- Button -->
                <button 
                    @click="openIndex = openIndex === {{ $i }} ? null : {{ $i }}"
                    class="w-full flex items-center justify-between text-left font-medium text-slate-900 text-base py-3 transition"
                >
                    <span>{{ $faq->question }}</span>

                    <svg 
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 transform transition-transform duration-300"
                        :class="{ 'rotate-180': openIndex === {{ $i }} }"
                        viewBox="0 0 451.847 451.847"
                    >
                        <path
                            d="M225.923 354.706c-8.098 0-16.195-3.092-22.369-9.263L9.27 151.157c-12.359-12.359-12.359-32.397 0-44.751 
                            12.354-12.354 32.388-12.354 44.748 0l171.905 171.915 
                            171.906-171.909c12.359-12.354 32.391-12.354 44.744 0 
                            12.365 12.354 12.365 32.392 0 44.751L248.292 345.449c-6.177 
                            6.172-14.274 9.257-22.369 9.257z" />
                    </svg>
                </button>

                <!-- Answer -->
                <div 
                    class="overflow-hidden transition-all duration-300 w-full"
                    x-ref="content{{ $i }}"
                    x-bind:style="openIndex === {{ $i }} 
                        ? 'max-height:' + $refs['content{{ $i }}'].scrollHeight + 'px;' 
                        : 'max-height:0;'"
                >
                    <div class="w-full py-3">
                        <p class="text-base text-slate-700 leading-relaxed w-full">
                            {!! nl2br(e($faq->answer)) !!}
                        </p>
                    </div>
                </div>

            </div>

        @endforeach

    </div>

</main>
