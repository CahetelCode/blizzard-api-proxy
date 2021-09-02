<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class PowerTypes
 *
 * @package App\Api\Blizzard\Proxies
 */
class PowerTypes extends AbstractBlizzardProxy
{

    /**
     * Get the available power types
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPowerTypes(array $params) : stdClass
    {
        return $this->api->get('/data/wow/power-type/index', $this->filterParams($params));
    }

    /**
     * Returns a specific power type
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPowerType(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/power-type/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
