<?php

class BlizzardProxyBuilderTest extends TestCase
{

    public function testAuthBuilder()
    {
        $ns     = \App\Api\Blizzard\Proxies\Auth::class;
        $region = 'eu';

        $this->assertInstanceOf($ns, \App\Api\Blizzard\BlizzardProxyBuilder::getProxy($ns, $region));
    }

    public function testPoxyBuilder()
    {
        $ns           = \App\Api\Blizzard\Proxies\Achievements::class;
        $region       = 'eu';
        $token        = new \App\Models\AccessToken();
        $token->token = 'token';

        $this->assertInstanceOf($ns, \App\Api\Blizzard\BlizzardProxyBuilder::getProxy($ns, $region, $token, 'battlenet namespace'));
    }

}
