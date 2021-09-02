<?php

class RegionsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Regions::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\RegionsController::class;

        $this->doBaseUsageTest($proxy, 'getRegions', $controller, 'regionsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getRegion', $controller, 'regionShow', $this->getStandardRequest(), [1]);
    }

}
