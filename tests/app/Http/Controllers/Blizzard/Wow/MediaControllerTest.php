<?php

class MediaControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Media::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\MediaController::class;

        $this->doBaseUsageTest($proxy, 'search', $controller, 'search', $this->getStandardRequest());
    }

}
