<?php

class NamespaceHeaderValidatorTest extends TestCase
{

    public function testValidator()
    {
        $test = new \App\Api\Blizzard\NamespaceHeaderValidator('static-eu');

        $this->assertFalse($test->isEmpty());
        $this->assertTrue($test->isValid());
        $this->assertFalse($test->isDynamic());
        $this->assertTrue($test->isStatic());
        $this->assertTrue($test->hasValidLocale());
        $this->assertEquals('static', $test->getMode());
        $this->assertEquals('eu', $test->getLocale());
    }

    public function testValidatorFail()
    {
        $test = new \App\Api\Blizzard\NamespaceHeaderValidator('invalid+invalid');

        $this->assertFalse($test->isEmpty());
        $this->assertFalse($test->isValid());
        $this->assertFalse($test->isDynamic());
        $this->assertFalse($test->isStatic());
        $this->assertFalse($test->hasValidLocale());
    }

}
