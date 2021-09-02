<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Azerite
 *
 * @package App\Api\Blizzard\Proxies
 */
class Azerite extends AbstractBlizzardProxy
{

    /**
     * Returns azerite list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAzerites(array $params) : stdClass
    {
        return $this->api->get('/data/wow/azerite-essence/index', $this->filterParams($params));
    }

    /**
     * Returns specific azerite
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAzerite(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/azerite-essence/%d', $id);


        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the azerite search
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function azeriteSearch(array $params) : stdClass
    {
        $params   = array_filter($params);
        $accepted = [
            'locale',
            'orderby',
            '_page',
            'allowed_specializations.id',
        ];

        return $this->api->get('/data/wow/search/azerite-essence', $this->filterParams($params, $accepted));
    }

    /**
     * Returns specific azerite media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAzeriteMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/azerite-essence/%d', $id);


        return $this->api->get($url, $this->filterParams($params));
    }
}
