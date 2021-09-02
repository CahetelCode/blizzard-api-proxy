<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Covenants;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class CovenantsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class CovenantsController extends Controller
{

    /**
     * Covenants index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function covenantIndex(Request $request) : JsonResponse
    {
        /**
         * @var Covenants $proxy
         */
        $proxy    = $this->getBlizzardProxy(Covenants::class, $request);
        $response = $proxy->getCovenants($request->all());

        return $this->getResponse($response);
    }

    /**
     * Covenant show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function covenantShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Covenants $proxy
         */
        $proxy    = $this->getBlizzardProxy(Covenants::class, $request);
        $response = $proxy->getCovenant($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Covenant media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function covenantMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Covenants $proxy
         */
        $proxy    = $this->getBlizzardProxy(Covenants::class, $request);
        $response = $proxy->getCovenantMedia($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Covenant soulbinds
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function covenantSoulbindsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Covenants $proxy
         */
        $proxy    = $this->getBlizzardProxy(Covenants::class, $request);
        $response = $proxy->getSoulbinds($request->all());

        return $this->getResponse($response);
    }

    /**
     * Covenant soulbind show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function covenantSoulbindShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Covenants $proxy
         */
        $proxy    = $this->getBlizzardProxy(Covenants::class, $request);
        $response = $proxy->getSoulbind($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Covenant conduits
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function covenantConduitsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Covenants $proxy
         */
        $proxy    = $this->getBlizzardProxy(Covenants::class, $request);
        $response = $proxy->getConduits($request->all());

        return $this->getResponse($response);
    }

    /**
     * Covenant conduit show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function covenantConduitShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Covenants $proxy
         */
        $proxy    = $this->getBlizzardProxy(Covenants::class, $request);
        $response = $proxy->getConduit($id, $request->all());

        return $this->getResponse($response);
    }

}
