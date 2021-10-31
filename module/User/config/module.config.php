<?php
declare(strict_types=1);

namespace User;


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
use User\Service\Factory\RegisterServiceFactory;
use User\Service\RegisterService;
use User\Entity\User;
use User\Service\Factory\AuthenticationServiceFactory;

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
            
            'logout' => [
                'type' => 'Literal',
                'options' => [
                    // Change this to something specific to your module
                    'route' => '/logout',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action' => 'logout'
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
//                'may_terminate' => true,
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/:id]]',
                            'constraints' => array(
                                'id' => '[a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',

                            ),
                            'defaults' => array()
                        )
                    ),

                )
            ],

//            'board' => [
//                'type' => Literal::class,
//                'options' => [
//                    'route' => '/board',
//                    'defaults' => [
//                        'controller' => Re::class,
//                        'action' => 'board'
//                    ]
//                ],
//
//                'may_terminate' => true,
//                'child_routes' => array(
//                    // This route is a sane default when developing a module;
//                    // as you solidify the routes for your module, however,
//                    // you may want to remove it and replace it with more
//                    // specific routes.
//                    'default' => array(
//                        'type' => 'Segment',
//                        'options' => array(
//                            'route' => '[/:action[/:id]]]',
//                            'constraints' => array(
//                                'id' => '[a-zA-Z0-9_-]*',
//                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//
//                            ),
//                            'defaults' => array()
//                        )
//                    ),
//
//                )
//            ]

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
        ],
        'strategies' => array(
            'ViewJsonStrategy'
        ),
    ],
    'service_manager' => [
        'factories' => [
            'Laminas\Authentication\AuthenticationService' => AuthenticationServiceFactory::class,
            RegisterService::class=>RegisterServiceFactory::class
        ]
    ],

    "form_elements" => [
        'factories' => [
            LoginFieldset::class => InvokableFactory::class,
            LoginForm::class => InvokableFactory::class,
            RegisterForm::class => InvokableFactory::class,
            UserBasicFieldset::class => UserBasicFieldsetFactory::class,

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
                'identity_class' => User::class,
                'identity_property' => 'email',
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
