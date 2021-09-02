<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class PlayableSpecializations
 *
 * @package App\Api\Blizzard\Proxies
 */
class PlayableSpecializations extends AbstractBlizzardProxy
{

    /**
     * Get the specializations list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSpecializations(array $params) : stdClass
    {
        return $this->api->get('/data/wow/playable-specialization/index', $this->filterParams($params));
    }

    /**
     * Get a specific specialization
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSpecialization(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/playable-specialization/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific specialization media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSpecializationMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/playable-specialization/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
