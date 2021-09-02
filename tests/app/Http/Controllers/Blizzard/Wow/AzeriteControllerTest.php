<?php

class AzeriteControllerTest extends WowControllerTestCase
{

    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Azerite::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\AzeriteController::class;
        $request    = Mockery::mock(\Illuminate\Http\Request::class)
                             ->shouldReceive('all')->once()->andReturn([])
                             ->shouldReceive('get')->once()->andReturn('')
                             ->shouldReceive('merge')->once()->andReturnSelf()
                             ->getMock();

        $this->doBaseUsageTest($proxy, 'getAzerites', $controller, 'azeriteIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getAzerite', $controller, 'azeriteShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'azeriteSearch', $controller, 'azeriteSearch', $request);
        $this->doBaseUsageTest($proxy, 'getAzeriteMedia', $controller, 'azeriteMediaShow', $this->getStandardRequest(), [1]);
    }

}
