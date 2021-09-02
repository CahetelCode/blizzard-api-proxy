<?php

class MountsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Mounts::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\MountsController::class;
        $request    = Mockery::mock(\Illuminate\Http\Request::class)
                             ->shouldReceive('all')->once()->andReturn([])
                             ->shouldReceive('get')->twice()->andReturn('')
                             ->shouldReceive('merge')->once()->andReturnSelf()
                             ->getMock();

        $this->doBaseUsageTest($proxy, 'getMounts', $controller, 'mountsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getMount', $controller, 'mountShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'searchMount', $controller, 'mountsSearch', $request);
    }

}
