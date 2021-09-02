<?php

namespace App\Http\Middleware;

use App\Api\Blizzard\NamespaceHeaderValidator;
use App\Api\Exceptions\ApiError;
use Closure;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ValidateBlizzardNamespaceHeader
 *
 * @package App\Http\Middleware
 */
class ValidateBlizzardNamespaceHeader
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
        $header    = $request->header('Battlenet-Namespace', '');
        $validator = new NamespaceHeaderValidator($header);
        if (!$validator->isValid()) {
            return $this->getErrorResponse('The Battlenet-Namespace header is missing or invalid');
        }

        $request->merge(['namespace' => $header, 'namespaceHeaderObject' => $validator]);

        return $next($request);
    }

    /**
     * Error response constuction
     *
     * @param  string  $message
     *
     * @return JsonResponse
     */
    protected function getErrorResponse(string $message) : JsonResponse
    {
        $message = (object) ['success' => false, 'message' => $message];

        return (new JsonResponse($message, 400));
    }

}
