<?php

namespace App\Traits;

use App\Models\SeoMeta;
use App\Models\SeoSetting;

trait HasSeo
{
    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }

    public function getSeoMeta(): array
    {
        $global = SeoSetting::global();
        $local  = $this->seo;

        return [
            'title'       => $local?->title ?? $this->name ?? $global->title,
            'description' => $local?->description ?? $global->description,
            'keywords'    => $local?->keywords ?? $global->keywords,
            'og_image'    => $local?->og_image ?? $global->og_image,
            'canonical'   => $local?->canonical_url ?? url()->current(),
            'schema'      => array_merge(
                $global->schema ?? [],
                $local?->schema ?? []
            ),
        ];
    }
}
