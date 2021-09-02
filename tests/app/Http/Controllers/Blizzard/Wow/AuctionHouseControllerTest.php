<?php

class AuctionHouseControllerTest extends WowControllerTestCase
{

    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\AuctionHouse::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\AuctionHouseController::class;

        $this->doBaseUsageTest($proxy, 'getAuctionHouses', $controller, 'auctionHousesIndex', $this->getStandardRequest(), [1]);
    }

}
