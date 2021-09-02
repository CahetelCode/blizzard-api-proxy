<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Spells
 *
 * @package App\Api\Blizzard\Proxies
 */
class Spells extends AbstractBlizzardProxy
{

    /**
     * Get a specific spell
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSpell(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/spell/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific spell media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSpellMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/spell/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the spells list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getSpells(array $params) : stdClass
    {
        $params   = array_filter($params);
        $accepted = [
            'locale',
            'orderby',
            '_page',
            'name.'.$params['locale'],
        ];

        return $this->api->get('/data/wow/search/spell', $this->filterParams($params, $accepted));
    }

}
