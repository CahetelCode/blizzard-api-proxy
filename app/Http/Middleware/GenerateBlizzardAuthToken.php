<?php

namespace App\Http\Middleware;

use App\AccessTokenRefresher;
use App\Api\AuthEnum;
use App\Api\Exceptions\ApiError;
use App\Models\AccessToken;
use Closure;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

/**
 * Class GenerateBlizzardAuthToken
 *
 * @package App\Http\Middleware
 */
class GenerateBlizzardAuthToken
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
        $type   = AuthEnum::$blizzard;
        $region = $request->route('region');
        $model  = new AccessToken();
        $last   = $model->getLast($type, $region);
        if (empty($last) || $last->isExpired()) {
            $last = (new AccessTokenRefresher($type, $region))->refresh();
        }

        $request->merge(['blizzardAccessToken' => $last]);

        return $next($request);
    }

}
