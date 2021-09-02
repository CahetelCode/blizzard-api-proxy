<?php

class UrlHashTest extends TestCase
{

    public function testRefresh()
    {
        $test = new \App\UrlHash('https://www.example.com/test?test2=value2&test1=value1');

        $this->assertEquals(md5('www.example.com/test/?test1=value1&test2=value2'), $test->getMd5());
    }

}
