<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\TechTalents;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class TechTalentsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class TechTalentsController extends Controller
{

    /**
     * Tech talent trees index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function techTalentTreesIndex(Request $request) : JsonResponse
    {
        /**
         * @var TechTalents $proxy
         */
        $proxy    = $this->getBlizzardProxy(TechTalents::class, $request);
        $response = $proxy->getTechTalentTrees($request->all());

        return $this->getResponse($response);
    }

    /**
     * Tech talent tree show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function techTalentTreeShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var TechTalents $proxy
         */
        $proxy    = $this->getBlizzardProxy(TechTalents::class, $request);
        $response = $proxy->getTechTalentTree($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Tech talent index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function techTalentsIndex(Request $request) : JsonResponse
    {
        /**
         * @var TechTalents $proxy
         */
        $proxy    = $this->getBlizzardProxy(TechTalents::class, $request);
        $response = $proxy->getTechTalents($request->all());

        return $this->getResponse($response);
    }

    /**
     * Tech talent show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function techTalentShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var TechTalents $proxy
         */
        $proxy    = $this->getBlizzardProxy(TechTalents::class, $request);
        $response = $proxy->getTechTalent($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Tech talent media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function techTalentMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var TechTalents $proxy
         */
        $proxy    = $this->getBlizzardProxy(TechTalents::class, $request);
        $response = $proxy->getTechTalentMedia($id, $request->all());

        return $this->getResponse($response);
    }

}
