<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SeoSetting extends Model
{
    protected $fillable = [
         'route_name', 'site_name','title','description','keywords',
        'og_image','twitter_image','canonical_url','noindex','schema'
    ];

    protected $casts = ['schema' => 'array'];

    public static function global()
    {
        return Cache::rememberForever('seo.global', function () {
            return self::firstOrCreate([
                'site_name' => config('app.name'),
            ]);
        });
    }
}
