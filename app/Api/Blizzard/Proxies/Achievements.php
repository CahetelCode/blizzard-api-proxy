<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Achievements
 *
 * @package App\Api\Blizzard\Proxies
 */
class Achievements extends AbstractBlizzardProxy
{

    /**
     * Returns an index of achievement categories
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAchievementsCategories(array $params) : stdClass
    {
        return $this->api->get('/data/wow/achievement-category/index', $this->filterParams($params));
    }

    /**
     * Returns a specific category
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAchievementsCategory(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/achievement-category/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Returns an index of achievements
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAchievements(array $params) : stdClass
    {
        return $this->api->get('/data/wow/achievement/index', $this->filterParams($params));
    }

    /**
     * Returns a specific achievement
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAchievement(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/achievement/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Returns a specific achievement media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAchievementMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/achievement/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }
}
