<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Items
 *
 * @package App\Api\Blizzard\Proxies
 */
class Items extends AbstractBlizzardProxy
{

    /**
     * Get the items classes index
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getItemClassesIndex(array $params) : stdClass
    {
        return $this->api->get('/data/wow/item-class/index', $this->filterParams($params));
    }

    /**
     * Get the item class by id
     *
     * @param  array  $params
     * @param  int  $id
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getItemClass(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/item-class/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the item sets index
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getItemSetsIndex(array $params) : stdClass
    {
        return $this->api->get('/data/wow/item-set/index', $this->filterParams($params));
    }

    /**
     * Get the item sets by id
     *
     * @param  array  $params
     * @param  int  $id
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getItemSet(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/item-set/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the item subclass by id
     *
     * @param  array  $params
     * @param  int  $idClass
     * @param  int  $idSubClass
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getItemSubclass(int $idClass, int $idSubClass, array $params) : stdClass
    {
        $url = sprintf('/data/wow/item-class/%d/item-subclass/%d', $idClass, $idSubClass);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the item by ID
     *
     * @param  array  $params
     * @param  int  $id
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getItem(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/item/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the item media by ID
     *
     * @param  array  $params
     * @param  int  $id
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getItemMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/item/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Perform a search of items
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getItems(array $params) : stdClass
    {
        $params   = array_filter($params);
        $accepted = [
            'locale',
            'orderby',
            '_page',
            'name.'.$params['locale'],
        ];

        return $this->api->get('/data/wow/search/item', $this->filterParams($params, $accepted));
    }
}
