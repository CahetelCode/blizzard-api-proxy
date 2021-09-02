<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\MythicKeystoneLeaderboard;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class MythicKeystoneLeaderboardsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class MythicKeystoneLeaderboardsController extends Controller
{

    /**
     * Mythic keystone leaderboard index
     *
     * @param  Request  $request
     * @param  int  $realm
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function leaderboardIndex(Request $request, int $realm) : JsonResponse
    {
        /**
         * @var MythicKeystoneLeaderboard $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicKeystoneLeaderboard::class, $request);
        $response = $proxy->getBoards($realm, $request->all());

        return $this->getResponse($response);
    }

    /**
     * Mythic keystone leaderboard show
     *
     * @param  Request  $request
     * @param  int  $realmId
     * @param  int  $dungeonId
     * @param  int  $period
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function leaderboardShow(Request $request, int $realmId, int $dungeonId, int $period) : JsonResponse
    {
        /**
         * @var MythicKeystoneLeaderboard $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicKeystoneLeaderboard::class, $request);
        $response = $proxy->getBoard($realmId, $dungeonId, $period, $request->all());

        return $this->getResponse($response);
    }

}
