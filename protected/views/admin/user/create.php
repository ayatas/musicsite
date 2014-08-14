<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);
?>

<div class="row-fluid">
  <div class="span12">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-th-list"></i> </span>
        <h5>Create User</h5>
      </div>
      <div class="widget-content">
        <?php $this->renderPartial('_form', array('model'=>$model,'model1'=>$model1)); ?>
      </div>
    </div>
  </div>
</div>
