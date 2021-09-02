<?php

class CreaturesTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Creatures::class;

        $this->runProxyTest($proxy, 'getCreaturesFamilyIndex', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getCreatureFamily', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getCreaturesTypesIndex', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getCreatureType', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getCreature', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getCreatureSearch', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getCreatureMedia', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getCreatureFamilyMedia', [1, ['locale' => 'it_IT']]);
    }

}
