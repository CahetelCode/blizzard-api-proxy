<?php

class AzeriteTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Azerite::class;

        $this->runProxyTest($proxy, 'getAzerites', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getAzerite', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'azeriteSearch', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getAzeriteMedia', [1, ['locale' => 'it_IT']]);
    }

}
