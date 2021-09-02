<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Achievements;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class AchievementsControllerTest
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class AchievementsController extends Controller
{

    /**
     * Achievements categories index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function achievementsCategoriesIndex(Request $request) : JsonResponse
    {
        /**
         * @var Achievements $proxy
         */
        $proxy    = $this->getBlizzardProxy(Achievements::class, $request);
        $response = $proxy->getAchievementsCategories($request->all());

        return $this->getResponse($response);
    }

    /**
     * Achievements category
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function achievementsCategory(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Achievements $proxy
         */
        $proxy    = $this->getBlizzardProxy(Achievements::class, $request);
        $response = $proxy->getAchievementsCategory($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Achievements index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function achievementsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Achievements $proxy
         */
        $proxy    = $this->getBlizzardProxy(Achievements::class, $request);
        $response = $proxy->getAchievements($request->all());

        return $this->getResponse($response);
    }

    /**
     * Achievement
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws ApiError|GuzzleException
     */
    public function achievementShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Achievements $proxy
         */
        $proxy    = $this->getBlizzardProxy(Achievements::class, $request);
        $response = $proxy->getAchievement($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Achievement Media
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws ApiError|GuzzleException
     */
    public function achievementMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Achievements $proxy
         */
        $proxy    = $this->getBlizzardProxy(Achievements::class, $request);
        $response = $proxy->getAchievementMedia($id, $request->all());

        return $this->getResponse($response);
    }
}
