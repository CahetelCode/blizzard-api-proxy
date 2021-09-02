<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class MythicKeystoneLeaderboard
 *
 * @package App\Api\Blizzard\Proxies
 */
class MythicKeystoneLeaderboard extends AbstractBlizzardProxy
{

    /**
     * Get the boards
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getBoards(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/connected-realm/%d/mythic-leaderboard/index', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the boards
     *
     * @param  int  $realmId
     * @param  int  $dungeonId
     * @param  int  $period
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getBoard(int $realmId, int $dungeonId, int $period, array $params) : stdClass
    {
        $url = sprintf('/data/wow/connected-realm/%d/mythic-leaderboard/%d/period/%d', $realmId, $dungeonId, $period);

        return $this->api->get($url, $this->filterParams($params));
    }

}
