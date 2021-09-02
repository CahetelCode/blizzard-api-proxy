<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Azerite;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class AzeriteController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class AzeriteController extends Controller
{

    /**
     * Azerite index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function azeriteIndex(Request $request) : JsonResponse
    {
        /**
         * @var Azerite $proxy
         */
        $proxy    = $this->getBlizzardProxy(Azerite::class, $request);
        $response = $proxy->getAzerites($request->all());

        return $this->getResponse($response);
    }

    /**
     * Specific azerite
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function azeriteShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Azerite $proxy
         */
        $proxy    = $this->getBlizzardProxy(Azerite::class, $request);
        $response = $proxy->getAzerite($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Azerite search
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     *
     * @todo
     */
    public function azeriteSearch(Request $request) : JsonResponse
    {
        $specialization = 'allowed_specializations.id';
        $request->merge([$specialization => $request->get('specializationId')]);

        /**
         * @var Azerite $proxy
         */
        $proxy    = $this->getBlizzardProxy(Azerite::class, $request);
        $response = $proxy->azeriteSearch($request->all());

        return $this->getResponse($response);
    }

    /**
     * Specific azerite media
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function azeriteMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Azerite $proxy
         */
        $proxy    = $this->getBlizzardProxy(Azerite::class, $request);
        $response = $proxy->getAzeriteMedia($id, $request->all());

        return $this->getResponse($response);
    }

}

