<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Talents;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class TalentsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class TalentsController extends Controller
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
    public function talentsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Talents $proxy
         */
        $proxy    = $this->getBlizzardProxy(Talents::class, $request);
        $response = $proxy->getTalents($request->all());

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
    public function talentShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Talents $proxy
         */
        $proxy    = $this->getBlizzardProxy(Talents::class, $request);
        $response = $proxy->getTalent($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Tech talent trees index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function pvpTalentsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Talents $proxy
         */
        $proxy    = $this->getBlizzardProxy(Talents::class, $request);
        $response = $proxy->getPvpTalents($request->all());

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
    public function pvpTalentShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Talents $proxy
         */
        $proxy    = $this->getBlizzardProxy(Talents::class, $request);
        $response = $proxy->getPvpTalent($id, $request->all());

        return $this->getResponse($response);
    }

}
