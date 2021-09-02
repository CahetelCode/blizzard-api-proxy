<?php

class PvpTierTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\PvpTier::class;

        $this->runProxyTest($proxy, 'getTiers', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getTier', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getTierMedia', [1, ['locale' => 'it_IT']]);
    }

}
