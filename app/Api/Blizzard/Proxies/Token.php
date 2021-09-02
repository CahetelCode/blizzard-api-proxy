<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Token
 *
 * @package App\Api\Blizzard\Proxies
 */
class Token extends AbstractBlizzardProxy
{

    /**
     * Get the token price
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTokens(array $params) : stdClass
    {
        return $this->api->get('/data/wow/token/index', $this->filterParams($params));
    }
}
