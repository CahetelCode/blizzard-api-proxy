<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\MythicKeystoneAffixes;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class MythicAffixesController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class MythicAffixesController extends Controller
{

    /**
     * Affixes index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function affixesIndex(Request $request) : JsonResponse
    {
        /**
         * @var MythicKeystoneAffixes $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicKeystoneAffixes::class, $request);
        $response = $proxy->getAffixes($request->all());

        return $this->getResponse($response);
    }

    /**
     * Affix show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function affixShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var MythicKeystoneAffixes $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicKeystoneAffixes::class, $request);
        $response = $proxy->getAffix($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Affix media show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function affixMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var MythicKeystoneAffixes $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicKeystoneAffixes::class, $request);
        $response = $proxy->getAffixMedia($id, $request->all());

        return $this->getResponse($response);
    }

}
