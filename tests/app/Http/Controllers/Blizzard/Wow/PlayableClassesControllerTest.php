<?php

class PlayableClassesControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\PlayableClasses::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\PlayableClassesController::class;

        $this->doBaseUsageTest($proxy, 'getClasses', $controller, 'classesIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getClass', $controller, 'classShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getClassMedia', $controller, 'classMediaShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getClassPvpTalentSlots', $controller, 'classPvpTalentsSlots', $this->getStandardRequest(), [1]);
    }

}
