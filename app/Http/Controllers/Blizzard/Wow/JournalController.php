<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Journal;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class JournalController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class JournalController extends Controller
{

    /**
     * Journal Expansions List
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function expansionsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Journal $proxy
         */
        $proxy    = $this->getBlizzardProxy(Journal::class, $request);
        $response = $proxy->getExpansionsIndex($request->all());

        return $this->getResponse($response);
    }

    /**
     * Items Expansion by ID
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function expansionShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Journal $proxy
         */
        $proxy    = $this->getBlizzardProxy(Journal::class, $request);
        $response = $proxy->getExpansions($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Encounters List
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function encountersIndex(Request $request) : JsonResponse
    {
        /**
         * @var Journal $proxy
         */
        $proxy    = $this->getBlizzardProxy(Journal::class, $request);
        $response = $proxy->getEncountersIndex($request->all());

        return $this->getResponse($response);
    }

    /**
     * Encounter by ID
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function encounterShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Journal $proxy
         */
        $proxy    = $this->getBlizzardProxy(Journal::class, $request);
        $response = $proxy->getEncounter($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Journal Encounter Search
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function encounterSearch(Request $request) : JsonResponse
    {
        $locale        = $request->get('locale');
        $instanceParam = 'instance.name.'.$locale;
        $request->merge([$instanceParam => $request->get('instanceName')]);

        /**
         * @var Journal $proxy
         */
        $proxy    = $this->getBlizzardProxy(Journal::class, $request);
        $response = $proxy->getEncounters($request->all());

        return $this->getResponse($response);
    }

    /**
     * Instances List
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function instancesIndex(Request $request) : JsonResponse
    {
        /**
         * @var Journal $proxy
         */
        $proxy    = $this->getBlizzardProxy(Journal::class, $request);
        $response = $proxy->getInstancesIndex($request->all());

        return $this->getResponse($response);
    }

    /**
     * Instance by ID
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function instanceShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Journal $proxy
         */
        $proxy    = $this->getBlizzardProxy(Journal::class, $request);
        $response = $proxy->getInstance($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Instance media by ID
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function instanceMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Journal $proxy
         */
        $proxy    = $this->getBlizzardProxy(Journal::class, $request);
        $response = $proxy->getInstanceMedia($id, $request->all());

        return $this->getResponse($response);
    }
}
