<?php

class MythicKeystoneAffixesTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\MythicKeystoneAffixes::class;

        $this->runProxyTest($proxy, 'getAffixes', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getAffix', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getAffixMedia', [1, ['locale' => 'it_IT']]);
    }

}
