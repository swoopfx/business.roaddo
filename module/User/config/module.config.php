<?php
declare(strict_types = 1);
namespace User;

use User\Form\Fieldset\Factory\TestFactory;
use User\Form\Fieldset\Factory\UserBasicFieldsetFactory;
use User\Form\LoginForm;
use Laminas\Router\Http\Literal;
// use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use User\Form\Fieldset\LoginFieldset;
use User\Form\RegisterForm;
//use Service\Factory\GeneralFactory;
use User\Form\Fieldset\UserBasicFieldset;
use User\Controller\IndexController;
use User\Controller\Factory\IndexControllerFactory;
use User\Controller\RegisterController;
use User\Controller\Factory\RegisterControllerFactory;
return [
    'controllers' => [
        'factories' => [
            IndexController::class => IndexControllerFactory::class,
            RegisterController::class => RegisterControllerFactory::class,

        ]
    ],
    'router' => [
        'routes' => [
            'login' => [
                'type' => 'Literal',
                'options' => [
                    // Change this to something specific to your module
                    'route' => '/login',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [ // You can place additional routes that match under the
                                        // route defined above here.
                ]
            ],

            'user-register' => [
                'type' => 'Literal',
                'options' => [
                    // Change this to something specific to your module
                    'route' => '/register',
                    'defaults' => [
                        'controller' => RegisterController::class,
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [ // You can place additional routes that match under the
                    // route defined above here.
                ]
            ],
            
//             'user' => [
//                 'type' => 'Literal',
//                 'options' => [
//                     // Change this to something specific to your module
//                     'route' => '/login',
//                     'defaults' => [
//                         'controller' => User\Controller\IndexController::class,
//                         'action' => 'index'
//                     ]
//                 ],
//                 'may_terminate' => true,
//                 'child_routes' => [ // You can place additional routes that match under the
//                     // route defined above here.
//                 ]
//             ],
        ]
    ],
    'view_manager' => [
        'template_map' => [ // "welcome/welcome/layout"=>__DIR__ . '/../view/layout/index.phtml'
],
        'template_path_stack' => [
            __DIR__ . '/../view'
        ]
    ],
    'service_manager' => [
        'factories' => [ // 'Laminas\Authentication\AuthenticationService' =>
]
    ],
    
    "form_elements" => [
        'factories' => [
            LoginFieldset::class => InvokableFactory::class,
            LoginForm::class=>InvokableFactory::class,
            RegisterForm::class => InvokableFactory::class,
            UserBasicFieldset::class=>UserBasicFieldsetFactory::class,

        ]
    ],
    'doctrine' => [
        'configuration' => [
            'orm_default' => [
                'generate_proxies' => true
            ]
        ],
        'authentication' => [
            'orm_default' => [
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'User\Entity\User',
                'identity_property' => 'username',
                'credential_property' => 'password',
                'credential_callable' => 'User\Service\UserService::verifyHashedPassword'
            ]
        ],
        
        'driver' => array(
            'user_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    'User\Entity' => 'user_driver'
                )
            )
        )
    ]
];
