<?php

class PowerTypesTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\PowerTypes::class;

        $this->runProxyTest($proxy, 'getPowerTypes', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getPowerType', [1, ['locale' => 'it_IT']]);
    }

}
