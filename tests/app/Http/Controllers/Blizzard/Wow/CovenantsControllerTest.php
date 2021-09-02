<?php

class CovenantsControllerTest extends WowControllerTestCase
{

    public function testController()
    {
        $proxy      = \App\Api\Blizzard\Proxies\Covenants::class;
        $controller = \App\Http\Controllers\Blizzard\Wow\CovenantsController::class;

        $this->doBaseUsageTest($proxy, 'getCovenants', $controller, 'covenantIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getCovenant', $controller, 'covenantShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getCovenantMedia', $controller, 'covenantMediaShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getSoulbinds', $controller, 'covenantSoulbindsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getSoulbind', $controller, 'covenantSoulbindShow', $this->getStandardRequest(), [1]);
        $this->doBaseUsageTest($proxy, 'getConduits', $controller, 'covenantConduitsIndex', $this->getStandardRequest());
        $this->doBaseUsageTest($proxy, 'getConduit', $controller, 'covenantConduitShow', $this->getStandardRequest(), [1]);
    }

}
