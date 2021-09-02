<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Realms;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class RealmsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class RealmsController extends Controller
{

    /**
     * Realm index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function realmsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Realms $proxy
         */
        $proxy    = $this->getBlizzardProxy(Realms::class, $request);
        $response = $proxy->getRealms($request->all());

        return $this->getResponse($response);
    }

    /**
     * Realm show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function realmShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Realms $proxy
         */
        $proxy    = $this->getBlizzardProxy(Realms::class, $request);
        $response = $proxy->getRealm($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Realm search
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function searchRealm(Request $request) : JsonResponse
    {
        /**
         * @var Realms $proxy
         */
        $proxy    = $this->getBlizzardProxy(Realms::class, $request);
        $response = $proxy->searchRealms($request->all());

        return $this->getResponse($response);
    }

}
