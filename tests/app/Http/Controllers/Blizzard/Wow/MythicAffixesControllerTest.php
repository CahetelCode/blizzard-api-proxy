<?php

class MythicAffixesControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\MythicKeystoneAffixes::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\MythicAffixesController::class;

        $this->doBaseUsageTest($proxy, 'getAffixes', $controller, 'affixesIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getAffix', $controller, 'affixShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getAffixMedia', $controller, 'affixMediaShow', $this->getStandardRequest(), [1]);
    }

}
