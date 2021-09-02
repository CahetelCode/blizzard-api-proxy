<?php

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class CacheSuccessfulResponseTest extends TestCase
{

    public function testCacheSuccess()
    {
        Mockery::mock('overload:'.\App\UrlHash::class)
               ->shouldReceive('init')->andReturnSelf()
               ->shouldReceive('getMd5')->andReturn('md5');
        Mockery::mock('overload:'.\App\Cache\Cache::class)
               ->shouldReceive('init')->once()->andReturnSelf()
               ->shouldReceive('set')->once()->andReturnSelf()
               ->shouldReceive('isAvailable')->once()->andReturntrue();

        $response  = (new \Illuminate\Http\JsonResponse())
            ->setStatusCode(200)
            ->setContent('{"success":true}');
        $validator = Mockery::mock(\App\Api\Blizzard\NamespaceHeaderValidator::class)
                            ->shouldReceive('isStatic')->twice()->andReturntrue()
                            ->getMock();
        $request   = Mockery::mock(\Illuminate\Http\Request::class)
                            ->shouldReceive('get')->once()->andReturn($validator)
                            ->getMock();
        $closure   = function ($r) use ($response) {
            return $response;
        };

        $test = new \App\Http\Middleware\CacheSuccessfulResponse();

        $this->assertEquals($response, $test->handle($request, $closure));
    }

}
