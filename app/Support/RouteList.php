<?php

namespace App\Support;

use Illuminate\Support\Facades\Route;

class RouteList
{
    /**
     * Get frontend routable pages for SEO selection
     */
    public static function seoRoutes(): array
    {
        return collect(Route::getRoutes())
            ->filter(function ($route) {
                return
                    $route->getName() &&                              // must be named
                    !str_starts_with($route->getName(), 'filament.') && // exclude Filament
                    !str_starts_with($route->getName(), 'api.') &&      // exclude API
                    !str_starts_with($route->uri(), '_') &&             // exclude internal
                    !str_contains($route->uri(), '{');                  // exclude dynamic
            })
            ->mapWithKeys(function ($route) {
                return [
                    $route->getName() =>
                        $route->getName() . '  →  /' . $route->uri()
                ];
            })
            ->sortKeys()
            ->toArray();
    }
}
