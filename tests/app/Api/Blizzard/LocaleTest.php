<?php

class LocaleTest extends TestCase
{

    public function testGetRegion()
    {
        $test = new \App\Api\Blizzard\Locale('eu');

        $this->assertEquals('EU', $test->getRegion());
    }

    public function testGetBaseApiUrl()
    {
        $test = new \App\Api\Blizzard\Locale('eu');

        $this->assertEquals('https://eu.api.blizzard.com/', $test->getApiBaseUrl());
    }

    public function testGetAllAvailableApiUrls()
    {
        $this->assertCount(4, \App\Api\Blizzard\Locale::getAllAvailableApiUrls());
    }

    public function testGetValidRegions()
    {
        $this->assertCount(4, \App\Api\Blizzard\Locale::getValidRegions());
    }

    public function testGetAllAvailableLocales()
    {
        $this->assertCount(12, \App\Api\Blizzard\Locale::getAllAvailableLocales(true));
    }

    public function testGetAuthBaseApiUrl()
    {
        $test = new \App\Api\Blizzard\Locale('eu');

        $this->assertEquals('https://eu.battle.net/', $test->getAuthApiBaseUrl());
    }

    public function testGetAllAvailableAuthUrls()
    {
        $this->assertCount(4, \App\Api\Blizzard\Locale::getAllAvailableAuthUrls(true));
    }

    public function testisValidLocale()
    {
        $test = new \App\Api\Blizzard\Locale('eu');

        $this->assertTrue($test->isValidLocale('it_IT'));
        $this->assertFalse($test->isValidLocale('en_US'));
    }

    public function testGetLocales()
    {
        $test = new \App\Api\Blizzard\Locale('eu');

        $this->assertCount(7, $test->getLocales());
    }

}
