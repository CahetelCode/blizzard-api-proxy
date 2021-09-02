<?php

class RealmsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Realms::class;

        $this->runProxyTest($proxy, 'getRealms', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getRealm', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'searchRealms', [['locale' => 'it_IT']]);
    }

}
