<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\Media;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class MediaController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class MediaController extends Controller
{

    /**
     * Media search
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function search(Request $request) : JsonResponse
    {
        /**
         * @var Media $proxy
         */
        $proxy    = $this->getBlizzardProxy(Media::class, $request);
        $response = $proxy->search($request->all());

        return $this->getResponse($response);
    }

}
