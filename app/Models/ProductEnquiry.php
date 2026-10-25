<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{
     use HasFactory;

     protected $fillable = [
        'product_id',
        'product_name',
         'product_path',
        'company_name',
        'email',
        'mobile_no',
        'state',
        'city',
        'message',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
