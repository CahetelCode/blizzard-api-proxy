<?php

class CreaturesControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Creatures::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\CreaturesController::class;
        $request    = Mockery::mock(\Illuminate\Http\Request::class)
                             ->shouldReceive('all')->once()->andReturn([])
                             ->shouldReceive('get')->twice()->andReturn('')
                             ->shouldReceive('merge')->once()->andReturnSelf()
                             ->getMock();

        $this->doBaseUsageTest($proxy, 'getCreaturesFamilyIndex', $controller, 'creaturesFamilyIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getCreatureFamily', $controller, 'creatureFamilyShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getCreaturesTypesIndex', $controller, 'creaturesTypeIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getCreature', $controller, 'creatureShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getCreatureSearch', $controller, 'creatureSearch', $request);
        $this->doBaseUsageTest($proxy, 'getCreatureMedia', $controller, 'creatureMediaShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getCreatureFamilyMedia', $controller, 'creatureFamilyMediaShow', $this->getStandardRequest(), [1]);
    }

}
