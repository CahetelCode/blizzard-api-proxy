<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Reputations;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ReputationsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class ReputationsController extends Controller
{

    /**
     * Factions index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function factionsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Reputations $proxy
         */
        $proxy    = $this->getBlizzardProxy(Reputations::class, $request);
        $response = $proxy->getFactions($request->all());

        return $this->getResponse($response);
    }

    /**
     * Faction show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function factionShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Reputations $proxy
         */
        $proxy    = $this->getBlizzardProxy(Reputations::class, $request);
        $response = $proxy->getFaction($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Faction index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function tiersIndex(Request $request) : JsonResponse
    {
        /**
         * @var Reputations $proxy
         */
        $proxy    = $this->getBlizzardProxy(Reputations::class, $request);
        $response = $proxy->getTiers($request->all());

        return $this->getResponse($response);
    }

    /**
     * Faction show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function tierShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Reputations $proxy
         */
        $proxy    = $this->getBlizzardProxy(Reputations::class, $request);
        $response = $proxy->getTier($id, $request->all());

        return $this->getResponse($response);
    }

}
