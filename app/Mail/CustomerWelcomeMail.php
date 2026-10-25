<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Customer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $customer;

    /**
     * Create a new message instance.
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

     public function build()
    {
        return $this->subject('Thanks for Registering on Minimax')
            ->view('emails.customer_welcome');
    }
}
