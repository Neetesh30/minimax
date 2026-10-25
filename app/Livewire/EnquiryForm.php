<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Enquiry;
use App\Mail\EnquiryMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class EnquiryForm extends Component
{

      public $name, $organisation, $email, $phone, $city, $state, $message;
      public $success = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'organisation' => 'required|string|max:255',
        'email' => ['required', 'email', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
        'phone' => ['required', 'digits:10', 'regex:/^[6-9]\d{9}$/'], // Indian 10-digit number
        'city' => 'required|string|max:100',
        'state' => 'required|string|max:100',
        'message' => 'required|string',
    ];

    public function submit()
{
    $this->validate();

    Enquiry::create([
        'name' => $this->name,
        'organisation' => $this->organisation,
        'email' => $this->email,
        'phone' => $this->phone,
        'city' => $this->city,
        'state' => $this->state,
        'message' => $this->message,
    ]);

    try {
        Mail::to('info@minimax.co.in')
            ->send(new EnquiryMail([
                'name' => $this->name,
                'organisation' => $this->organisation,
                'email' => $this->email,
                'phone' => $this->phone,
                'city' => $this->city,
                'state' => $this->state,
                'message' => $this->message,
            ]));
    } catch (\Exception $e) {
        Log::error('Mail error: '.$e->getMessage());
        // Optional: show message but don't crash
    }

    $this->reset(['name','organisation','email','phone','city','state','message']);
    $this->success = true;
}

    public function render()
    {
        return view('livewire.enquiry-form');
    }
}
