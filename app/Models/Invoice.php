<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

     protected $table = 'invoices';


    // Allow mass assignment
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'customer_account',
        'customer',
        'delivery_city',
        'pin_code',
        'product',
        'code',
        'batch_no',
        'sr_no',
        'CCOM_IS_FOR_CUSTOMER',
        'CDOM_IS_FOR_DEALER',
    ];
}
