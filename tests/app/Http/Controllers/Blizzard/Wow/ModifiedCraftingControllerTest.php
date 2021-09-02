<?php

class ModifiedCraftingControllerTest extends WowControllerTestCase
{
    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\ModifiedCrafting::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\ModifiedCraftingController::class;

        $this->doBaseUsageTest($proxy, 'getModifiedCrafting', $controller, 'craftingIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getCategories', $controller, 'categoriesIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getCategory', $controller, 'categoryShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getReagents', $controller, 'reagentsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getReagent', $controller, 'reagentShow', $this->getStandardRequest(), [1]);
    }

}
