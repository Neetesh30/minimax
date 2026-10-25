<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSeo;

class Product extends Model
{

     use HasSeo;

    protected $fillable = [
        'name', 'slug', 'category_id', 'subcategory_id','subsubcategory_id',
        'sku', 'product_code', 'capacity', 'expiry',
        'description', 'application_areas','key_features','product_badges', 'html_table', 'footer_description', 
        'status', 'price', 'image', 'images','selected_images', 
    ];

    protected $casts = [
        'images' => 'array',
        'selected_images' => 'array',
        'status' => 'boolean',
        'expiry' => 'date',
        'application_areas' => 'array',
        'key_features' => 'array',
        'product_badges' => 'array',
    ];

    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(ProductCategory::class, 'subcategory_id');
    }

     public function subsubcategory()
    {
        return $this->belongsTo(ProductCategory::class, 'subsubcategory_id');
    }

    public function faqs()
    {
        return $this->hasMany(ProductFaq::class);
    }


}
