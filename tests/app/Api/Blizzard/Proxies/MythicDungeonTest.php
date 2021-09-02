<?php

class MythicDungeonTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\MythicDungeon::class;

        $this->runProxyTest($proxy, 'getDungeons', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getDungeon', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getKeystones', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getPeriods', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getPeriod', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getSeasons', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getSeason', [1, ['locale' => 'it_IT']]);
    }

}
