<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Regions
 *
 * @package App\Api\Blizzard\Proxies
 */
class Regions extends AbstractBlizzardProxy
{

    /**
     * Get the regions list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getRegions(array $params) : stdClass
    {
        return $this->api->get('/data/wow/region/index', $this->filterParams($params));
    }

    /**
     * Get a region info
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getRegion(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/region/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
