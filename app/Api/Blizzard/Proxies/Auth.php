<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Auth
 *
 * @package App\Api\Blizzard\Proxies
 *
 * @codeCoverageIgnore
 */
class Auth extends AbstractBlizzardProxy
{

    /**
     * Get auth token
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAuthToken() : stdClass
    {
        return $this->api->post('/oauth/token');
    }

}
