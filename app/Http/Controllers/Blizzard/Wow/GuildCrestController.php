<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\GuildCrest;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class GuildCrestController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class GuildCrestController extends Controller
{

    /**
     * Guild Crest index
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function guildCrestIndex(Request $request) : JsonResponse
    {
        /**
         * @var GuildCrest $proxy
         */
        $proxy    = $this->getBlizzardProxy(GuildCrest::class, $request);
        $response = $proxy->getGuildCrestIndex($request->all());

        return $this->getResponse($response);
    }

    /**
     * Guild Crest Border Media
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function guildCrestBorderMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var GuildCrest $proxy
         */
        $proxy    = $this->getBlizzardProxy(GuildCrest::class, $request);
        $response = $proxy->getGuildCrestBorder($id, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Guild Crest Emblem Media
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function guildCrestEmblemMediaShow(Request $request, int $id) : JsonResponse
    {
        /**
         * @var GuildCrest $proxy
         */
        $proxy    = $this->getBlizzardProxy(GuildCrest::class, $request);
        $response = $proxy->getGuildCrestEmblem($id, $request->all());

        return $this->getResponse($response);
    }
}
