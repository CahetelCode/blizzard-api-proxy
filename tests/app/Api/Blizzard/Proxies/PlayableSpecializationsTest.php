<?php

class PlayableSpecializationsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\PlayableSpecializations::class;

        $this->runProxyTest($proxy, 'getSpecializations', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getSpecialization', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getSpecializationMedia', [1, ['locale' => 'it_IT']]);
    }

}
