<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
     protected $fillable = [
        'title','subtitle','logo','address','city','pincode',
        'phone','email','latitude','longitude','is_active'
    ];

    public function scopeDistance($q, $lat, $lng)
    {
        return $q->selectRaw("
            *, (6371 * acos(
                cos(radians(?)) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians(?)) +
                sin(radians(?)) *
                sin(radians(latitude))
            )) AS distance
        ", [$lat, $lng, $lat]);
    }
    
}
