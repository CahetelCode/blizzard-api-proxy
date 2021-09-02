<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class ModifiedCrafting
 *
 * @package App\Api\Blizzard\Proxies
 */
class ModifiedCrafting extends AbstractBlizzardProxy
{

    /**
     * Get the list of modified crafting
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getModifiedCrafting(array $params) : stdClass
    {
        return $this->api->get('/data/wow/modified-crafting/index', $this->filterParams($params));
    }

    /**
     * Get the list of modified crafting categories
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCategories(array $params) : stdClass
    {
        return $this->api->get('/data/wow/modified-crafting/category/index', $this->filterParams($params));
    }

    /**
     * Get a specific modified crafting category
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getCategory(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/modified-crafting/category/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the list of reagents
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getReagents(array $params) : stdClass
    {
        return $this->api->get('/data/wow/modified-crafting/reagent-slot-type/index', $this->filterParams($params));
    }

    /**
     * Get a specific reagent
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getReagent(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/modified-crafting/reagent-slot-type/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
