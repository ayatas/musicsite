<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	'htmlOptions'=>array('class'=>'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	
)); ?>


	<?php echo $form->errorSummary($model); ?>
	<div class="control-group">
		<?php echo $form->labelEx($model,'title',array('class'=>'control-label')); ?>
          <div class="controls">
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title'); ?>
        </div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'description',array('class'=>'control-label')); ?>
          <div class="controls">
		<?php echo $form->textArea($model,'description',array('control-groups'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
        </div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'seoTitle',array('class'=>'control-label')); ?>
          <div class="controls">
			<?php echo $form->textField($model,'seoTitle',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'seoTitle'); ?>
        </div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'seoKewords',array('class'=>'control-label')); ?>
          <div class="controls">
			<?php echo $form->textField($model,'seoKewords',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'seoKewords'); ?>
        </div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'seoDescription',array('class'=>'control-label')); ?>
          <div class="controls">
		<?php echo $form->textArea($model,'seoDescription',array('control-groups'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'seoDescription'); ?>
        </div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'status',array('class'=>'control-label')); ?>
          <div class="controls">
    	    <?php echo $form->dropDownList($model,'status',array('1'=>'Active','0'=>'Inactive'),array('style'=>'width:80%'))?>
			<?php echo $form->error($model,'status'); ?>
         </div>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->