<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use App\Services\OtpService;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

use App\Mail\CustomerWelcomeMail;
use App\Mail\AdminNewCustomerMail;
use Illuminate\Support\Facades\Mail;

class Register extends Component
{
    public $name, $email, $phone, $otp;
    public $pincode, $customer_account;
    public $password, $password_confirmation;

    public $otpSent = false;
    public $otpVerified = false;
    

    // -------------------------
    // SEND OTP
    // -------------------------
    public function sendOtp(OtpService $otpService)
    {
        if (strlen($this->phone) != 10) {
            $this->dispatch('notify', message: "Invalid phone number");
            return;
        }

        if ($otpService->sendOtp($this->phone)) {
            $this->otpSent = true;
            $this->dispatch('notify', message: "OTP sent");
        }
    }

    // -------------------------
    // VERIFY OTP
    // -------------------------
    public function verifyOtp(OtpService $otpService)
    {
        if ($otpService->verifyOtp($this->phone, $this->otp)) {
            $this->otpVerified = true;
            $this->dispatch('notify', message: "OTP verified");
        } 
        else {
            $this->dispatch('notify', message: "Invalid OTP");
        }
    }

    // -------------------------
    // REGISTER USER
    // -------------------------
    public function register()
    {
        if (!$this->otpVerified) {
            $this->dispatch('notify', message: "Please verify OTP first");
            return;
        }

        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|digits:10|unique:customers,phone',
            'pincode' => 'required',
            'customer_account' => 'required',
            'password' => 'required|min:6|same:password_confirmation',
        ]);

        $customer = Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'customer_account' => $this->customer_account,
            'password' => Hash::make($this->password),
            'is_approved' => false,
        ]);

        // -----------------------------------------
            // SEND EMAIL TO CUSTOMER
            // -----------------------------------------
            Mail::to($customer->email)->send(new CustomerWelcomeMail($customer));

            // -----------------------------------------
            // SEND EMAIL TO ADMIN
            // -----------------------------------------
            Mail::to('info@minimax.co.in')->send(new AdminNewCustomerMail($customer));

        $this->dispatch('notify', message: "Registration successful");

        $this->reset(); // clear fields
        $this->redirect('/customer/login');
    }

    public function render()
    {
        return view('livewire.customer.register');
    }
}
