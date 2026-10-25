<?php

namespace App\Livewire;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Filament\Forms\Components\TextInput;
use Livewire\Component;

class CustomerRegister extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $name, $email, $phone, $pincode, $customer_account, $password, $password_confirmation;

    public $requestId; // Returned by MSG91
    public $otp;

    public function mount()
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required(),
            TextInput::make('email')->email()->required(),
            TextInput::make('phone')->required(),
            TextInput::make('pincode')->required(),
            TextInput::make('customer_account')->required(),
            TextInput::make('password')->password()->required()->minLength(8),
            TextInput::make('password_confirmation')->password()->same('password'),
            TextInput::make('otp')->label('Enter OTP'),
        ];
    }

    # ----------------------------------------------------------
    # SEND OTP USING MSG91
    # ----------------------------------------------------------
    public function sendOtp()
    {
        $response = Http::post("https://control.msg91.com/api/v5/otp", [
            "mobile" => $this->phone,
            "template_id" => env('MSG91_TEMPLATE_ID'),
            "authkey" => env('MSG91_AUTH_KEY'),
        ]);

        if ($response->failed()) {
            Notification::make()->danger()->title("OTP sending failed")->send();
            return;
        }

        $this->requestId = $response->json()['request_id'];

        Notification::make()->success()->title("OTP sent successfully")->send();
    }

    # ----------------------------------------------------------
    # VERIFY OTP USING MSG91
    # ----------------------------------------------------------
    public function verifyOtp()
    {
        $response = Http::post("https://control.msg91.com/api/v5/otp/verify", [
            "otp" => $this->otp,
            "authkey" => env('MSG91_AUTH_KEY'),
            "mobile" => $this->phone,
        ]);

        if ($response->json()['type'] != "success") {
            Notification::make()->danger()->title("Invalid OTP")->send();
            return;
        }

        Notification::make()->success()->title("OTP Verified")->send();
    }

    # ----------------------------------------------------------
    # REGISTER CUSTOMER
    # ----------------------------------------------------------
    public function register()
    {

         $this->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|digits:10|unique:customers,phone',
            'pincode' => 'required',
            'customer_account' => 'required',
            'password' => 'required|min:8|same:password_confirmation',
        ]);
        
        // Insert into DB
        Customer::create([
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "pincode" => $this->pincode,
            "customer_account" => $this->customer_account,
            "password" => Hash::make($this->password),
            "is_approved" => false
        ]);

        Notification::make()
            ->success()
            ->title("Registered! Waiting for admin approval")
            ->send();
    }

    public function render()
    {
        return view('livewire.customer-register');
    }
}
