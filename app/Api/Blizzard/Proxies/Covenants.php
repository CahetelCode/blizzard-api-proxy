<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Covenants
 *
 * @package App\Api\Blizzard\Proxies
 */
class Covenants extends AbstractBlizzardProxy
{

    /**
     * Get the covenants list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCovenants(array $params) : stdClass
    {
        return $this->api->get('/data/wow/covenant/index', $this->filterParams($params));
    }

    /**
     * Get a specific covenant
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCovenant(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/covenant/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific covenant media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCovenantMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/covenant/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get all covenant soulbinds
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSoulbinds(array $params) : stdClass
    {
        return $this->api->get('/data/wow/covenant/soulbind/index', $this->filterParams($params));
    }

    /**
     * Get soulbind details
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSoulbind(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/covenant/soulbind/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get all covenant conduits
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getConduits(array $params) : stdClass
    {
        return $this->api->get('/data/wow/covenant/conduit/index', $this->filterParams($params));
    }

    /**
     * Get conduit details
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getConduit(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/covenant/conduit/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
