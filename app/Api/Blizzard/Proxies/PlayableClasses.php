<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class PlayableClasses
 *
 * @package App\Api\Blizzard\Proxies
 */
class PlayableClasses extends AbstractBlizzardProxy
{

    /**
     * Get the professions list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getClasses(array $params) : stdClass
    {
        return $this->api->get('/data/wow/playable-class/index', $this->filterParams($params));
    }

    /**
     * Get a specific profession
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getClass(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/playable-class/%d', $id);

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
    public function getClassMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/playable-class/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific profession skill tier
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getClassPvpTalentSlots(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/playable-class/%d/pvp-talent-slots', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
