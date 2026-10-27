<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
class NewsArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_title',
        'article_link',
        'article_category',
        'slug',
        'summary',
        'body',
        'cover_image',
        'cover_image_alt',
        'status',
        'author',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }



}
