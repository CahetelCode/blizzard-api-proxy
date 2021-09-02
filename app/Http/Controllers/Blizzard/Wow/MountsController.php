<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Mounts;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class MountsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class MountsController extends Controller
{

    /**
     * Mounts index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function mountsIndex(Request $request) : JsonResponse
    {
        /**
         * @var Mounts $proxy
         */
        $proxy    = $this->getBlizzardProxy(Mounts::class, $request);
        $response = $proxy->getMounts($request->all());

        return $this->getResponse($response);
    }

    /**
     * Mount show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function mountShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Mounts $proxy
         */
        $proxy    = $this->getBlizzardProxy(Mounts::class, $request);
        $response = $proxy->getMount($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Mounts Search
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function mountsSearch(Request $request) : JsonResponse
    {
        $locale        = $request->get('locale');
        $instanceParam = 'name.'.$locale;
        $request->merge([$instanceParam => $request->get('name')]);

        /**
         * @var Mounts $proxy
         */
        $proxy    = $this->getBlizzardProxy(Mounts::class, $request);
        $response = $proxy->searchMount($request->all());

        return $this->getResponse($response);
    }

}
