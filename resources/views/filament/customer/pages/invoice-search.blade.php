<x-filament-panels::page>
    <div class="space-y-6">
        <div class="flex items-center  gap-3 space-x-3">
            <div class="w-1/3">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                    Your Registered Pincode
                </label>
                <input
                    type="text"
                    wire:model="pincode"
                    readonly
                    disabled
                    class="w-full  flex-1 rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:border-primary-500 focus:ring-primary-500 cursor-not-allowed"
                />
            </div>

            <x-filament::button wire:click="search" icon="heroicon-o-arrow-path">
                Refresh
            </x-filament::button>
        </div>

        @if ($this->shouldShowTable())
            @if ($this->getTableQuery()->count() > 0)
                {{ $this->table }}
            @else
                <div class="flex flex-col items-center justify-center py-10 text-center text-gray-600 dark:text-gray-300">
                    <x-heroicon-o-document-text class="w-8 h-8 mb-2 text-gray-400" />
                    <h3 class="text-base font-semibold">No invoices found</h3>
                    <p class="text-sm">No invoices available for your registered pincode ({{ $pincode }}).</p>
                </div>
            @endif
        @endif
    </div>

     {{-- ✅ Image below the table --}}
    <div class="flex justify-center mt-10">
        <img 
            src="{{ asset('front/images/logo.png') }}" 
            alt="Invoice Banner" 
            class="rounded-xl shadow-lg w-full max-w-3xl"
        >
    </div>
    
</x-filament-panels::page>
