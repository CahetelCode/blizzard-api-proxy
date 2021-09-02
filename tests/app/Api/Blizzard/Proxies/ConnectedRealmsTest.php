<?php

class ConnectedRealmsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\ConnectedRealms::class;

        $this->runProxyTest($proxy, 'getConnectedRealms', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getConnectedRealm', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getConnectedRealmSearch', [['locale' => 'it_IT']]);
    }

}
