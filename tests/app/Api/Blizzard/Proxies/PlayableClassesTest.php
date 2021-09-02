<?php

class PlayableClassesTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\PlayableClasses::class;

        $this->runProxyTest($proxy, 'getClasses', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getClass', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getClassMedia', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getClassPvpTalentSlots', [1, ['locale' => 'it_IT']]);
    }

}
