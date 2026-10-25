<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Newsletter;

class NewsletterForm extends Component
{

     public $email;
    public $website; // honeypot

    protected $rules = [
        'email' => 'required|email:rfc,dns|unique:newsletters,email',
    ];

    public function subscribe()
    {

        if (!empty($this->website)) {
        return; // Bot detected, ignore
       }

        $this->validate();

        Newsletter::create(['email' => $this->email]);

        session()->flash('success', 'You have subscribed successfully!');

         $this->reset('email');
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }
}
