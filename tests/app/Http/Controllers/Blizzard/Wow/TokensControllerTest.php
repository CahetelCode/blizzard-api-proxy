<?php

class TokensControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Token::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\TokensController::class;

        $this->doBaseUsageTest($proxy, 'getTokens', $controller, 'getTokenPrice', $this->getStandardRequest());
    }

}
