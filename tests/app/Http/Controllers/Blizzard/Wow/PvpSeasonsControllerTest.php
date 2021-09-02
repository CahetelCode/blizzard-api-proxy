<?php

class PvpSeasonsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\PvpSeason::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\PvpSeasonsController::class;

        $this->doBaseUsageTest($proxy, 'getSeasons', $controller, 'seasonsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getSeason', $controller, 'seasonShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getLeaderboards', $controller, 'leaderboardsIndex', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getSeasonLeaderboard', $controller, 'leaderboardShow', $this->getStandardRequest(), [1, 'bracket']);
        $this->doBaseUsageTest($proxy, 'getSeasonRewards', $controller, 'rewardsIndex', $this->getStandardRequest(), [1]);
    }

}
