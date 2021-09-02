<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Pets
 *
 * @package App\Api\Blizzard\Proxies
 */
class Pets extends AbstractBlizzardProxy
{

    /**
     * Get the pets list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPets(array $params) : stdClass
    {
        return $this->api->get('/data/wow/pet/index', $this->filterParams($params));
    }

    /**
     * Get a specific pet
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPet(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/pet/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific profession media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPetMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/pet/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the pets abilities list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPetsAbilities(array $params) : stdClass
    {
        return $this->api->get('/data/wow/pet-ability/index', $this->filterParams($params));
    }

    /**
     * Get the pet abilities list
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPetAbility(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/pet-ability/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific pet ability media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPetAbilityMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/pet-ability/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
