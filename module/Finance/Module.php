<?php

namespace Finance;

use Krystal\Application\Module\AbstractModule;

final class Module extends AbstractModule
{
    /**
     * Returns routes of this module
     * 
     * @return array
     */
    public function getRoutes() : array
    {
        return include(__DIR__) . '/Config/routes.php';
    }

    /**
     * Returns prepared service instances of this module
     * 
     * @return array
     */
    public function getServiceProviders() : array
    {
        return array(
        );
    }
}
