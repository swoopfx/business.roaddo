<?php

namespace Board;


use Board\Controller\Factory\BoardControllerFactory;
use Laminas\Router\Http\Literal;

return [
    "controllers" => [
        "factories" => [
            "Board\Controller\Board" => BoardControllerFactory::class
        ],
    ],

    "router" => [
        "routes" => [
            'board' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/dashboard',
                    'defaults' => [
                        '__NAMESPACE__' => 'Board\Controller',
                        'controller' => 'Board',
                        'action' => 'board'
                    ]
                ],

                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'id' => '[a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',

                            ),
                            'defaults' => array()
                        )
                    ),
                    "paginator" => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/page[/:page]]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                "page" => "[0-9]+"
                            )

                        )
                    )
                )
            ],
        ]
    ],



    'service_manager' => [

        'factories' => [

        ],
    ],


//


    'view_manager' => [

        'template_map' => [
             'layout/board_layout' => __DIR__ . '/../view/layout/board_layout.phtml',
            "board_layout_header"=>__DIR__ . '/../view/layout/partial/board_layout_header.phtml',

            //create Company 
            "board_create_company_form"=>__DIR__ . '/../view/partials/board_create_company_form.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view'
        ]
    ],


//    'doctrine' => array(
//        'driver' => array(
//            __NAMESPACE__ . '_driver' => array(
//                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
//                'cache' => 'array',
//                'paths' => array(
//                    __DIR__ . '/../src/Entity'
//                )
//            ),
//            'orm_default' => array(
//                'drivers' => array(
//                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
//                )
//            )
//        )
//    )
];
