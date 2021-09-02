<?php

class SpellsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Spells::class;

        $this->runProxyTest($proxy, 'getSpell', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getSpellMedia', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getSpells', [['locale' => 'it_IT']]);
    }

}
