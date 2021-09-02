<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\PvpSeason;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class PvpSeasonsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class PvpSeasonsController extends Controller
{

    /**
     * Pvp seasons index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function seasonsIndex(Request $request) : JsonResponse
    {
        /**
         * @var PvpSeason $proxy
         */
        $proxy    = $this->getBlizzardProxy(PvpSeason::class, $request);
        $response = $proxy->getSeasons($request->all());

        return $this->getResponse($response);
    }

    /**
     * Pvp season show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function seasonShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PvpSeason $proxy
         */
        $proxy    = $this->getBlizzardProxy(PvpSeason::class, $request);
        $response = $proxy->getSeason($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Pvp season leaderboards index
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function leaderboardsIndex(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PvpSeason $proxy
         */
        $proxy    = $this->getBlizzardProxy(PvpSeason::class, $request);
        $response = $proxy->getLeaderboards($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Pvp season leaderboard show
     *
     * @param  Request  $request
     * @param  int  $id
     * @param  string  $bracket
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function leaderboardShow(Request $request, int $id, string $bracket) : JsonResponse
    {
        /**
         * @var PvpSeason $proxy
         */
        $proxy    = $this->getBlizzardProxy(PvpSeason::class, $request);
        $response = $proxy->getSeasonLeaderboard($id, $bracket, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Pvp season rewards index
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function rewardsIndex(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PvpSeason $proxy
         */
        $proxy    = $this->getBlizzardProxy(PvpSeason::class, $request);
        $response = $proxy->getSeasonRewards($id, $request->all());

        return $this->getResponse($response);
    }

}
