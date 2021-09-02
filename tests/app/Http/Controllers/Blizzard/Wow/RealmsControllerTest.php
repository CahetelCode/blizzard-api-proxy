<?php

class RealmsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Realms::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\RealmsController::class;

        $this->doBaseUsageTest($proxy, 'getRealms', $controller, 'realmsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getRealm', $controller, 'realmShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'searchRealms', $controller, 'searchRealm', $this->getStandardRequest());
    }

}
