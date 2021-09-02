<?php

class TechTalentsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\TechTalents::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\TechTalentsController::class;

        $this->doBaseUsageTest($proxy, 'getTechTalentTrees', $controller, 'techTalentTreesIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getTechTalentTree', $controller, 'techTalentTreeShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getTechTalents', $controller, 'techTalentsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getTechTalent', $controller, 'techTalentShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getTechTalentMedia', $controller, 'techTalentMediaShow', $this->getStandardRequest(), [1]);
    }

}
