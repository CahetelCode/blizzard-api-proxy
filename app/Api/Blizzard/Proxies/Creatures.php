<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Creature Family Index
 *
 * @package App\Api\Blizzard\Proxies
 */
class Creatures extends AbstractBlizzardProxy
{

    /**
     * Returns creatures family list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCreaturesFamilyIndex(array $params) : stdClass
    {
        return $this->api->get('/data/wow/creature-family/index', $this->filterParams($params));
    }

    /**
     * Returns creature family by id
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCreatureFamily(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/creature-family/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Returns creatures types list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCreaturesTypesIndex(array $params) : stdClass
    {
        return $this->api->get('/data/wow/creature-type/index', $this->filterParams($params));
    }

    /**
     * Returns creature type by id
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCreatureType(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/creature-type/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Returns creature by id
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCreature(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/creature/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the creature search
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCreatureSearch(array $params) : stdClass
    {
        $params   = array_filter($params);
        $accepted = [
            'locale',
            'name.'.$params['locale'],
            'orderby',
            '_page',
        ];

        return $this->api->get('/data/wow/search/creature', $this->filterParams($params, $accepted));
    }

    /**
     * Returns creature media by id
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCreatureMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/creature-display/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Returns creature family media by id
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCreatureFamilyMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/creature-family/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }
}
