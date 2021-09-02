<?php

class WowControllerTestCase extends TestCase
{

    protected function getStandardRequest()
    {
        return Mockery::mock(\Illuminate\Http\Request::class)
                      ->shouldReceive('all')->once()->andReturn([])
                      ->getMock();
    }

    protected function doBaseUsageTest(string $proxy, string $proxyMethod, string $controller, string $controllerMethod, $request, array $additionalControllerArgs = [])
    {
        $response = (object) [
            'test' => 'data'
        ];
        $proxy    = Mockery::mock($proxy)
                           ->shouldReceive($proxyMethod)->andReturn($response)
                           ->getMock();

        $test = Mockery::mock($controller)->makePartial()->shouldAllowMockingProtectedMethods();
        $test->shouldReceive('getBlizzardProxy')->once()->andReturn($proxy);

        $result   = $test->$controllerMethod(...array_values(array_merge([$request], $additionalControllerArgs)));
        $expected = (object) [
            'success'  => true,
            'response' => $response,
        ];
        $expected = new \Illuminate\Http\JsonResponse($expected);

        $this->assertEquals($expected, $result);
    }

}
