<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class PvpTier
 *
 * @package App\Api\Blizzard\Proxies
 */
class PvpTier extends AbstractBlizzardProxy
{

    /**
     * Get the pvp tiers list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTiers(array $params) : stdClass
    {
        return $this->api->get('/data/wow/pvp-tier/index', $this->filterParams($params));
    }

    /**
     * Get a specific pvp tier
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
        $url = sprintf('/data/wow/pvp-tier/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific pvp tier media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTierMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/pvp-tier/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
