<?php

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class GetCachedResponseTest extends TestCase
{

    public function testCachedKey()
    {
        $response = serialize('test');
        Mockery::mock('overload:'.\App\Cache\Cache::class)
               ->shouldReceive('init')->andReturnSelf()
               ->shouldReceive('isAvailable')->andReturnTrue()
               ->shouldReceive('has')->andReturnTrue()
               ->shouldReceive('get')->andReturn($response);

        $request = Mockery::mock(\Illuminate\Http\Request::class);
        $closure = function ($r) {
            return false;
        };

        $test = new \App\Http\Middleware\GetCachedResponse();

        $this->assertEquals('test', $test->handle($request, $closure));
    }

    public function testNoCache()
    {
        $response = serialize('test');
        Mockery::mock('overload:'.\App\Cache\Cache::class)
               ->shouldReceive('init')->andReturnSelf()
               ->shouldReceive('isAvailable')->andReturnfalse();

        $request = Mockery::mock(\Illuminate\Http\Request::class);
        $closure = function ($r) {
            return false;
        };

        $test = new \App\Http\Middleware\GetCachedResponse();

        $this->assertFalse($test->handle($request, $closure));
    }

}
