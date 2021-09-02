<?php

class TalentsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Talents::class;

        $this->runProxyTest($proxy, 'getTalents', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getTalent', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getPvpTalents', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getPvpTalent', [1, ['locale' => 'it_IT']]);
    }

}
