<?php

class JournalControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Journal::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\JournalController::class;
        $request    = Mockery::mock(\Illuminate\Http\Request::class)
                             ->shouldReceive('all')->once()->andReturn([])
                             ->shouldReceive('get')->twice()->andReturn('')
                             ->shouldReceive('merge')->once()->andReturnSelf()
                             ->getMock();

        $this->doBaseUsageTest($proxy, 'getExpansionsIndex', $controller, 'expansionsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getExpansions', $controller, 'expansionShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getEncountersIndex', $controller, 'encountersIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getEncounter', $controller, 'encounterShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getEncounters', $controller, 'encounterSearch', $request, [1]);
        $this->doBaseUsageTest($proxy, 'getInstancesIndex', $controller, 'instancesIndex', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getInstance', $controller, 'instanceShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getInstanceMedia', $controller, 'instanceMediaShow', $this->getStandardRequest(), [1]);
    }

}
