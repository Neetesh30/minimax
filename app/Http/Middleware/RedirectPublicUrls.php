<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RedirectPublicUrls
{
    public function handle(Request $request, Closure $next): Response
    {
        // Inspect the browser URI: Apache may already have stripped the base
        // directory from Laravel's path when serving public/index.php.
        $uri = $request->getRequestUri();
        // Apache preserves the original browser request here even when an
        // internal rewrite changes REQUEST_URI to /public/...
        $originalRequest = $request->server('THE_REQUEST');
        if (is_string($originalRequest)
            && preg_match('#^\S+\s+(/\S*)\s+HTTP/#', $originalRequest, $matches)) {
            $uri = $matches[1];
        }
        $path = explode('?', $uri, 2)[0];

        if (preg_match('#^/public(?:/|$)#i', $path)) {
            $target = preg_replace('#^/public(?=/|$)#i', '', $path);
            $target = '/'.ltrim($target, '/');
            $query = str_contains($uri, '?') ? '?'.explode('?', $uri, 2)[1] : '';

            // Preserve form methods and bodies if an old action URL is used.
            // Bypass Laravel's URL generator: its detected /public base path
            // must not be prepended to the clean Location header.
            return new RedirectResponse($target.$query, $request->isMethodSafe() ? 301 : 308);
        }

        return $next($request);
    }
}
