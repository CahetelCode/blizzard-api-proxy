<?php

namespace App\Api\Blizzard\Proxies;

use App\Api\Blizzard\AbstractBlizzardProxy;
use App\Api\Exceptions\ApiError;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

/**
 * Class Auction House
 *
 * @package App\Api\Blizzard\Proxies
 */
class AuctionHouse extends AbstractBlizzardProxy
{

    /**
     * Returns all active auctions
     *
     * @param  int  $id
     * @param  array  $params
     *
     * @return stdClass
     *
     * @throws ApiError|GuzzleException
     */
    public function getAuctionHouses(int $id, array $params) : stdClass
    {
        $url = sprintf('/data/wow/connected-realm/%d/auctions', $id);

        return $this->api->get($url, $this->filterParams($params));
    }
}
