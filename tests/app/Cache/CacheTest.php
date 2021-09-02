<?php

class CacheTest extends TestCase
{

    public function testInit()
    {
        $this->assertInstanceOf(\App\Cache\Cache::class, \App\Cache\Cache::init());
    }

    public function testIsAvailableTrue()
    {
        $client = Mockery::mock(\Predis\Client::class)
                         ->shouldReceive('ping')->once()->andReturn('OK')
                         ->getMock();

        $test = new \App\Cache\Cache($client);

        $this->assertTrue($test->isAvailable());
    }

    public function testIsAvailableFalse()
    {
        $client = Mockery::mock(\Predis\Client::class)
                         ->shouldReceive('ping')->once()->andThrow(\Exception::class)
                         ->getMock();

        $test = new \App\Cache\Cache($client);

        $this->assertFalse($test->isAvailable());
    }

    public function testSet()
    {
        $client = Mockery::mock(\Predis\Client::class)
                         ->shouldReceive('set')->once()->with('key', 'value')
                         ->shouldReceive('expire')->once()->with('key', 1)
                         ->getMock();

        $test = new \App\Cache\Cache($client);

        $this->assertInstanceOf(\App\Cache\Cache::class, $test->set('key', 'value', 1));
    }

    public function testHas()
    {
        $client = Mockery::mock(\Predis\Client::class)
                         ->shouldReceive('keys')->once()->with('key')->andReturn(['a', 'b'])
                         ->getMock();

        $test = new \App\Cache\Cache($client);

        $this->assertTrue($test->has('key'));
    }

    public function testGetKeyExist()
    {
        $client = Mockery::mock(\Predis\Client::class)
                        ->shouldReceive('keys')->once()->with('key')->andReturn(['a', 'b'])
                        ->shouldReceive('get')->once()->with('key')->andReturn('OK')
                        ->getMock();

        $test   = new \App\Cache\Cache($client);
        $result = $test->get('key', 'something');
        
        $this->assertEquals('OK', $result);
    }

    public function testGetKeyDoesntExist()
    {
        $client = Mockery::mock(\Predis\Client::class)
                        ->shouldReceive('keys')->once()->with('key')->andReturn([])
                        ->getMock();

        $test = new \App\Cache\Cache($client);
        $result = $test->get('key', 'something');

        $this->assertEquals('something', $result);
    }

    public function testGetAll()
    {
        $client = Mockery::mock(\Predis\Client::class)
                        ->shouldReceive('keys')->once()->with('key')->andReturn(['a', 'b'])
                        ->shouldReceive('get')->twice()->andReturn('value')
                        ->getMock();

        $test = new \App\Cache\Cache($client);
        $result = $test->getAll('key');
        $expected = ['value', 'value'];

        $this->assertEquals($expected, $result);
    }

    public function testDelete()
    {
        $client = Mockery::mock(\Predis\Client::class)
                        ->shouldReceive('del')->once()->with('key')->andReturn('value')
                        ->getMock();

        $test = new \App\Cache\Cache($client);

        $this->assertInstanceOf(\App\Cache\Cache::class, $test->delete('key'));
    }

    public function testTtl()
    {
        $client = Mockery::mock(\Predis\Client::class)
                        ->shouldReceive('ttl')->once()->with('key')->andReturn(1)
                        ->getMock();

        $test = new \App\Cache\Cache($client);

        $this->assertEquals(1, $test->ttl('key'));
    }

}
