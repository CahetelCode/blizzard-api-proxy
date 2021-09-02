<?php

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class GenerateBlizzardAuthTokenTest extends TestCase
{

    public function testTokenGeneration()
    {
        Mockery::mock('overload:'.\App\Models\AccessToken::class)
               ->shouldReceive('getLast')->andReturnNull();
        Mockery::mock('overload:'.\App\AccessTokenRefresher::class)
               ->shouldReceive('refresh')->once()->andReturn('token');

        $request = Mockery::mock(\Illuminate\Http\Request::class)
                          ->shouldReceive('route')->once()->andReturn('eu')
                          ->shouldReceive('merge')->once()->andReturnSelf()
                          ->getMock();
        $closure = function ($r) {
            return true;
        };

        $test = new \App\Http\Middleware\GenerateBlizzardAuthToken();

        $this->assertTrue($test->handle($request, $closure));
    }

}
