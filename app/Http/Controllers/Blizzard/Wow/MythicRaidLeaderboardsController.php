<?php

namespace App\Http\Controllers\Blizzard\Wow;

use App\Api\Blizzard\Proxies\MythicRaidLeaderboard;
use App\Api\Exceptions\ApiError;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class MythicRaidLeaderboardsController
 *
 * @package App\Http\Controllers\Blizzard\Wow
 */
class MythicRaidLeaderboardsController extends Controller
{

    /**
     * Mythic raid leaderboard show
     *
     * @param  Request  $request
     * @param  string  $raid
     * @param  string  $faction
     *
     * @return JsonResponse
     *
     * @throws Exception|ApiError|GuzzleException
     */
    public function leaderboardShow(Request $request, string $raid, string $faction) : JsonResponse
    {
        /**
         * @var MythicRaidLeaderboard $proxy
         */
        $proxy    = $this->getBlizzardProxy(MythicRaidLeaderboard::class, $request);
        $response = $proxy->getBoard($raid, $faction, $request->all());

        return $this->getResponse($response);
    }

}
