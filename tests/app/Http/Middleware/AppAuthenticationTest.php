<?php

class AppAuthenticationTest extends TestCase
{

    public function testAuthSuccess()
    {
        $request = Mockery::mock(\Illuminate\Http\Request::class)
                          ->shouldReceive('header')->once()->andReturn('auth_token')
                          ->getMock();
        $closure = function ($r) {
            return true;
        };

        $test = new \App\Http\Middleware\AppAuthentication();

        $this->assertTrue($test->handle($request, $closure));
    }

    public function testAuthFail()
    {
        $request = Mockery::mock(\Illuminate\Http\Request::class)
                          ->shouldReceive('header')->once()->andReturn('invalid')
                          ->getMock();
        $closure = function ($r) {
            return true;
        };

        $test = new \App\Http\Middleware\AppAuthentication();

        $this->assertInstanceOf(\Illuminate\Http\JsonResponse::class, $test->handle($request, $closure));
    }

}
