<?php

class PlayableRacesControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\PlayableRaces::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\PlayableRacesController::class;

        $this->doBaseUsageTest($proxy, 'getRaces', $controller, 'racesIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getRace', $controller, 'raceShow', $this->getStandardRequest(), [1]);
    }

}
