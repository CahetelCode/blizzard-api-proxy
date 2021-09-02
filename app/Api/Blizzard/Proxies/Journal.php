<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Journal
 *
 * @package App\Api\Blizzard\Proxies
 */
class Journal extends AbstractBlizzardProxy
{

    /**
     * Get the expansions list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getExpansionsIndex(array $params) : stdClass
    {
        $params = array_filter($params);

        return $this->api->get('/data/wow/journal-expansion/index', $this->filterParams($params));
    }

    /**
     * Get the expansion by ID
     *
     * @param  array  $params
     * @param  int  $id
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getExpansions(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/journal-expansion/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the encounter list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getEncountersIndex(array $params) : stdClass
    {
        $params = array_filter($params);

        return $this->api->get('/data/wow/journal-encounter/index', $this->filterParams($params));
    }

    /**
     * Get the encounter by ID
     *
     * @param  array  $params
     * @param  int  $id
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getEncounter(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/journal-encounter/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Search the encounter
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getEncounters(array $params) : stdClass
    {
        $params   = array_filter($params);
        $accepted = [
            'locale',
            'orderby',
            '_page',
            'instance.name.'.$params['locale'],
        ];

        return $this->api->get('/data/wow/search/journal-encounter', $this->filterParams($params, $accepted));
    }

    /**
     * Get the instances list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getInstancesIndex(array $params) : stdClass
    {
        $params = array_filter($params);

        return $this->api->get('/data/wow/journal-instance/index', $this->filterParams($params));
    }

    /**
     * Get the instance by ID
     *
     * @param  array  $params
     * @param  int  $id
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getInstance(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/journal-instance/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the instance media by ID
     *
     * @param  array  $params
     * @param  int  $id
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getInstanceMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/journal-instance/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }
}
