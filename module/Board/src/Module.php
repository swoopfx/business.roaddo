<?php
namespace  Board;

use Laminas\Mvc\ModuleRouteListener;
use Laminas\Mvc\MvcEvent;

class Module
{


    public function getConfig(){

        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }

    public function onBootstrap(MvcEvent $e){
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $app = $e->getApplication();
        $sm = $app->getServiceManager();
        $sharedEvent = $eventManager->getSharedManager();
        $sharedEvent->attach(__NAMESPACE__, "dispatch", function ($e) use ($sm) {
            $controller = $e->getTarget();
            $controller->layout('layout/board_layout');
        });
    }
}