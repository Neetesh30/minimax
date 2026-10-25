<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResourcePdf extends Model
{
    protected $fillable = [
        'resource_category_id',
        'title',
        'file',
        'order',
        'is_active',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ResourceCategory::class, 'resource_category_id');
    }
}
