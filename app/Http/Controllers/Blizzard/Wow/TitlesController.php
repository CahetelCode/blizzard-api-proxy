<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Titles;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class TitlesController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class TitlesController extends Controller
{

    /**
     * Titles index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function titlesIndex(Request $request) : JsonResponse
    {
        /**
         * @var Titles $proxy
         */
        $proxy    = $this->getBlizzardProxy(Titles::class, $request);
        $response = $proxy->getTitles($request->all());

        return $this->getResponse($response);
    }

    /**
     * Title show
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function titleShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var Titles $proxy
         */
        $proxy    = $this->getBlizzardProxy(Titles::class, $request);
        $response = $proxy->getTitle($id, $request->all());

        return $this->getResponse($response);
    }

}
