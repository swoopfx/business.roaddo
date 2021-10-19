<?php
declare(strict_types = 1);
namespace Application;

use Laminas\Mvc\MvcEvent;
use Laminas\Mvc\ModuleRouteListener;

class Module
{

    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $app = $e->getApplication();
        $sm = $app->getServiceManager();
        $sharedEvent = $eventManager->getSharedManager();
        $sharedEvent->attach(__NAMESPACE__, "dispatch", function ($e) use ($sm) {
            
        });
    }
}
