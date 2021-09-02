<?php

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class AccessTokenRefresherTest extends TestCase
{

    public function testRefresh()
    {
        $token = (object) [
            'access_token' => 'access_token',
            'expires_in'   => 1,
            'region'       => 'region',
        ];
        $proxy = Mockery::mock(\App\Api\Blizzard\Proxies\Auth::class)
                        ->shouldReceive('getAuthToken')->once()->andReturn($token)
                        ->getMock();
        Mockery::mock('overload:'.\App\Api\Blizzard\BlizzardProxyBuilder::class)
               ->shouldReceive('getProxy')->andReturn($proxy);
        Mockery::mock('overload:'.\App\Models\AccessToken::class)
               ->shouldReceive('fill')->andReturnSelf()
               ->shouldReceive('save')->andReturnSelf();

        $test = new \App\AccessTokenRefresher('blizzard', 'eu');

        $this->assertInstanceOf(\App\Models\AccessToken::class, $test->refresh());
    }

}
