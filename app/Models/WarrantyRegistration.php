<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class WarrantyRegistration extends Model
{
     use HasFactory;

     protected $fillable = [
        'type',
        'organisation_name',
        'gunnebo_invoice_no',
        'dealer_invoice_no',
        'end_customer_name',
        'batch_no',
        'serial_from',
        'serial_to',
        'mobile',
        'email',
    ];
}
