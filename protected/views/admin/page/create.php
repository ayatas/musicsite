<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('admin'),
	'Create',
);
?>

<div class="row-fluid">
  <div class="span8">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-th-list"></i> </span>
        <h5>Create Page</h5>
      </div>
      <div class="widget-content">
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
      </div>
    </div>
  </div>
</div>