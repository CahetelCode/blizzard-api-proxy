<?php

class PvpTiersControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\PvpTier::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\PvpTiersController::class;

        $this->doBaseUsageTest($proxy, 'getTiers', $controller, 'pvpTierIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getTier', $controller, 'pvpTierShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getTierMedia', $controller, 'pvpTierMediaShow', $this->getStandardRequest(), [1]);
    }

}
