<?php

class TalentsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Talents::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\TalentsController::class;

        $this->doBaseUsageTest($proxy, 'getTalents', $controller, 'talentsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getTalent', $controller, 'talentShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getPvpTalents', $controller, 'pvpTalentsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getPvpTalent', $controller, 'pvpTalentShow', $this->getStandardRequest(), [1]);
    }

}
