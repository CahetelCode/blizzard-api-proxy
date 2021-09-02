<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\PvpTier;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class PvpTiersController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class PvpTiersController extends Controller
{

    /**
     * Pvp tier index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function pvpTierIndex(Request $request) : JsonResponse
    {
        /**
         * @var PvpTier $proxy
         */
        $proxy    = $this->getBlizzardProxy(PvpTier::class, $request);
        $response = $proxy->getTiers($request->all());

        return $this->getResponse($response);
    }

    /**
     * Pvp tier show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function pvpTierShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PvpTier $proxy
         */
        $proxy    = $this->getBlizzardProxy(PvpTier::class, $request);
        $response = $proxy->getTier($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Pvp tier media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function pvpTierMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PvpTier $proxy
         */
        $proxy    = $this->getBlizzardProxy(PvpTier::class, $request);
        $response = $proxy->getTierMedia($id, $request->all());

        return $this->getResponse($response);
    }

}
