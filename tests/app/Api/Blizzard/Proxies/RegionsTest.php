<?php

class RegionsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Regions::class;

        $this->runProxyTest($proxy, 'getRegions', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getRegion', [1, ['locale' => 'it_IT']]);
    }

}
