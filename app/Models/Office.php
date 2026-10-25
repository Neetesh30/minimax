<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

     protected $fillable = [
        'title',
        'company_name',
        'address',
        'city_state_zip',
        'phone',
        'email',
    ];
}
