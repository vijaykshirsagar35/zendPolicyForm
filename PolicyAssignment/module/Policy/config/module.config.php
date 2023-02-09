<?php 
return array(
	'controllers' => array(
            'invokables' => array(
                'policy\Controller\policy' => 'policy\Controller\policyController'
            ),
        ),
    'router' => array(
        'routes' => array(
			'policy' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/policy',
					'defaults' => array(
						'__NAMESPACE__' => 'policy\Controller',
						'controller'    => 'User',
						'action'        => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'default' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '/[:controller[/:action[/:id]]]',
							'constraints' => array(
								'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
								'id'     	 => '[0-9]*',
							),
							'defaults' => array(
							),
						),
					),
					'paginator' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '/:controller/[page/:page]',
							'constraints' => array(
								'page' => '[0-9]*',
							),
							'defaults' => array(
								'__NAMESPACE__' => 'policy\Controller',
								'controller'    => 'policyPaginator',
								'action'        => 'index',
							),
						),
					),
					'paginator-doctrine' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '/[page/:page]',
							'constraints' => array(
								'page' => '[0-9]*',
							),
							'defaults' => array(
								'__NAMESPACE__' => 'CsnUser\Controller',
								'controller'    => 'policyDoctrinePaginator',
								'action'        => 'index',
							),
						),
					),
				),
			),			
		),
	),
    'view_manager' => array(
//        'template_map' => array(
//            'layout/Auth'           => __DIR__ . '/../view/layout/Auth.phtml',
//        ),
        'template_path_stack' => array(
            'csn_user' => __DIR__ . '/../view'
        ),
    ),	
);

?>