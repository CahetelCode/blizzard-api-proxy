<?php

class CovenantsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Covenants::class;

        $this->runProxyTest($proxy, 'getCovenants', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getCovenant', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getCovenantMedia', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getSoulbinds', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getSoulbind', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getConduits', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getConduit', [1, ['locale' => 'it_IT']]);
    }

}
