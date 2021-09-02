<?php

class TitlesControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Titles::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\TitlesController::class;

        $this->doBaseUsageTest($proxy, 'getTitles', $controller, 'titlesIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getTitle', $controller, 'titleShow', $this->getStandardRequest(), [1]);
    }

}
