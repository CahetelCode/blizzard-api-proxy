<?php

class MythicKeystoneLeaderboardTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\MythicKeystoneLeaderboard::class;

        $this->runProxyTest($proxy, 'getBoards', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getBoard', [1, 2, 3, ['locale' => 'it_IT']]);
    }

}
