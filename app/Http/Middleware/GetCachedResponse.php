<?php

namespace App\Http\Middleware;

use App\Api\Exceptions\ApiError;
use App\Cache\Cache;
use App\Cache\CacheKeys;
use App\UrlHash;
use Closure;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

/**
 * Class GetCachedResponse
 *
 * @package App\Http\Middleware
 */
class GetCachedResponse
{

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     *
     * @return mixed
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function handle(Request $request, Closure $next)
    {
        $cache          = Cache::init();
        $cacheAvailable = $cache->isAvailable();
        if ($cacheAvailable) {
            $key = sprintf(CacheKeys::$requestKeySignature, UrlHash::init()->getMd5());
            if ($cache->has($key)) {
                return unserialize($cache->get($key));
            }
        }

        return $next($request);
    }

}
