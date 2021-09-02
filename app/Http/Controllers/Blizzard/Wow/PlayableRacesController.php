<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\PlayableRaces;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class PlayableRacesController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class PlayableRacesController extends Controller
{

    /**
     * Professions index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function racesIndex(Request $request) : JsonResponse
    {
        /**
         * @var PlayableRaces $proxy
         */
        $proxy    = $this->getBlizzardProxy(PlayableRaces::class, $request);
        $response = $proxy->getRaces($request->all());

        return $this->getResponse($response);
    }

    /**
     * Profession show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function raceShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PlayableRaces $proxy
         */
        $proxy    = $this->getBlizzardProxy(PlayableRaces::class, $request);
        $response = $proxy->getRace($id, $request->all());

        return $this->getResponse($response);
    }

}
