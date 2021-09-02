<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\PlayableSpecializations;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class playableSpecializationsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class PlayableSpecializationsController extends Controller
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
    public function specializationsIndex(Request $request) : JsonResponse
    {
        /**
         * @var PlayableSpecializations $proxy
         */
        $proxy    = $this->getBlizzardProxy(PlayableSpecializations::class, $request);
        $response = $proxy->getSpecializations($request->all());

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
    public function specializationShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PlayableSpecializations $proxy
         */
        $proxy    = $this->getBlizzardProxy(PlayableSpecializations::class, $request);
        $response = $proxy->getSpecialization($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Profession media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function specializationMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var PlayableSpecializations $proxy
         */
        $proxy    = $this->getBlizzardProxy(PlayableSpecializations::class, $request);
        $response = $proxy->getSpecializationMedia($id, $request->all());

        return $this->getResponse($response);
    }

}
