<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Industry extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
       'description', 
       'intro',
       'key_risks',
       'solutions',
       'why_choose_us',
        'is_active',
    ];
   
       protected $casts = [
        'key_risks' => 'array',
        'solutions' => 'array',
    ];
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($industry) {
            $industry->slug = Str::slug($industry->name);
        });
    }
    
}
