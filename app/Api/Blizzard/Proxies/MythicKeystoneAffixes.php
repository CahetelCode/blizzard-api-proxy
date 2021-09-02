<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class MythicKeystoneAffixes
 *
 * @package App\Api\Blizzard\Proxies
 */
class MythicKeystoneAffixes extends AbstractBlizzardProxy
{

    /**
     * Get the affixes
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAffixes(array $params) : stdClass
    {
        return $this->api->get('/data/wow/keystone-affix/index', $this->filterParams($params));
    }

    /**
     * Get an affix
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAffix(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/keystone-affix/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get an affix media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAffixMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/keystone-affix/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
