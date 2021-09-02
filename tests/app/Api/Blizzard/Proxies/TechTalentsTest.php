<?php

class TechTalentsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\TechTalents::class;

        $this->runProxyTest($proxy, 'getTechTalentTrees', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getTechTalentTree', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getTechTalents', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getTechTalent', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getTechTalentMedia', [1, ['locale' => 'it_IT']]);
    }

}
