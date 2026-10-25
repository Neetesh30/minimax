<main x-data="{ showToast: true }">

    {{-- Toast Notification --}}
    @if (session('success'))
        <div 
            x-show="showToast"
            x-init="setTimeout(() => showToast = false, 3000)"
            x-transition:enter="transform ease-out duration-300"
            x-transition:enter-start="translate-y-3 opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transform ease-in duration-300"
            x-transition:leave-start="translate-y-0 opacity-100"
            x-transition:leave-end="translate-y-3 opacity-0"
            class="fixed top-5 right-5 bg-green-600 text-white px-5 py-3 rounded-lg shadow-lg z-50"
        >
            {{ session('success') }}
        </div>
    @endif


    <div class="mt-12 max-w-xl mx-auto bg-gray-200">
        <form wire:submit.prevent="subscribe" class="flex flex-col sm:flex-row items-center bg-gray-100 rounded-md overflow-hidden">
            
            <input 
                type="email" 
                wire:model="email"
                placeholder="Enter your email" 
                class="w-full bg-transparent py-3.5 px-4 text-slate-900 text-base focus:outline-none"
            />

            <button
                class="bg-orange-600 hover:bg-orange-700 transition w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-none sm:rounded-r-md text-white cursor-pointer">
                Submit
            </button>
        </form>

        @error('email')
            <small class="text-red-500 mt-2 block">{{ $message }}</small>
        @enderror
    </div>
</main>
