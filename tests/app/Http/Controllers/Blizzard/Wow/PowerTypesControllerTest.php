<?php

class PowerTypesControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\PowerTypes::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\PowerTypesController::class;

        $this->doBaseUsageTest($proxy, 'getPowerTypes', $controller, 'powerTypeIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getPowerType', $controller, 'powerTypeShow', $this->getStandardRequest(), [1]);
    }

}
