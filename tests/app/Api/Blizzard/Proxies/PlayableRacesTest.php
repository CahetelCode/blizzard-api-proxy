<?php

class PlayableRacesTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\PlayableRaces::class;

        $this->runProxyTest($proxy, 'getRaces', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getRace', [1, ['locale' => 'it_IT']]);
    }

}
