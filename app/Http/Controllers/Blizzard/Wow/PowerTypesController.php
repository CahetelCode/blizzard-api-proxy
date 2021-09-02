<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\PowerTypes;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class PowerTypesController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class PowerTypesController extends Controller
{

    /**
     * Power types index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function powerTypeIndex(Request $request) : JsonResponse
    {
        /**
         * @var PowerTypes $proxy
         */
        $proxy    = $this->getBlizzardProxy(PowerTypes::class, $request);
        $response = $proxy->getPowerTypes($request->all());

        return $this->getResponse($response);
    }

    /**
     * Power type show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function powerTypeShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PowerTypes $proxy
         */
        $proxy    = $this->getBlizzardProxy(PowerTypes::class, $request);
        $response = $proxy->getPowerType($id, $request->all());

        return $this->getResponse($response);
    }

}
