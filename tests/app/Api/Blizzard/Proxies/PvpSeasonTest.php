<?php

class PvpSeasonTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\PvpSeason::class;

        $this->runProxyTest($proxy, 'getSeasons', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getSeason', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getLeaderboards', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getSeasonLeaderboard', [1, 'bracket', ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getSeasonRewards', [1, ['locale' => 'it_IT']]);
    }

}
