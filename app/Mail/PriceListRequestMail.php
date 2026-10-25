<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PriceListRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public array $items,
        public float $grandTotal,
        public string $customerName,
        public string $customerEmail
    ) {}

    public function build()
    {
        return $this
            ->subject('Price List Request from Customer')
            ->view('emails.price-list-request')
            ->attachData(
                $this->pdf(),
                'price-list.pdf',
                ['mime' => 'application/pdf']
            );
    }

    protected function pdf(): string
    {
        return \Barryvdh\DomPDF\Facade\Pdf::loadView(
            'pdf.price-list',
            [
                'items' => $this->items,
                'grandTotal' => $this->grandTotal,
            ]
        )->output();
    }
}
