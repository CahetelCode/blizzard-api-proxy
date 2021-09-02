<?php

class GuildCrestTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\GuildCrest::class;

        $this->runProxyTest($proxy, 'getGuildCrestIndex', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getGuildCrestBorder', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getGuildCrestEmblem', [1, ['locale' => 'it_IT']]);
    }

}
