<?php

class PetsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Pets::class;

        $this->runProxyTest($proxy, 'getPets', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getPet', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getPetMedia', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getPetsAbilities', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getPetAbility', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getPetAbilityMedia', [1, ['locale' => 'it_IT']]);
    }

}
