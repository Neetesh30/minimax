@component('mail::message')
# Warranty Registration Confirmation

Thank you for purchasing a Minimax Fire Extinguisher.

Registering your product for warranty provides confirmation about the product’s authenticity from Minimax and expedites complaint resolution during the warranty period.

### Your Registration Details:

* **Type:** {{ ucfirst($registration->type) }}
* **Organisation/Individual Name:** {{ $registration->organisation_name }}
* **Batch No:** {{ $registration->batch_no }}
* **Serial From:** {{ $registration->serial_from }}
* **Serial To:** {{ $registration->serial_to }}

@component('mail::panel')
If you encounter any problems with online registration, please write to **info@minimax.co.in** for assistance.
@endcomponent

Thanks,<br>
The Minimax Team
@endcomponent