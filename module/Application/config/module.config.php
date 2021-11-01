<?php
declare(strict_types = 1);
namespace Application;

use Application\Controller\Factory\ListingsControllerFactory;
use Application\Controller\ListingsController;
use Application\Service\Factory\ListingsSearchServiceFactory;
use Application\Service\ListingsSearchService;
use Application\View\Helper\Factory\FlagHelperFactory;
use Application\View\Helper\FlagHelper;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Application\Service\RecognitionService;
use Application\Service\Factory\RecognitionServiceFactory;
use Application\Controller\Factory\IndexControllerFactory;
use Application\Service\TransactionService;
use Application\Service\Factory\TransactionServiceFactory;
use Application\View\Helper\DashboardListingConditionHelper;
use Application\View\Helper\Factory\DashboardListingConditionHelperFactory;
return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    ]
                ]
            ],
            'application' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application[/:action[/:id]]',
                    'defaults' => [
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                        "id"=>'[a-zA-Z0-9_-]*'
                    ]
                ]
            ],
            'listings' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/listings',
                    'defaults' => [
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Listings',
                        'action' => 'search'

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
                            'route' => '[/:action[/:id]]',
                            'constraints' => array(
                                'id' => '[a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',

                            ),
//                            'defaults' => array()
                        )
                    ),
                    "paginator" => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action[/page[/:page]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                "page" => "[0-9]+"
                            )

                        )
                    )
                )
            ]
        ]
    ],
    'session_containers' => [
//         'CountryRoute'
    ],
    'controllers' => [
        'factories' => [
            "Application\Controller\Index" => IndexControllerFactory::class,
            "Application\Controller\Listings"=>ListingsControllerFactory::class
        ]
    ],
    'service_manager' => array(
        'factories' => array(
            RecognitionService::class => RecognitionServiceFactory::class,
            ListingsSearchService::class=>ListingsSearchServiceFactory::class,
            TransactionService::class=>TransactionServiceFactory::class
        )
    ),
    "view_helpers"=>[
        "factories"=>[
            FlagHelper::class=>FlagHelperFactory::class,
            "Application\View\Helper\DashboardListingConditionHelper"=>DashboardListingConditionHelperFactory::class,
        ],
        'aliases' => [
            'defaultFlagRoute' => FlagHelper::class,
            "dlc"=>"Application\View\Helper\DashboardListingConditionHelper"
        ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            "application/partial/layout_header"=>__DIR__ . '/../view/layout/partials/layout_header_partial.phtml',
            "application/partial/layout_dynamic_header"=>__DIR__ . '/../view/layout/partials/layout_dynamic_header.phtml',
            "application/partial/layout_header_banner"=>__DIR__ . '/../view/layout/partials/layout_header_banner_partial.phtml',
            "application/partial/layout_footer"=>__DIR__ . '/../view/layout/partials/layout_footer_partial.phtml',
            "application/partial/layout_menu"=>__DIR__ . '/../view/layout/partials/layout_header_menu.phtml',
            "application/partial/layout_search_form_header"=>__DIR__ . '/../view/layout/partials/layout_serach_header.phtml',
            "application/partial/layout_searchbar"=>__DIR__ . '/../view/layout/partials/layout_header_searchbar.phtml',
            "application/partial/layout_searchbarfilter"=>__DIR__ . '/../view/layout/partials/layout_search_filter.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view'
        ]
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
