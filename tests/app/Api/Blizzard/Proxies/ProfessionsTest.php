<?php

class ProfessionsTest extends ProxiesTestCase
{

    public function testProxy()
    {
        $proxy = \App\Api\Blizzard\Proxies\Professions::class;

        $this->runProxyTest($proxy, 'getProfessions', [['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getProfession', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getProfessionMedia', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getProfessionSkillTier', [1, 2, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getRecipe', [1, ['locale' => 'it_IT']]);
        $this->runProxyTest($proxy, 'getRecipeMedia', [1, ['locale' => 'it_IT']]);
    }

}
