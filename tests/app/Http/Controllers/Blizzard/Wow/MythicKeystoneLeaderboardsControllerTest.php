<?php

class MythicKeystoneLeaderboardsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\MythicKeystoneLeaderboard::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\MythicKeystoneLeaderboardsController::class;

        $this->doBaseUsageTest($proxy, 'getBoards', $controller, 'leaderboardIndex', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getBoard', $controller, 'leaderboardShow', $this->getStandardRequest(), [1, 2, 3]);
    }

}
