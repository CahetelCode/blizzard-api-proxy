<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Guild Crest
 *
 * @package App\Api\Blizzard\Proxies
 */
class GuildCrest extends AbstractBlizzardProxy
{

    /**
     * Returns guild crest list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getGuildCrestIndex(array $params) : stdClass
    {
        return $this->api->get('/data/wow/guild-crest/index', $this->filterParams($params));
    }

    /**
     * Returns guild crest border media by id
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getGuildCrestBorder(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/guild-crest/border/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Returns guild crest emblem media by id
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getGuildCrestEmblem(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/guild-crest/emblem/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }
}
