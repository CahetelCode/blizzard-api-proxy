<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Items;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ItemsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class ItemsController extends Controller
{

    /**
     * Items classes index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function itemClassesIndex(Request $request) : JsonResponse
    {
        /**
         * @var Items $proxy
         */
        $proxy    = $this->getBlizzardProxy(Items::class, $request);
        $response = $proxy->getItemClassesIndex($request->all());

        return $this->getResponse($response);
    }

    /**
     * Items class by ID
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function itemClassById(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Items $proxy
         */
        $proxy    = $this->getBlizzardProxy(Items::class, $request);
        $response = $proxy->getItemClass($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Items set index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function itemSetIndex(Request $request) : JsonResponse
    {
        /**
         * @var Items $proxy
         */
        $proxy    = $this->getBlizzardProxy(Items::class, $request);
        $response = $proxy->getItemSetsIndex($request->all());

        return $this->getResponse($response);
    }

    /**
     * Items set by ID
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function itemSetById(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Items $proxy
         */
        $proxy    = $this->getBlizzardProxy(Items::class, $request);
        $response = $proxy->getItemSet($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Items subclass by ID
     *
     * @param  Request  $request
     * @param  int  $idClass
     * @param  int  $idSubClass
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function itemSubClassById(Request $request, int $idClass, int $idSubClass) : JsonResponse
    {
        /**
         * @var Items $proxy
         */
        $proxy    = $this->getBlizzardProxy(Items::class, $request);
        $response = $proxy->getItemSubclass($idClass, $idSubClass, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Items by ID
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function itemById(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Items $proxy
         */
        $proxy    = $this->getBlizzardProxy(Items::class, $request);
        $response = $proxy->getItem($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Items media by ID
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function itemMediaById(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Items $proxy
         */
        $proxy    = $this->getBlizzardProxy(Items::class, $request);
        $response = $proxy->getItemMedia($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Items Search
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function itemSearch(Request $request) : JsonResponse
    {
        $locale    = $request->get('locale');
        $nameParam = 'name.'.$locale;
        $request->merge([$nameParam => $request->get('itemName')]);

        /**
         * @var Items $proxy
         */
        $proxy    = $this->getBlizzardProxy(Items::class, $request);
        $response = $proxy->getItems($request->all());

        return $this->getResponse($response);
    }
}
