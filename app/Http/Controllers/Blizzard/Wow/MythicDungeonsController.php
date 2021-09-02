<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\MythicDungeon;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class MythicDungeonsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class MythicDungeonsController extends Controller
{

    /**
     * Dungeons index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function dungeonsIndex(Request $request) : JsonResponse
    {
        /**
         * @var MythicDungeon $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicDungeon::class, $request);
        $response = $proxy->getDungeons($request->all());

        return $this->getResponse($response);
    }

    /**
     * Dungeon show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function dungeonShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var MythicDungeon $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicDungeon::class, $request);
        $response = $proxy->getDungeon($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Keystones index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function keystonesIndex(Request $request) : JsonResponse
    {
        /**
         * @var MythicDungeon $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicDungeon::class, $request);
        $response = $proxy->getKeystones($request->all());

        return $this->getResponse($response);
    }

    /**
     * Periods index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function periodsIndex(Request $request) : JsonResponse
    {
        /**
         * @var MythicDungeon $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicDungeon::class, $request);
        $response = $proxy->getPeriods($request->all());

        return $this->getResponse($response);
    }

    /**
     * Period show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function periodShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var MythicDungeon $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicDungeon::class, $request);
        $response = $proxy->getPeriod($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Seasons index
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
         * @var MythicDungeon $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicDungeon::class, $request);
        $response = $proxy->getSeasons($request->all());

        return $this->getResponse($response);
    }

    /**
     * Season show
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
         * @var MythicDungeon $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicDungeon::class, $request);
        $response = $proxy->getSeason($id, $request->all());

        return $this->getResponse($response);
    }

}
