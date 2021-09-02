<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Connected Realms
 *
 * @package App\Api\Blizzard\Proxies
 */
class ConnectedRealms extends AbstractBlizzardProxy
{

    /**
     * Returns connected realms list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getConnectedRealms(array $params) : stdClass
    {
        return $this->api->get('/data/wow/connected-realm/index', $this->filterParams($params));
    }

    /**
     * Returns connected realm
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getConnectedRealm(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/connected-realm/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the connected realm search
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getConnectedRealmSearch(array $params) : stdClass
    {
        $params   = array_filter($params);
        $accepted = [
            'status.type',
            'realms.timezone',
            'orderby',
            '_page',
            'locale',
        ];

        return $this->api->get('/data/wow/search/connected-realm', $this->filterParams($params, $accepted));
    }
}
