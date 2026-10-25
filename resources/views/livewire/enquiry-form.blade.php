<main class="p-1">

    <form id="enquiryForm" class="space-y-1" wire:submit.prevent="submit">

        <img src="{{ asset('front/images/about-banner-1.jpg') }}" alt="" class="hidden md:block  w-full h-48 object-cover rounded-lg mb-4">

        {{-- Success Message --}}
        @if($success)
            <div class="flex items-center gap-2 text-sm px-4 py-3 rounded-lg bg-green-50 text-green-700 border border-green-200">
                <span>✔</span> <span>Your enquiry has been submitted successfully.</span>
            </div>
        @endif

        <!-- Form Grid (Filament Style) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Name -->
            <div class="space-y-1">
               
                <input type="text"
                       wire:model.defer="name"
                       placeholder="Full Name"
                       class="w-full px-3 py-2 rounded-lg border border-gray-300 
                              bg-white text-gray-900 placeholder-gray-400
                              focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500
                              transition">
                @error('name') <p class="text-red-600 text-xs">{{ $message }}</p> @enderror
            </div>

            <!-- Organisation -->
            <div class="space-y-1">
                <input type="text"
                       wire:model.defer="organisation"
                       placeholder="Organisation"
                       class="w-full px-3 py-2 rounded-lg border border-gray-300
                              bg-white text-gray-900 placeholder-gray-400
                              focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500
                              transition">
                @error('organisation') <p class="text-red-600 text-xs">{{ $message }}</p> @enderror
            </div>

            <!-- Email -->
            <div class="space-y-1">
                <input type="email"
                       wire:model.defer="email"
                       placeholder="Email Address"
                       class="w-full px-3 py-2 rounded-lg border border-gray-300
                              bg-white text-gray-900 placeholder-gray-400
                              focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500
                              transition">
                @error('email') <p class="text-red-600 text-xs">{{ $message }}</p> @enderror
            </div>

            <!-- Phone -->
            <div class="space-y-1">
                <input type="tel"
                       wire:model.defer="phone"
                       placeholder="Mobile No"
                       class="w-full px-3 py-2 rounded-lg border border-gray-300
                              bg-white text-gray-900 placeholder-gray-400
                              focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500
                              transition">
                @error('phone') <p class="text-red-600 text-xs">{{ $message }}</p> @enderror
            </div>

            <!-- City -->
            <div class="space-y-1">
                <input type="text"
                       wire:model.defer="city"
                       placeholder="City"
                       class="w-full px-3 py-2 rounded-lg border border-gray-300
                              bg-white text-gray-900 placeholder-gray-400
                              focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500
                              transition">
                @error('city') <p class="text-red-600 text-xs">{{ $message }}</p> @enderror
            </div>

            <!-- State -->
            <div class="space-y-1">
                <input type="text"
                       wire:model.defer="state"
                       placeholder="State"
                       class="w-full px-3 py-2 rounded-lg border border-gray-300
                              bg-white text-gray-900 placeholder-gray-400
                              focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500
                              transition">
                @error('state') <p class="text-red-600 text-xs">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Full Width Message -->
        <div class="space-y-1">
            <textarea rows="4"
                      wire:model.defer="message"
                      placeholder="Message"
                      class="w-full px-3 py-2 rounded-lg border border-gray-300
                             bg-white text-gray-900 placeholder-gray-400
                             focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500
                             transition"></textarea>
            @error('message') <p class="text-red-600 text-xs">{{ $message }}</p> @enderror
        </div>

        <!-- Submit Button (Filament Style) -->
        <button type="submit"
                class="w-full py-3 rounded-lg bg-orange-600 text-white font-medium
                       hover:bg-orange-700 active:bg-orange-800
                       shadow-sm transition">
           Submit 
        </button>

    </form>
</main>
