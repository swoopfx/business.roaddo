<?php
declare(strict_types = 1);
namespace Application;

use Application\View\Helper\Factory\FlagHelperFactory;
use Application\View\Helper\FlagHelper;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Application\Service\RecognitionService;
use Application\Service\Factory\RecognitionServiceFactory;
use Application\Controller\Factory\IndexControllerFactory;
return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index'
                    ]
                ]
            ],
            'application' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ],
    'session_containers' => [
        'CountryRoute'
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => IndexControllerFactory::class
        ]
    ],
    'service_manager' => array(
        'factories' => array(
            RecognitionService::class => RecognitionServiceFactory::class
        )
    ),
    "view_helpers"=>[
        "factories"=>[
            FlagHelper::class=>FlagHelperFactory::class
        ],
        'aliases' => [
            'defaultFlagRoute' => FlagHelper::class
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
