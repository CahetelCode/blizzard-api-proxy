<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Titles
 *
 * @package App\Api\Blizzard\Proxies
 */
class Titles extends AbstractBlizzardProxy
{

    /**
     * Get the titles list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTitles(array $params) : stdClass
    {
        return $this->api->get('/data/wow/title/index', $this->filterParams($params));
    }

    /**
     * Get a title info
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTitle(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/title/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
