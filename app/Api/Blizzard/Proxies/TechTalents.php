<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class TechTalents
 *
 * @package App\Api\Blizzard\Proxies
 */
class TechTalents extends AbstractBlizzardProxy
{

    /**
     * Get the tech talent trees list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTechTalentTrees(array $params) : stdClass
    {
        return $this->api->get('/data/wow/tech-talent-tree/index', $this->filterParams($params));
    }

    /**
     * Get a specific tech talent tree
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTechTalentTree(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/tech-talent-tree/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get the tech talents list
     *
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTechTalents(array $params) : stdClass
    {
        return $this->api->get('/data/wow/tech-talent/index', $this->filterParams($params));
    }

    /**
     * Get a specific tech talent
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTechTalent(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/tech-talent/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

    /**
     * Get a specific tech talent media
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getTechTalentMedia(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/media/tech-talent/%d', $id);

        return $this->api->get($url, $this->filterParams($params));
    }

}
