<?php

class ProfessionsControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Professions::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\ProfessionsController::class;

        $this->doBaseUsageTest($proxy, 'getProfessions', $controller, 'professionsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getProfession', $controller, 'professionShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getProfessionMedia', $controller, 'professionMediaShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getProfessionSkillTier', $controller, 'professionSkillTierShow', $this->getStandardRequest(), [1, 2]);
        $this->doBaseUsageTest($proxy, 'getRecipe', $controller, 'recipeShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getRecipeMedia', $controller, 'recipeMediaShow', $this->getStandardRequest(), [1]);
    }

}
