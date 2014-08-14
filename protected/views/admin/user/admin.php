<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Manage',
);
?>

<div class="row-fluid">
  <div class="span12">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-th-list"></i> </span>
        <h5>Manage Users</h5>
      </div>
      <div class="widget-content">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'itemsCssClass' => 'table table-bordered table-striped table-hover data-table',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'name',
		'email',
		 array(
        'header' => 'Status',
		'name' => 'status',
        'value' => '(($data->status == 1) ? "Active" : "In Active")',
      ),
	  array(
	  	'header'=>'Actions',
	    'class'=>'CButtonColumn',
    	'template'=>'{update}{delete}',
	  ),
	
	),
)); ?>
      </div>
    </div>
  </div>
</div>
