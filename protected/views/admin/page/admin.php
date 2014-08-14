<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('admin'),
	'Manage',
);
?>

<div class="row-fluid">
  <div class="span12">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-th-list"></i> </span>
        <h5>Manage Pages</h5>
      </div>
      <div class="widget-content">
     
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'ajaxUpdate'=>'false',
	'itemsCssClass' => 'table table-bordered table-striped table-hover data-table',
	'columns'=>array(
		'id',
		'title',
		'slug',
		'seoTitle',
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

