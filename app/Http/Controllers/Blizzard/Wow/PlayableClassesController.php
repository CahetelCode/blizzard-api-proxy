<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\PlayableClasses;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class PlayableClassesController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class PlayableClassesController extends Controller
{

    /**
     * Classes index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function classesIndex(Request $request) : JsonResponse
    {
        /**
         * @var PlayableClasses $proxy
         */
        $proxy    = $this->getBlizzardProxy(PlayableClasses::class, $request);
        $response = $proxy->getClasses($request->all());

        return $this->getResponse($response);
    }

    /**
     * Class show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function classShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PlayableClasses $proxy
         */
        $proxy    = $this->getBlizzardProxy(PlayableClasses::class, $request);
        $response = $proxy->getClass($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Class media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function classMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PlayableClasses $proxy
         */
        $proxy    = $this->getBlizzardProxy(PlayableClasses::class, $request);
        $response = $proxy->getClassMedia($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Class skill tier show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function classPvpTalentsSlots(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PlayableClasses $proxy
         */
        $proxy    = $this->getBlizzardProxy(PlayableClasses::class, $request);
        $response = $proxy->getClassPvpTalentSlots($id, $request->all());

        return $this->getResponse($response);
    }

}
