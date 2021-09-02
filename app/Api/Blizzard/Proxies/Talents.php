<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Talents
 *
 * @package App\Api\Blizzard\Proxies
 */
class Talents extends AbstractBlizzardProxy
{

    /**
     * Get the talents list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTalents(array $params) : stdClass
    {
        return $this->api->get('/data/wow/talent/index', $this->filterParams($params));
    }

    /**
     * Get a talent info
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTalent(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/talent/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the pvp talents list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPvpTalents(array $params) : stdClass
    {
        return $this->api->get('/data/wow/pvp-talent/index', $this->filterParams($params));
    }

    /**
     * Get a pvp talent info
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getPvpTalent(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/pvp-talent/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
