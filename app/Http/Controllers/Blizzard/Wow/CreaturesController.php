<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Creatures;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class CreaturesController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class CreaturesController extends Controller
{

    /**
     * Creatures family index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function creaturesFamilyIndex(Request $request) : JsonResponse
    {
        /**
         * @var Creatures $proxy
         */
        $proxy    = $this->getBlizzardProxy(Creatures::class, $request);
        $response = $proxy->getCreaturesFamilyIndex($request->all());

        return $this->getResponse($response);
    }

    /**
     * Creature family show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function creatureFamilyShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Creatures $proxy
         */
        $proxy    = $this->getBlizzardProxy(Creatures::class, $request);
        $response = $proxy->getCreatureFamily($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Creatures types index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function creaturesTypeIndex(Request $request) : JsonResponse
    {
        /**
         * @var Creatures $proxy
         */
        $proxy    = $this->getBlizzardProxy(Creatures::class, $request);
        $response = $proxy->getCreaturesTypesIndex($request->all());

        return $this->getResponse($response);
    }

    /**
     * Creature type show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function creatureShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Creatures $proxy
         */
        $proxy    = $this->getBlizzardProxy(Creatures::class, $request);
        $response = $proxy->getCreature($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Creature Search
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function creatureSearch(Request $request) : JsonResponse
    {
        $locale    = $request->get('locale');
        $nameParam = 'name.'.$locale;
        $request->merge([$nameParam => $request->get('name')]);

        /**
         * @var Creatures $proxy
         */
        $proxy    = $this->getBlizzardProxy(Creatures::class, $request);
        $response = $proxy->getCreatureSearch($request->all());

        return $this->getResponse($response);
    }

    /**
     * Creature media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function creatureMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Creatures $proxy
         */
        $proxy    = $this->getBlizzardProxy(Creatures::class, $request);
        $response = $proxy->getCreatureMedia($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Creature family media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function creatureFamilyMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Creatures $proxy
         */
        $proxy    = $this->getBlizzardProxy(Creatures::class, $request);
        $response = $proxy->getCreatureFamilyMedia($id, $request->all());

        return $this->getResponse($response);
    }
}
