<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Realms
 *
 * @package App\Api\Blizzard\Proxies
 */
class Realms extends AbstractBlizzardProxy
{

    /**
     * Get a specific realm
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getRealm(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/realm/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the realms list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getRealms(array $params) : stdClass
    {
        return $this->api->get('/data/wow/realm/index', $this->filterParams($params));
    }

    /**
     * Search realms
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function searchRealms(array $params) : stdClass
    {
        $params   = array_filter($params);
        $accepted = [
            'locale',
            'orderby',
            '_page',
            'timezone',
        ];

        return $this->api->get('/data/wow/search/realm', $this->filterParams($params, $accepted));
    }

}
