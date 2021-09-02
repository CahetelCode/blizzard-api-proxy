<?php

class MythicRaidLeaderboardTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\MythicRaidLeaderboard::class;

        $this->runProxyTest($proxy, 'getBoard', ['raid', 'faction', ['locale' => 'it_IT']]);
    }

}
