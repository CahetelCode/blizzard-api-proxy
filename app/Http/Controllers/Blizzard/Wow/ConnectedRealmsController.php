<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\ConnectedRealms;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ConnectedRealmsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class ConnectedRealmsController extends Controller
{

    /**
     * Connected realms index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function connectedRealmsIndex(Request $request) : JsonResponse
    {
        /**
         * @var ConnectedRealms $proxy
         */
        $proxy    = $this->getBlizzardProxy(ConnectedRealms::class, $request);
        $response = $proxy->getConnectedRealms($request->all());

        return $this->getResponse($response);
    }

    /**
     * Connected realm show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function connectedRealmShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var ConnectedRealms $proxy
         */
        $proxy    = $this->getBlizzardProxy(ConnectedRealms::class, $request);
        $response = $proxy->getConnectedRealm($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * connected realm search
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     *
     */
    public function connectedRealmSearch(Request $request) : JsonResponse
    {
        $request->merge([
            'status.type'     => $request->get('status'),
            'realms.timezone' => $request->get('timezone'),
        ]);

        /**
         * @var ConnectedRealms $proxy
         */
        $proxy    = $this->getBlizzardProxy(ConnectedRealms::class, $request);
        $response = $proxy->getConnectedRealmSearch($request->all());

        return $this->getResponse($response);
    }
}
