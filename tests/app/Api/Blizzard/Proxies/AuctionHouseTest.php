<?php

class AuctionHouseTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\AuctionHouse::class;

        $this->runProxyTest($proxy, 'getAuctionHouses', [1, ['locale' => 'it_IT']]);
    }

}
