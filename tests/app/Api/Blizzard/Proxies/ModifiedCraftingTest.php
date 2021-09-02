<?php

class ModifiedCraftingTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\ModifiedCrafting::class;

        $this->runProxyTest($proxy, 'getModifiedCrafting', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getCategories', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getCategory', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getReagents', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getReagent', [1, ['locale' => 'it_IT']]);
    }

}
