<?php

namespace App\Http\Controllers;

use App\Api\Blizzard\BlizzardProxyBuilder;
use App\Api\ProxyInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use stdClass;

/**
 * Class Controller
 *
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{

    /**
     * Build a requested Proxy
     *
     * @param  string  $ns
     * @param  Request  $request
     *
     * @return ProxyInterface
     * @throws Exception
     *
     * @codeCoverageIgnore
     */
    protected function getBlizzardProxy(string $ns, Request $request) : ProxyInterface
    {
        return BlizzardProxyBuilder::getProxy($ns, $request->route('region'), $request->input('blizzardAccessToken'), $request->input('namespace'));
    }

    /**
     * @param  array|stdClass  $response
     *
     * @return JsonResponse
     */
    protected function getResponse(array|stdClass $response) : JsonResponse
    {
        $empty    = empty((array) $response);
        $response = (object) ['success' => !$empty, 'response' => $empty ? 'Not found' : $response];

        return new JsonResponse($response, $empty ? 404 : 200);
    }

}
