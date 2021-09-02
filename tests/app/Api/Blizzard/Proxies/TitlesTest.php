<?php

class TitlesTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Titles::class;

        $this->runProxyTest($proxy, 'getTitles', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getTitle', [1, ['locale' => 'it_IT']]);
    }

}
