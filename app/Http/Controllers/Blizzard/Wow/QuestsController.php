<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Quests;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class QuestsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class QuestsController extends Controller
{

    /**
     * Quests index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function questsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Quests $proxy
         */
        $proxy    = $this->getBlizzardProxy(Quests::class, $request);
        $response = $proxy->getQuests($request->all());

        return $this->getResponse($response);
    }

    /**
     * Quest show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function questShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Quests $proxy
         */
        $proxy    = $this->getBlizzardProxy(Quests::class, $request);
        $response = $proxy->getQuest($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Quests categories index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function questsCategoriesIndex(Request $request) : JsonResponse
    {
        /**
         * @var Quests $proxy
         */
        $proxy    = $this->getBlizzardProxy(Quests::class, $request);
        $response = $proxy->getQuestsCategories($request->all());

        return $this->getResponse($response);
    }

    /**
     * Quest category show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function questCategoryShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Quests $proxy
         */
        $proxy    = $this->getBlizzardProxy(Quests::class, $request);
        $response = $proxy->getQuestCategory($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Quests areas index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function questsAreasIndex(Request $request) : JsonResponse
    {
        /**
         * @var Quests $proxy
         */
        $proxy    = $this->getBlizzardProxy(Quests::class, $request);
        $response = $proxy->getQuestsAreas($request->all());

        return $this->getResponse($response);
    }

    /**
     * Quest area show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function questAreaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Quests $proxy
         */
        $proxy    = $this->getBlizzardProxy(Quests::class, $request);
        $response = $proxy->getQuestArea($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Quests types index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function questsTypesIndex(Request $request) : JsonResponse
    {
        /**
         * @var Quests $proxy
         */
        $proxy    = $this->getBlizzardProxy(Quests::class, $request);
        $response = $proxy->getQuestsTypes($request->all());

        return $this->getResponse($response);
    }

    /**
     * Quest type show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function questTypeShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Quests $proxy
         */
        $proxy    = $this->getBlizzardProxy(Quests::class, $request);
        $response = $proxy->getQuestType($id, $request->all());

        return $this->getResponse($response);
    }

}
