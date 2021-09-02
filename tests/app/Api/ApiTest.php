<?php

class ApiTest extends TestCase
{
    public function testCallSuccess()
    {
        $requestOptions = [
            'query'   => ['key' => 'valueA'],
            'body'    => ['key' => 'valueB'],
            'headers' => ['key' => 'valueC'],
        ];
        $body     = Mockery::mock(Psr\Http\Message\StreamInterface::class)
                        ->shouldReceive('getContents')->once()->andReturn('{"key":"value"}')
                        ->getMock();
        $response = Mockery::mock(\Psr\Http\Message\ResponseInterface::class)
                        ->shouldReceive('getBody')->once()->andReturn($body)
                        ->getMock();
        $client   = Mockery::mock(\GuzzleHttp\Client::class)
                        ->shouldReceive('request')->once()->with('GET','http://test.com', $requestOptions)->andReturn($response)
                        ->getMock();

        $test = new \App\Api\Api($client);

        $result      = $test->call('GET','http://test.com',['key' => 'valueA'],['key' => 'valueB'],['key' => 'valueC']);
        $expectation = (object)['key' => 'value'];

        $this->assertEquals($expectation, $result);
    }

    public function testCallUnsuccess404()
    {
        $req = Mockery::mock(\Psr\Http\Message\RequestInterface::class);
        $res = Mockery::mock(\Psr\Http\Message\ResponseInterface::class)
            ->shouldReceive('getStatusCode')->andReturn(404)
            ->getMock();
        $e        = new \GuzzleHttp\Exception\ClientException('error', $req, $res);
        $client   = Mockery::mock(\GuzzleHttp\Client::class)
                        ->shouldReceive('request')->once()->andThrow($e)
                        ->getMock();

        $test = new \App\Api\Api($client);

        $result      = $test->call('GET','http://test.com');
        $expectation = (object)[];

        $this->assertEquals($expectation, $result);
    }

    public function testCallUnsuccess500()
    {
        $this->expectException(\App\Api\Exceptions\ApiError::class);

        $req = Mockery::mock(\Psr\Http\Message\RequestInterface::class);
        $res = Mockery::mock(\Psr\Http\Message\ResponseInterface::class)
            ->shouldReceive('getStatusCode')->andReturn(500)
            ->getMock();
        $e        = new \GuzzleHttp\Exception\ClientException('error', $req, $res);
        $client   = Mockery::mock(\GuzzleHttp\Client::class)
                        ->shouldReceive('request')->once()->andThrow($e)
                        ->getMock();

        $test = new \App\Api\Api($client);

        $test->call('GET','http://test.com');
    }

}
