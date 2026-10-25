<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ResourceCategory extends Model
{
     protected $fillable = [
        'name',
        'slug',
        'order',
        'is_active',
    ];

     public function pdfs(): HasMany
    {
        return $this->hasMany(ResourcePdf::class)
            ->where('is_active', true)
            ->orderBy('order');
    }

}
