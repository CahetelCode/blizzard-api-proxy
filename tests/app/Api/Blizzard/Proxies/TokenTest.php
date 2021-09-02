<?php

class TokenTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Token::class;

        $this->runProxyTest($proxy, 'getTokens', [['locale' => 'it_IT']]);
    }

}
