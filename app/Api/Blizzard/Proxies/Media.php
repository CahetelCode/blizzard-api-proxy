<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Media
 *
 * @package App\Api\Blizzard\Proxies
 */
class Media extends AbstractBlizzardProxy
{

    /**
     * Media search
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function search(array $params) : stdClass
    {
        $params   = array_filter($params);
        $accepted = [
            'locale',
            'orderby',
            '_page',
            'tags',
        ];

        return $this->api->get('/data/wow/search/media', $this->filterParams($params, $accepted));
    }
}
