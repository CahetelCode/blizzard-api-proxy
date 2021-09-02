<?php

class ReputationsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Reputations::class;

        $this->runProxyTest($proxy, 'getFactions', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getFaction', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getTiers', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getTier', [1, ['locale' => 'it_IT']]);
    }

}
