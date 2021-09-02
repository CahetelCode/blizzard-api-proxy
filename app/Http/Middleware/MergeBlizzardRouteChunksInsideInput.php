<?php

namespace App\Http\Middleware;

use App\Api\Exceptions\ApiError;
use Closure;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

/**
 * Class MergeBlizzardRouteChunksInsideInput
 *
 * @note this is just for utility
 *
 * @package App\Http\Middleware
 *
 * @codeCoverageIgnore
 */
class MergeBlizzardRouteChunksInsideInput
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
        $request->merge([
            'region' => $request->route('region'),
            'locale' => $request->route('locale'),
        ]);

        return $next($request);
    }

}
