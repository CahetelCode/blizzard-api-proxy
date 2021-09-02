<?php

class PlayableSpecializationsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\PlayableSpecializations::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\PlayableSpecializationsController::class;

        $this->doBaseUsageTest($proxy, 'getSpecializations', $controller, 'specializationsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getSpecialization', $controller, 'specializationShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getSpecializationMedia', $controller, 'specializationMediaShow', $this->getStandardRequest(), [1]);
    }

}
