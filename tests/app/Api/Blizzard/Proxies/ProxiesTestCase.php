<?php

class ProxiesTestCase extends TestCase
{

    protected function runProxyTest(string $proxy, string $method, array $arguments = [])
    {
        $api = Mockery::mock(\App\Api\Api::class)
                      ->shouldReceive('get')->once()->andReturn(new \stdClass())
                      ->getMock();

        $test = new $proxy($api);
        $this->assertEquals(new \stdClass(), $test->$method(...$arguments));
    }

}
