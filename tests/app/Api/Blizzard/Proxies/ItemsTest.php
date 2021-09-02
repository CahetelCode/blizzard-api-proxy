<?php

class ItemsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Items::class;

        $this->runProxyTest($proxy, 'getItemClassesIndex', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getItemClass', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getItemSetsIndex', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getItemSet', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getItemSubclass', [1, 2, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getItem', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getItemMedia', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getItems', [['locale' => 'it_IT']]);
    }

}
