<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductEnquiry;
use App\Mail\ProductEnquiryMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ProductEnquiryForm extends Component
{
    public $product;
    public $showModal = false; // controls modal visibility
    public $showToast = false;
    public $success = false;

    // Form fields
    public $product_name;
    public $product_path;
    public $company_name;
    public $email;
    public $mobile_no;
    public $state;
    public $city;
    public $message;

    protected $rules = [
        'company_name' => 'required|string|max:255',
        'email'        => 'required|email',
        'mobile_no'    => 'required|regex:/^[6-9][0-9]{9}$/',
        'state'        => 'required|string|max:255',
        'city'         => 'required|string|max:255',
        'message'      => 'nullable|string',
    ];

    protected $validationAttributes = [
        'mobile_no' => 'Mobile Number',
    ];

    public function mount($product)
    {
        $this->product = $product;
        $this->product_name = $product->name;

        // Build product path
        $parts = [];
        if ($product->category) $parts[] = $product->category->name;
        if ($product->subcategory) $parts[] = $product->subcategory->name;
        if ($product->subsubcategory) $parts[] = $product->subsubcategory->name;
        $parts[] = $product->name;

        $this->product_path = implode(' > ', $parts);
    }

    // Open modal
    public function openModal()
    {
        $this->showModal = true;
        $this->success= null;
    }

    // Close modal
    public function closeModal()
    {
        $this->showModal = false;
        $this->success= null;
    }

    // Submit form
    public function submit()
    {
        $this->validate();

        ProductEnquiry::create([
            'product_id'   => $this->product->id,
            'product_name' => $this->product_name,
            'product_path' => $this->product_path,
            'company_name' => $this->company_name,
            'email'        => $this->email,
            'mobile_no'    => $this->mobile_no,
            'state'        => $this->state,
            'city'         => $this->city,
            'message'      => $this->message,
        ]);

           try {
         // Send email
           Mail::to('info@minimax.co.in')
            ->send(new ProductEnquiryMail([
                 'product_name' => $this->product_name,
                    'product_path' => $this->product_path,
                    'company_name' => $this->company_name,
                    'email'        => $this->email,
                    'mobile_no'    => $this->mobile_no,
                    'state'        => $this->state,
                    'city'         => $this->city,
                    'message'      => $this->message,
            ]));
    } catch (\Exception $e) {
        Log::error('Mail error: '.$e->getMessage());
        // Optional: show message but don't crash
    }

        $this->success = true;

        $this->reset(['company_name','email','mobile_no','state','city','message']);

        
    }

    public function render()
    {
        return view('livewire.product-enquiry-form');
    }
}
