<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class MythicDungeon
 *
 * @package App\Api\Blizzard\Proxies
 */
class MythicDungeon extends AbstractBlizzardProxy
{

    /**
     * Get the list of dungeons
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getDungeons(array $params) : stdClass
    {
        return $this->api->get('/data/wow/mythic-keystone/dungeon/index', $this->filterParams($params));
    }

    /**
     * Get a specific dungeon
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getDungeon(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/mythic-keystone/dungeon/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the list of keystones
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getKeystones(array $params) : stdClass
    {
        return $this->api->get('/data/wow/mythic-keystone/index', $this->filterParams($params));
    }

    /**
     * Get the list of periods
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPeriods(array $params) : stdClass
    {
        return $this->api->get('/data/wow/mythic-keystone/period/index', $this->filterParams($params));
    }

    /**
     * Get a specific period
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPeriod(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/mythic-keystone/period/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the list of seasons
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSeasons(array $params) : stdClass
    {
        return $this->api->get('/data/wow/mythic-keystone/season/index', $this->filterParams($params));
    }

    /**
     * Get a specific season
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
        $url = sprintf('/data/wow/mythic-keystone/season/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
