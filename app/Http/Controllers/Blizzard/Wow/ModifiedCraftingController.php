<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\ModifiedCrafting;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ModifiedCraftingController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class ModifiedCraftingController extends Controller
{

    /**
     * Crafting index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function craftingIndex(Request $request) : JsonResponse
    {
        /**
         * @var ModifiedCrafting $proxy
         */
        $proxy    = $this->getBlizzardProxy(ModifiedCrafting::class, $request);
        $response = $proxy->getModifiedCrafting($request->all());

        return $this->getResponse($response);
    }

    /**
     * Categories index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function categoriesIndex(Request $request) : JsonResponse
    {
        /**
         * @var ModifiedCrafting $proxy
         */
        $proxy    = $this->getBlizzardProxy(ModifiedCrafting::class, $request);
        $response = $proxy->getCategories($request->all());

        return $this->getResponse($response);
    }

    /**
     * Category show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function categoryShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var ModifiedCrafting $proxy
         */
        $proxy    = $this->getBlizzardProxy(ModifiedCrafting::class, $request);
        $response = $proxy->getCategory($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Reagents index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function reagentsIndex(Request $request) : JsonResponse
    {
        /**
         * @var ModifiedCrafting $proxy
         */
        $proxy    = $this->getBlizzardProxy(ModifiedCrafting::class, $request);
        $response = $proxy->getReagents($request->all());

        return $this->getResponse($response);
    }

    /**
     * Reagent show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function reagentShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var ModifiedCrafting $proxy
         */
        $proxy    = $this->getBlizzardProxy(ModifiedCrafting::class, $request);
        $response = $proxy->getReagent($id, $request->all());

        return $this->getResponse($response);
    }

}
