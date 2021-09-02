<?php

class RefreshBlizzardAccessToken extends TestCase
{

    public function testInvalidThreshold()
    {
        $test = Mockery::mock(\App\Console\Commands\RefreshBlizzardAccessToken::class)->makePartial();
        $test->shouldReceive('arguments')->once()->andReturn(['threshold' => 'invalid']);
        $test->shouldReceive('options')->once()->andReturn([]);
        $test->shouldReceive('error')->andReturnUsing(function () {
            echo 'error';
        });

        $this->expectOutputString('error');

        $test->handle();
    }

    public function testInvalidApi()
    {
        $test = Mockery::mock(\App\Console\Commands\RefreshBlizzardAccessToken::class)->makePartial();
        $test->shouldReceive('arguments')->once()->andReturn(['combo' => 'invalid:invalid', 'threshold' => 1]);
        $test->shouldReceive('options')->once()->andReturn([]);
        $test->shouldReceive('error')->andReturnUsing(function () {
            echo 'error';
        });

        $this->expectOutputString('error');

        $test->handle();
    }

    public function testInvalidRegion()
    {
        $test = Mockery::mock(\App\Console\Commands\RefreshBlizzardAccessToken::class)->makePartial();
        $test->shouldReceive('arguments')->once()->andReturn(['combo' => 'blizzard:invalid', 'threshold' => 1]);
        $test->shouldReceive('options')->once()->andReturn([]);
        $test->shouldReceive('error')->andReturnUsing(function () {
            echo 'error';
        });

        $this->expectOutputString('error');

        $test->handle();
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testRefresh()
    {
        Mockery::mock('overload:'.\App\Models\AccessToken::class)
               ->shouldReceive('getLast')->andReturnNull();
        Mockery::mock('overload:'.\App\AccessTokenRefresher::class)
               ->shouldReceive('refresh')->andReturnNull();

        $test = Mockery::mock(\App\Console\Commands\RefreshBlizzardAccessToken::class)->makePartial();
        $test->shouldReceive('arguments')->once()->andReturn(['combo' => 'blizzard:all', 'threshold' => 1]);
        $test->shouldReceive('options')->once()->andReturn([]);
        $test->shouldReceive('line')->andReturnUsing(function () {
            echo 'ok';
        });

        $this->expectOutputRegex('~ok(.*)~');

        $test->handle();
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testNoRefreshNeeded()
    {
        Mockery::mock('overload:'.\App\Models\AccessToken::class)
               ->shouldReceive('getLast')->andReturnSelf()->andSet('expires', strtotime('now + 10 hours'))
               ->shouldReceive('isExpired')->andReturnFalse();

        $test = Mockery::mock(\App\Console\Commands\RefreshBlizzardAccessToken::class)->makePartial();
        $test->shouldReceive('arguments')->once()->andReturn(['combo' => 'blizzard:all', 'threshold' => 1]);
        $test->shouldReceive('options')->once()->andReturn(['force' => false]);
        $test->shouldReceive('line')->andReturnUsing(function () {
            echo 'ok';
        });

        $this->expectOutputRegex('~ok(.*)~');

        $test->handle();
    }

}
