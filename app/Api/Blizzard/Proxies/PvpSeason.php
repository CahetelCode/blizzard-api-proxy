<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class PvpSeason
 *
 * @package App\Api\Blizzard\Proxies
 */
class PvpSeason extends AbstractBlizzardProxy
{

    /**
     * Get the pvp sesons list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSeasons(array $params) : stdClass
    {
        return $this->api->get('/data/wow/pvp-season/index', $this->filterParams($params));
    }

    /**
     * Get a specific pvp season
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSeason(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/pvp-season/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific pvp season leaderboards
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getLeaderboards(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/pvp-season/%d/pvp-leaderboard/index', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific pvp season leaderboard
     *
     * @param  int  $id
     * @param  string  $bracket
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSeasonLeaderboard(int $id, string $bracket, array $params) : stdClass
    {
        $url = sprintf('/data/wow/pvp-season/%d/pvp-leaderboard/%s', $id, $bracket);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific pvp season rewards
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSeasonRewards(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/pvp-season/%d/pvp-reward/index', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
