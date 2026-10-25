<main class="bg-slate-100">

 <section class="py-32 bg-slate-100">
  <div class="flex items-center justify-center md:h-screen p-4 py-5">
      <div class="w-full max-w-5xl mx-auto">
        <div class="grid md:grid-cols-2 gap-16 bg-slate-100 w-full sm:p-8 relative">
          <div>
            <div class="mb-12">
              <a href="javascript:void(0)">
                  <img src="{{ asset('front/images/minimax-logo.png') }}" alt="logo" class="w-40 inline-block" />
              </a>
            </div>

            <div class="md:space-y-8 space-y-4">
              <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 bg-orange-600 fill-white rounded-full p-1 shrink-0" viewBox="0 0 24 24">
                  <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000"></path>
                </svg>
                <h4 class="text-slate-900 text-base font-medium">Create Your Account</h4>
              </div>
              <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 bg-orange-600 fill-white rounded-full p-1 shrink-0" viewBox="0 0 24 24">
                  <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000"></path>
                </svg>
                <h4 class="text-slate-900 text-base font-medium">Simple & Secure Registration</h4>
              </div>
              <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 bg-orange-600 fill-white rounded-full p-1 shrink-0" viewBox="0 0 24 24">
                  <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000"></path>
                </svg>
                <h4 class="text-slate-900 text-base font-medium">Terms and Conditions Agreement</h4>
              </div>
            </div>
          </div>

       
          <form wire:submit.prevent="register" class="space-y-4" wire:key="customer-register-form">

            <!-- Name -->
            <input wire:model="name" type="text" placeholder="Full Name"
                class="w-full px-3 py-2 border rounded" />
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <!-- Email -->
            <input wire:model="email" type="email" placeholder="Email"
                class="w-full px-3 py-2 border rounded" />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <!-- Phone + OTP button -->
            <div class="flex gap-3">
                <input wire:model="phone" type="text" placeholder="Phone"
                    class="flex-1 px-3 py-2 border rounded" />
                <button type="button" wire:click="sendOtp"
                    class="bg-orange-600 text-white px-4 py-2 rounded">
                    Send OTP
                </button>
            </div>
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <!-- OTP Section -->
            <div wire:key="otp-section">
                @if ($otpSent)
                    <div class="flex gap-3 mt-3">
                        <input wire:model="otp" type="text" placeholder="OTP"
                            class="flex-1 px-3 py-2 border rounded" />

                        <button type="button" wire:click="verifyOtp"
                            class="bg-orange-600 text-white px-4 py-2 rounded">
                            Verify
                        </button>
                    </div>
                @endif
            </div>

            <!-- Pincode -->
            <input wire:model="pincode" type="text" placeholder="Pincode"
                class="w-full px-3 py-2 border rounded" />
            @error('pincode') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <!-- Customer Account -->
            <input wire:model="customer_account" type="text" placeholder="Customer Account No"
                class="w-full px-3 py-2 border rounded" />
            @error('customer_account') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

               <p class="font-small">
                 Note:  Customer Account is mentioned on our invoice issued to you. In case of any clarification kindly connect with your GIPL contact or mail us on info@minimax.co.in
                </p>
         
            <!-- Password -->
            <input wire:model="password" type="password" placeholder="Password"
                class="w-full px-3 py-2 border rounded" />
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <!-- Confirm Password -->
            <input wire:model="password_confirmation" type="password" placeholder="Confirm Password"
                class="w-full px-3 py-2 border rounded" />


            <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 rounded-sm" />
                <label for="remember-me" class="ml-3 block text-sm text-slate-600">
                  I accept the <a href="/terms-and-conditions" class="text-blue-600 font-medium hover:underline ml-1">Terms and Conditions</a>
                </label>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-orange-600 text-white py-2 rounded">
                Register
            </button>

            <p class="text-sm text-slate-600 mt-6 text-center">Already have an account? <a href="/customer/login" class="text-blue-600 font-medium hover:underline ml-1">Login here</a>

        </form>

          <div class="divider absolute left-0 right-0 mx-auto w-1 h-full border-l border-slate-400 max-md:hidden"></div>
        </div>
      </div>
    </div>

 </section>

<script>
    document.addEventListener('livewire:init', () => {
        window.addEventListener('notify', (e) => {
            alert(e.detail.message);
        });
    });
</script>


</main>



