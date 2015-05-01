<?php
namespace Pc_help;

return array('router' => array(
		'routes' => array(
				'home' => array(
						'type' => 'Literal',
						'options' => array(
								'route'    => '/',
								'defaults' => array(
										'controller' => 'Pc_help\Controller\Index',
										'action'     => 'index',
								),
						),
				),

				'pc_helpAdmin-interna' => array(
						'type'=>'Segment',
						'options'=>array(
								'route'=> '/admin/[:controller[/:action][/:id]]',
								'constraints'=>array(
										'id'=> '[0-9]+'
								)
						),
				),


				'pc_helpAdmin' => array(
						'type'=>'Segment',
						'options'=>array(
								'route'=> '/admin/[:controller[/:action][/page/:page]]',
								'defaults'=>array(
										'action'=>'index',
										'page'=>1
								),
						),
				),
		),
),


		'controllers' => array(
				'invokables' => array(
						'Pc_help\Controller\Index' => 'Pc_help\Controller\IndexController',
						'clientes'=>'Pc_helpAdmin\Controller\ClientesController'
				),
		),

		'view_manager' => array(
				'display_not_found_reason' => true,
				'display_exceptions'       => true,
				'doctype'                  => 'HTML5',
				'not_found_template'       => 'error/404',
				'exception_template'       => 'error/index',
				'template_map' => array(
						'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
						'pc_help/index/index' => __DIR__ . '/../view/pc_help/index/index.phtml',
						'error/404'               => __DIR__ . '/../view/error/404.phtml',
						'error/index'             => __DIR__ . '/../view/error/index.phtml',
				),

				'template_path_stack' => array(
						__DIR__ . '/../view',
				),
		),

		// Placeholder for console routes
		'console' => array(
				'router' => array(
						'routes' => array(
						),
				),
		),

		'doctrine' => array(
				'driver' => array(
						__NAMESPACE__ . '_driver' => array(
								'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
								'cache' => 'array',
								'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
						),
						'orm_default' => array(
								'drivers' => array(
										__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'

								),
						),
				),
		),
);
