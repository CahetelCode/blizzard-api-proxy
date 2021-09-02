<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Pets;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class PetsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class PetsController extends Controller
{

    /**
     * Pets index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function petIndex(Request $request) : JsonResponse
    {
        /**
         * @var Pets $proxy
         */
        $proxy    = $this->getBlizzardProxy(Pets::class, $request);
        $response = $proxy->getPets($request->all());

        return $this->getResponse($response);
    }

    /**
     * Pet show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function petShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Pets $proxy
         */
        $proxy    = $this->getBlizzardProxy(Pets::class, $request);
        $response = $proxy->getPet($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Pet media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function petMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Pets $proxy
         */
        $proxy    = $this->getBlizzardProxy(Pets::class, $request);
        $response = $proxy->getPetMedia($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Pet abilities
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function petAbilityIndex(Request $request) : JsonResponse
    {
        /**
         * @var Pets $proxy
         */
        $proxy    = $this->getBlizzardProxy(Pets::class, $request);
        $response = $proxy->getPetsAbilities($request->all());

        return $this->getResponse($response);
    }

    /**
     * Pet ability show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function petAbilityShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Pets $proxy
         */
        $proxy    = $this->getBlizzardProxy(Pets::class, $request);
        $response = $proxy->getPetAbility($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Pet ability media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function petAbilityMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Pets $proxy
         */
        $proxy    = $this->getBlizzardProxy(Pets::class, $request);
        $response = $proxy->getPetAbilityMedia($id, $request->all());

        return $this->getResponse($response);
    }

}
