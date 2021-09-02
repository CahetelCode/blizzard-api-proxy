<?php

class ItemsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Items::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\ItemsController::class;
        $request    = Mockery::mock(\Illuminate\Http\Request::class)
                             ->shouldReceive('all')->once()->andReturn([])
                             ->shouldReceive('get')->twice()->andReturn('')
                             ->shouldReceive('merge')->once()->andReturnSelf()
                             ->getMock();

        $this->doBaseUsageTest($proxy, 'getItemClassesIndex', $controller, 'itemClassesIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getItemClass', $controller, 'itemClassById', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getItemSetsIndex', $controller, 'itemSetIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getItemSet', $controller, 'itemSetById', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getItemSubclass', $controller, 'itemSubClassById', $this->getStandardRequest(), [1, 2]);
        $this->doBaseUsageTest($proxy, 'getItem', $controller, 'itemById', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getItemMedia', $controller, 'itemMediaById', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getItems', $controller, 'itemSearch', $request);
    }

}
