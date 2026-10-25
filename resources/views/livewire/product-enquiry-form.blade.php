<main>

<div x-data="{ open: false }" class="relative">

    <!-- Trigger Button -->
    <button @click="open = true"
            class="px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700 transition">
        Enquire Now
    </button>


    <!-- Modal -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-400"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-50 flex items-center justify-center">

       <!-- Backdrop (UPDATED with blur + fade) -->
                <div @click="open = false"
                    class="absolute inset-0 bg-black/40 backdrop-blur-sm"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-400"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                </div>

        <!-- Modal Content -->
        <div class="bg-gray-50 rounded-lg shadow-lg w-full max-w-lg p-6 relative transform"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-400"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">

            <!-- Close Button -->
            <button @click="open = false"
                    class="absolute top-4 right-4 text-gray-400 hover:text-red-500 transition">
                ✕
            </button>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-center mb-2">Enquire Now</h2>
            <p class="text-sm text-center text-gray-500 mb-6">
                For product: <span class="font-medium">{{ $product->name }}</span>
            </p>

               {{-- Success Message --}}
                @if($success)
                    <div class="flex items-center gap-2 text-sm px-4 py-3 rounded-lg bg-green-50 text-green-700 border border-green-200">
                        <span>✔</span> <span>Your enquiry has been submitted successfully.</span>
                    </div>
                @endif

            <!-- Form -->
            <form wire:submit.prevent="submit" class="space-y-4">

                <input type="hidden" wire:model.defer="product_path">

                <input type="text" wire:model.defer="product_name" disabled
                       class="w-full px-4 py-2 border rounded bg-gray-100 cursor-not-allowed text-sm">

                <input type="text" wire:model.defer="company_name" placeholder="Company Name"
                       class="w-full px-4 py-2 border rounded text-sm">
                @error('company_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                <input type="email" wire:model.defer="email" placeholder="Email *"
                       class="w-full px-4 py-2 border rounded text-sm @error('email') border-red-500 @enderror">
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                <input type="text" wire:model.defer="mobile_no" placeholder="Mobile No *"
                       class="w-full px-4 py-2 border rounded text-sm @error('mobile_no') border-red-500 @enderror">
                @error('mobile_no') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                <input type="text" wire:model.defer="state" placeholder="State *"
                       class="w-full px-4 py-2 border rounded text-sm @error('state') border-red-500 @enderror">
                @error('state') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                <input type="text" wire:model.defer="city" placeholder="City *"
                       class="w-full px-4 py-2 border rounded text-sm @error('city') border-red-500 @enderror">
                @error('city') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                <textarea wire:model.defer="message" placeholder="Message" rows="3"
                          class="w-full px-4 py-2 border rounded text-sm"></textarea>

                <button type="submit"
                        class="w-full bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 transition"
                        wire:loading.attr="disabled">
                    Submit Enquiry
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener('hide-toast', event => {
        setTimeout(() => {
            Livewire.emit('set', 'showToast', false)
        }, event.detail.time);
    });
</script>

 