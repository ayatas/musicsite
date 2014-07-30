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

			'label' => '<i class="icon icon-file"></i><span>Pages</span><span class="label">2</span>',
			'url' => array('#'),
			'itemOptions' => array('class' => 'submenu'),
			'items' => array(
				array(
					'label' => 'All Pages',
					'url' => array('#')
				),
				array(
					'label' => 'Create Page',
					'url' => array('#')
				),
				array(
					'label' => '',
					'url' => array('#'),
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
