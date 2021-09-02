<?php

namespace App\Http\Middleware;

use App\Api\Exceptions\ApiError;
use App\Auth;
use Closure;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class AppAuthentication
 *
 * @package App\Http\Middleware
 */
class AppAuthentication
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
        $auth = new Auth($request->header('Authorization', ''));
        if (!$auth->authenticate()) {
            $response = (object) [
                'success' => false,
                'message' => 'Unauthenticated',
            ];

            return (new JsonResponse($response, 401));
        }


        return $next($request);
    }

}
