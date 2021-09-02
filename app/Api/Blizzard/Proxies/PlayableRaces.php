<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class PlayableRaces
 *
 * @package App\Api\Blizzard\Proxies
 */
class PlayableRaces extends AbstractBlizzardProxy
{

    /**
     * Get the races list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getRaces(array $params) : stdClass
    {
        return $this->api->get('/data/wow/playable-race/index', $this->filterParams($params));
    }

    /**
     * Get a specific race
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getRace(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/playable-race/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
