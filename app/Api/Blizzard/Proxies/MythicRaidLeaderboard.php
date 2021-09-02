<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class MythicRaidLeaderboard
 *
 * @package App\Api\Blizzard\Proxies
 */
class MythicRaidLeaderboard extends AbstractBlizzardProxy
{

    /**
     * Get the board
     *
     * @param  string  $raid
     * @param  string  $faction
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getBoard(string $raid, string $faction, array $params) : stdClass
    {
        $url = sprintf('/data/wow/leaderboard/hall-of-fame/%s/%s', $raid, $faction);

        return $this->api->get($url, $this->filterParams($params));
    }

}
