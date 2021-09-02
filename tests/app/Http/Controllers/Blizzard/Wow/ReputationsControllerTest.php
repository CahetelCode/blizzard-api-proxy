<?php

class ReputationsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Reputations::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\ReputationsController::class;

        $this->doBaseUsageTest($proxy, 'getFactions', $controller, 'factionsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getFaction', $controller, 'factionShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getTiers', $controller, 'tiersIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getTier', $controller, 'tierShow', $this->getStandardRequest(), [1]);
    }

}
