<?php

class MythicRaidLeaderboardsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\MythicRaidLeaderboard::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\MythicRaidLeaderboardsController::class;

        $this->doBaseUsageTest($proxy, 'getBoard', $controller, 'leaderboardShow', $this->getStandardRequest(), [1, 2]);
    }

}
