<main>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">

        <div class="w-full max-w-md bg-white shadow-xl rounded-xl p-8 border border-gray-200">

            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">
                Customer Registration
            </h2>

            <form wire:submit.prevent="register" class="space-y-4">

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input
                        type="text"
                        wire:model.defer="name"
                        placeholder="Enter full name"
                        required
                        class="w-full rounded-lg border-gray-300 border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 px-3 py-2"
                    >
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input
                        type="email"
                        wire:model.defer="email"
                        placeholder="Enter email"
                        required
                        class="w-full rounded-lg border-gray-300 border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 px-3 py-2"
                    >
                </div>

                {{-- Phone + OTP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <div class="flex gap-3">
                        <input
                            type="text"
                            wire:model.defer="phone"
                            placeholder="Phone"
                            class="flex-1 rounded-lg border-gray-300 border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 px-3 py-2"
                        >
                        <button
                            type="button"
                            wire:click="sendOtp"
                            class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition"
                        >
                            Send OTP
                        </button>
                    </div>
                </div>

                {{-- OTP Field --}}
                @if($otpSent)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">OTP Verification</label>
                        <div class="flex gap-3">
                            <input
                                type="text"
                                wire:model.defer="otp"
                                placeholder="Enter OTP"
                                class="flex-1 rounded-lg border-gray-300 border focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 px-3 py-2"
                            >
                            <button
                                type="button"
                                wire:click="verifyOtp"
                                class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition"
                            >
                                Verify
                            </button>
                        </div>
                    </div>
                @endif

                {{-- Pincode --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pincode</label>
                    <input
                        type="text"
                        wire:model.defer="pincode"
                        placeholder="Enter pincode"
                        required
                        class="w-full rounded-lg border-gray-300 border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 px-3 py-2"
                    >
                </div>

                {{-- Customer Account --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Customer Account Number</label>
                    <input
                        type="text"
                        wire:model.defer="customer_account"
                        placeholder="Customer account number"
                        required
                        class="w-full rounded-lg border-gray-300 border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 px-3 py-2"
                    >
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input
                        type="password"
                        wire:model.defer="password"
                        placeholder="Enter password"
                        required
                        class="w-full rounded-lg border-gray-300 border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 px-3 py-2"
                    >
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input
                        type="password"
                        wire:model.defer="password_confirmation"
                        placeholder="Confirm password"
                        required
                        class="w-full rounded-lg border-gray-300 border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 px-3 py-2"
                    >
                </div>

                {{-- Submit Button --}}
                <button
                    type="submit"
                    class="w-full py-3 bg-orange-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition"
                >
                    Register
                </button>

            </form>
        </div>

    </div>

    {{-- Notification Script --}}
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('notify', (data) => {
                Toastify({
                    text: data.message,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    close: true,
                }).showToast();
            });
        });
    </script>
</main>
