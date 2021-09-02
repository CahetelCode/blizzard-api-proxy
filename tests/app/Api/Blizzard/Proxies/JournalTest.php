<?php

class JournalTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Journal::class;

        $this->runProxyTest($proxy, 'getExpansionsIndex', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getExpansions', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getEncountersIndex', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getEncounter', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getEncounters', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getInstancesIndex', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getInstance', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getInstanceMedia', [1, ['locale' => 'it_IT']]);
    }

}
