<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Regions;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class RegionsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class RegionsController extends Controller
{

    /**
     * Titles index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function regionsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Regions $proxy
         */
        $proxy    = $this->getBlizzardProxy(Regions::class, $request);
        $response = $proxy->getRegions($request->all());

        return $this->getResponse($response);
    }

    /**
     * Title show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function regionShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Regions $proxy
         */
        $proxy    = $this->getBlizzardProxy(Regions::class, $request);
        $response = $proxy->getRegion($id, $request->all());

        return $this->getResponse($response);
    }

}
