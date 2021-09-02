<?php

namespace App\Http\Middleware;

use App\Api\Blizzard\NamespaceHeaderValidator;
use App\Api\Exceptions\ApiError;
use App\Cache\Cache;
use App\UrlHash;
use Closure;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class CacheSuccessfulResponse
 *
 * @package App\Http\Middleware
 */
class CacheSuccessfulResponse
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
        $result             = $next($request);
        $cache              = Cache::init();
        $cacheAvailable     = $cache->isAvailable();
        $successfulResponse = $result instanceof JsonResponse && 200 === $result->getStatusCode() && json_decode($result->getContent())->success;

        /**
         * @var $header NamespaceHeaderValidator
         */
        $header         = $request->get('namespaceHeaderObject', null);
        $expiration_key = $header->isStatic() ? 'STATIC_CACHE_EXPIRATION' : 'DYNAMIC_CACHE_EXPIRATION';
        $default        = $header->isStatic() ? 3600 : 900;
        if ($cacheAvailable && $successfulResponse) {
            $key = sprintf('request:%s', UrlHash::init()->getMd5());
            $cache->set($key, serialize($result), intval(env($expiration_key) ?: $default));
        }

        return $result;
    }

}
