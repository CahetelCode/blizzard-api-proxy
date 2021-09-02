<?php

class MediaTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Media::class;

        $this->runProxyTest($proxy, 'search', [['locale' => 'it_IT']]);
    }

}
