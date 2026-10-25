<?php

namespace App\Livewire;

use Livewire\Component;

// Import the Mailable class
use App\Mail\ExtinguisherVerificationMail;
use App\Models\Verification;
use Illuminate\Support\Facades\Mail;


class VerifyExtinguisher extends Component
{

    public $batch_number, $serial_number, $organisation, $mobile, $email;

    protected $rules = [
        'batch_number' => 'required|string',
        'serial_number' => 'required|string',
        'organisation' => 'required|string',
        'mobile' => 'required|digits:10',
        'email' => ['required', 'email', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
    ];

    public function submit()
    {
        $validated = $this->validate();

        // 1. Create the database record
        Verification::create($validated);

        // 2. Send confirmation email using the Mailable
        Mail::to($validated['email'])->send(new ExtinguisherVerificationMail($validated));

        // 3. Clear form fields and display success message
        $this->reset();

        session()->flash('success', 'Verification request submitted successfully! A confirmation email has been sent.');
    }


    public function render()
    {
        return view('livewire.verify-extinguisher');
    }
}