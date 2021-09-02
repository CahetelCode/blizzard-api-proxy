<?php

class ConnectedRealmsControllerTest extends WowControllerTestCase
{

    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\ConnectedRealms::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\ConnectedRealmsController::class;
        $request    = Mockery::mock(\Illuminate\Http\Request::class)
                             ->shouldReceive('all')->once()->andReturn([])
                             ->shouldReceive('get')->twice()->andReturn('')
                             ->shouldReceive('merge')->once()->andReturnSelf()
                             ->getMock();

        $this->doBaseUsageTest($proxy, 'getConnectedRealms', $controller, 'connectedRealmsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getConnectedRealm', $controller, 'connectedRealmShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getConnectedRealmSearch', $controller, 'connectedRealmSearch', $request);
    }

}
