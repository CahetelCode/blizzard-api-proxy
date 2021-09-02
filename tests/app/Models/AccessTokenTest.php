<?php

class AccessTokenTest extends TestCase
{

    public function testCount()
    {
        $db = \Mockery::mock(\Illuminate\Database\Query\Builder::class)
                      ->shouldReceive('select')->once()->with('*')->andReturnSelf()
                      ->shouldReceive('where')->once()->andReturnSelf()
                      ->shouldReceive('count')->once()->andReturn(1)
                      ->getMock();

        $test = Mockery::mock(\App\Models\AccessToken::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $test->shouldReceive('getDb')->once()->andReturn($db);

        /**
         * @var \App\Models\AccessToken $test
         */
        $this->assertEquals(1, $test->count('blizzard', 'eu'));
    }

    public function testGetLast()
    {
        $token = (object) [
            'expires' => strtotime('now'),
        ];
        $db    = \Mockery::mock(\Illuminate\Database\Query\Builder::class)
                         ->shouldReceive('select')->twice()->with('*')->andReturnSelf()
                         ->shouldReceive('where')->twice()->andReturnSelf()
                         ->shouldReceive('skip')->once()->andReturnSelf()
                         ->shouldReceive('count')->once()->andReturn(1)
                         ->shouldReceive('first')->once()->andReturn([$token])
                         ->getMock();

        $test = Mockery::mock(\App\Models\AccessToken::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $test->shouldReceive('getDb')->twice()->andReturn($db);

        /**
         * @var \App\Models\AccessToken $test
         */
        $this->assertInstanceOf(\App\Models\AccessToken::class, $test->getLast('blizzard', 'eu'));
    }

    public function testIsExpired() {
        $test = new \App\Models\AccessToken();
        $test->expires = strtotime('now');

        $this->assertTrue($test->isExpired());

        $test = new \App\Models\AccessToken();
        $test->expires = strtotime('now + 2 hours');

        $this->assertFalse($test->isExpired());
    }

}
