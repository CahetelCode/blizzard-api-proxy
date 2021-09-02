<?php

class ValidateBlizzardNamespaceHeaderTest extends TestCase
{

    public function testSuccess()
    {
        $request = Mockery::mock(\Illuminate\Http\Request::class)
                          ->shouldReceive('header')->once()->andReturn('static-eu')
                          ->shouldReceive('merge')->once()->andReturnSelf()
                          ->getMock();
        $closure = function ($r) {
            return true;
        };

        $test = new \App\Http\Middleware\ValidateBlizzardNamespaceHeader();

        $this->assertTrue($test->handle($request, $closure));
    }

    public function testFail()
    {
        $request = Mockery::mock(\Illuminate\Http\Request::class)
                          ->shouldReceive('header')->once()->andReturn('invalid')
                          ->getMock();
        $closure = function ($r) {
            return true;
        };

        $test = new \App\Http\Middleware\ValidateBlizzardNamespaceHeader();

        $this->assertInstanceOf(\Illuminate\Http\JsonResponse::class, $test->handle($request, $closure));
    }

}
