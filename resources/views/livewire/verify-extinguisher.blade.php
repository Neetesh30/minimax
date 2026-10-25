<main class="bg-gray-50 min-h-screen">

<livewire:page-banner />

    <div class="max-w-screen-xl py-12 mx-auto">
        <div class="grid lg:grid-cols-3 justify-center items-center gap-y-24">
            
            <div class="relative lg:h-screen flex items-center justify-center">
                    <img src="{{ asset('front/images/minimax-extinguisher.png') }}"
                        alt="Verification illustration image"
                        class="w-3/4 h-3/4 object-contain"
                    />
            </div>

            <div class="lg:col-span-2 p-8 w-full max-w-2xl mx-auto">
                <div>
                    <h2 class="text-3xl text-slate-900 font-bold">Verify Your Extinguisher</h2>
                    <p class="text-[15px] text-slate-600 leading-relaxed mt-4">Enter the details below to verify the authenticity and status of your fire extinguisher.</p>
                </div>

                @if (session('success'))
                    <div class="relative px-4 py-3 mb-4 mt-6 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
                        {{ session('success') }}
                        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';" aria-label="Close">
                            <svg class="h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endif
                
                <form wire:submit.prevent="submit" class="mt-8" novalidate>
                    <div class="grid sm:grid-cols-2 gap-4">
                        
                        <div>
                            <label for="batch_number" class='text-sm text-slate-900 font-medium mb-2 block'>Batch Number</label>
                            <input type="text" wire:model="batch_number" id="batch_number"
                                class="w-full py-3 px-4 text-slate-800 bg-white border border-gray-300 focus:border-slate-900 text-sm outline-0 rounded-md" 
                                placeholder="Enter batch number">
                            @error('batch_number') 
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div> 
                            @enderror
                        </div>
                        
                        <div>
                            <label for="serial_number" class='text-sm text-slate-900 font-medium mb-2 block'>Serial Number</label>
                            <input type="text" wire:model="serial_number" id="serial_number"
                                class="w-full py-3 px-4 text-slate-800 bg-white border border-gray-300 focus:border-slate-900 text-sm outline-0 rounded-md" 
                                placeholder="Enter serial number">
                            @error('serial_number') 
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div> 
                            @enderror
                        </div>
                        
                        <div class="col-span-full">
                            <label for="organisation" class='text-sm text-slate-900 font-medium mb-2 block'>Organisation / Individual Name</label>
                            <input type="text" wire:model="organisation" id="organisation"
                                class="w-full py-3 px-4 text-slate-800 bg-white border border-gray-300 focus:border-slate-900 text-sm outline-0 rounded-md" 
                                placeholder="Enter organisation name">
                            @error('organisation') 
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div> 
                            @enderror
                        </div>
                        
                        <div>
                            <label for="mobile" class='text-sm text-slate-900 font-medium mb-2 block'>Mobile Number</label>
                            <input type="text" wire:model="mobile" id="mobile"
                                class="w-full py-3 px-4 text-slate-800 bg-white border border-gray-300 focus:border-slate-900 text-sm outline-0 rounded-md" 
                                placeholder="Enter 10-digit mobile number">
                            @error('mobile') 
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div> 
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class='text-sm text-slate-900 font-medium mb-2 block'>Email</label>
                            <input type="email" wire:model="email" id="email"
                                class="w-full py-3 px-4 text-slate-800 bg-white border border-gray-300 focus:border-slate-900 text-sm outline-0 rounded-md" 
                                placeholder="Enter your email address">
                            @error('email') 
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                    </div>
                    
                    <button type="submit" 
                        class="text-white bg-orange-600 font-medium hover:bg-orange-500 tracking-wide text-base px-4 py-3 w-full border-0 outline-0 rounded-md cursor-pointer mt-6">
                        Verify
                    </button>
                </form>
            </div>

        </div>
    </div>
</main>