<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Reputations
 *
 * @package App\Api\Blizzard\Proxies
 */
class Reputations extends AbstractBlizzardProxy
{

    /**
     * Get the factions list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getFactions(array $params) : stdClass
    {
        return $this->api->get('/data/wow/reputation-faction/index', $this->filterParams($params));
    }

    /**
     * Get a faction info
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getFaction(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/reputation-faction/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the tiers list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTiers(array $params) : stdClass
    {
        return $this->api->get('/data/wow/reputation-tiers/index', $this->filterParams($params));
    }

    /**
     * Get a tier info
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTier(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/reputation-tiers/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
