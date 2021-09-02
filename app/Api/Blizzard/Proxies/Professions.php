<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Professions
 *
 * @package App\Api\Blizzard\Proxies
 */
class Professions extends AbstractBlizzardProxy
{

    /**
     * Get the professions list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getProfessions(array $params) : stdClass
    {
        return $this->api->get('/data/wow/profession/index', $this->filterParams($params));
    }

    /**
     * Get a specific profession
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getProfession(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/profession/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific profession media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getProfessionMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/profession/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific profession skill tier
     *
     * @param  int  $id
     * @param  int  $tier
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getProfessionSkillTier(int $id, int $tier, array $params) : stdClass
    {
        $url = sprintf('/data/wow/profession/%d/skill-tier/%s', $id, $tier);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific recipe
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getRecipe(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/recipe/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific recpe media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getRecipeMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/recipe/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
