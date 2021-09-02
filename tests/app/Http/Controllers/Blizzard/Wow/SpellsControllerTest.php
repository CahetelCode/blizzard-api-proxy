<?php

class SpellsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Spells::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\SpellsController::class;
        $request    = Mockery::mock(\Illuminate\Http\Request::class)
                             ->shouldReceive('all')->once()->andReturn([])
                             ->shouldReceive('get')->twice()->andReturn('')
                             ->shouldReceive('merge')->once()->andReturnSelf()
                             ->getMock();

        $this->doBaseUsageTest($proxy, 'getSpell', $controller, 'spellShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getSpellMedia', $controller, 'spellMediaShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getSpells', $controller, 'spellsSearch', $request);
    }

}
