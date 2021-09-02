<?php

class PetsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Pets::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\PetsController::class;

        $this->doBaseUsageTest($proxy, 'getPets', $controller, 'petIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getPet', $controller, 'petShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getPetMedia', $controller, 'petMediaShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getPetsAbilities', $controller, 'petAbilityIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getPetAbility', $controller, 'petAbilityShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getPetAbilityMedia', $controller, 'petAbilityMediaShow', $this->getStandardRequest(), [1]);
    }

}
