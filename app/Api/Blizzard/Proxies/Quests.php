<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Quests
 *
 * @package App\Api\Blizzard\Proxies
 */
class Quests extends AbstractBlizzardProxy
{

    /**
     * Get the quests list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getQuests(array $params) : stdClass
    {
        return $this->api->get('/data/wow/quest/index', $this->filterParams($params));
    }

    /**
     * Get a quest
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getQuest(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/quest/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the quests categories list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getQuestsCategories(array $params) : stdClass
    {
        return $this->api->get('/data/wow/quest/category/index', $this->filterParams($params));
    }

    /**
     * Get a quest category
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getQuestCategory(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/quest/category/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the quests areas list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getQuestsAreas(array $params) : stdClass
    {
        return $this->api->get('/data/wow/quest/area/index', $this->filterParams($params));
    }

    /**
     * Get a quest area
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getQuestArea(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/quest/area/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the quests types list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getQuestsTypes(array $params) : stdClass
    {
        return $this->api->get('/data/wow/quest/type/index', $this->filterParams($params));
    }

    /**
     * Get a quest type
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getQuestType(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/quest/type/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
