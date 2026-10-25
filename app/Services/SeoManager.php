<?php

namespace App\Services;

use App\Models\SeoSetting;
use Illuminate\Support\Facades\Route;

class SeoManager
{
    /**
     * Resolve SEO meta for the current request
     */
    public static function resolve($model = null, array $override = []): array
    {
        // 1️⃣ Route-based SEO
        $routeName = Route::currentRouteName();

        $routeSeo = SeoSetting::where('route_name', $routeName)->first();

        // 2️⃣ Model-based SEO (optional)
        $modelSeo = null;
        if ($model && method_exists($model, 'getSeoMeta')) {
            $modelSeo = $model->getSeoMeta(); // must return array
        }

        // 3️⃣ Global fallback SEO
        $globalSeo = [
            'title' => config('app.name'),
            'description' => '',
            'keywords' => '',
            'og_title' => null,
            'og_description' => null,
            'og_image' => asset('default-og.jpg'),
            'canonical' => url()->current(),
            'noindex' => false,
        ];

        // 4️⃣ Normalize route SEO
        $routeSeoArray = $routeSeo ? [
            'title' => $routeSeo->title,
            'description' => $routeSeo->description,
            'keywords' => $routeSeo->keywords,
            'og_title' => $routeSeo->og_title,
            'og_description' => $routeSeo->og_description,
            'og_image' => $routeSeo->og_image
                ? asset('storage/' . $routeSeo->og_image)
                : null,
            'canonical' => $routeSeo->canonical,
            'noindex' => $routeSeo->noindex,
        ] : [];

        // 5️⃣ Merge priority:
        // global < route < model < override
        $seo = array_merge(
            $globalSeo,
            array_filter($routeSeoArray),
            is_array($modelSeo) ? array_filter($modelSeo) : [],
            array_filter($override)
        );

        // 6️⃣ Final fallbacks
        $seo['og_title'] ??= $seo['title'];
        $seo['og_description'] ??= $seo['description'];

        return $seo;
    }
}
