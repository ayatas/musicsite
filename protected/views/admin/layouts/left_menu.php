<?php
$this->widget('zii.widgets.CMenu', array(
	'activeCssClass' => 'active open',
	'activateParents' => true,
	'encodeLabel' => false,
	'items' => array(
		array(
			'label' => '<i class="icon icon-home"></i><span>Dashboard</span>',
			'url' => array('/site/index')
		),
		array(
		'label'=>'<i class="icon icon-user"></i><span>Artist Users</span>',
		'url' => array('#'),
		'itemOptions' => array('class' => 'submenu'),
		'items' => array(
			array(
				'label' => '<i class="icon icon-pencil"></i>Manage User',
				'url' => array('user/admin')
			),
			array(
				'label' => '<i class="icon icon-plus"></i>Add User',
				'url' => array('user/create')
			),
			array(
					'label' => 'Update',
					'url' => array('user/update'),
					'itemOptions' => array('class' => 'hide')
				),
		),
		),
		array(
			'label' => '<i class="icon icon-file"></i><span>Pages</span>',
			'url' => array('#'),
			'itemOptions' => array('class' => 'submenu'),
			'items' => array(
				array(
					'label' => '<i class="icon icon-pencil"></i>Manage Pages',
					'url' => array('page/admin')
				),
				array(
					'label' => '<i class="icon icon-plus"></i>Create Page',
					'url' => array('page/create')
				),
				array(
					'label' => '',
					'url' => array('page/update'),
					'itemOptions' => array('class' => 'hide')
				),
				array(
					'label' => '',
					'url' => array('#'),
					'itemOptions' => array('class' => 'hide')
				),
			),
		),
	),
));
