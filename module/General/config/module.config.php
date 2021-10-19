<?php
namespace  General;
use General\Service\GeneralService;
use Service\Factory\GeneralServiceFactory;

return [
    
   'service_manager' => [
       'factories' => [
           GeneralService::class=>GeneralServiceFactory::class,
       ],
   ],
  
    
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    )
];