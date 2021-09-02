<?php

class MythicDungeonsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\MythicDungeon::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\MythicDungeonsController::class;

        $this->doBaseUsageTest($proxy, 'getDungeons', $controller, 'dungeonsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getDungeon', $controller, 'dungeonShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getKeystones', $controller, 'keystonesIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getPeriods', $controller, 'periodsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getPeriod', $controller, 'periodShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getSeasons', $controller, 'seasonsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getSeason', $controller, 'seasonShow', $this->getStandardRequest(), [1]);
    }

}
