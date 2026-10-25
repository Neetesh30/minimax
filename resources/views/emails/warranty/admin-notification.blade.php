@component('mail::message')
# New Warranty Registration Received

A new warranty registration has been submitted.

### Registration Details:

* **Type:** {{ ucfirst($registration->type) }}
* **Organisation Name:** {{ $registration->organisation_name }}
* **Batch No:** {{ $registration->batch_no }}
* **Email:** {{ $registration->email }}
* **Mobile No:** {{ $registration->mobile }}

@if ($registration->type === 'dealer')
* **Gunnebo Invoice No:** {{ $registration->gunnebo_invoice_no }}
* **Dealer Invoice No:** {{ $registration->dealer_invoice_no }}
* **End Customer Name:** {{ $registration->end_customer_name }}
@endif

* **Serial Range:** {{ $registration->serial_from }} to {{ $registration->serial_to }}

We have updated our records for the extinguisher warranty.

@endcomponent