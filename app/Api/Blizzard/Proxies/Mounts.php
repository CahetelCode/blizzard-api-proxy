<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Mounts
 *
 * @package App\Api\Blizzard\Proxies
 */
class Mounts extends AbstractBlizzardProxy
{

    /**
     * Get the list of mounts
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getMounts(array $params) : stdClass
    {
        return $this->api->get('/data/wow/mount/index', $this->filterParams($params));
    }

    /**
     * Get a specific mount
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getMount(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/mount/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Search mount
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function searchMount(array $params) : stdClass
    {
        $params   = array_filter($params);
        $accepted = [
            'locale',
            'orderby',
            '_page',
            'name.'.$params['locale'],
        ];

        return $this->api->get('/data/wow/search/mount', $this->filterParams($params, $accepted));
    }
}
