<?php

class MountsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Mounts::class;

        $this->runProxyTest($proxy, 'getMounts', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getMount', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'searchMount', [['locale' => 'it_IT']]);
    }

}
