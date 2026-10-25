<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;
    protected $fillable = [
        'batch_number',
        'serial_number',
        'organisation',
        'mobile',
        'email',
    ];
}
