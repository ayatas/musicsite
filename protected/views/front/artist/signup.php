<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-signup-form',
	'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
)); ?>
	 <?php echo $form->errorSummary(array($model,$model1)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model1,'bandName'); ?>
		<?php echo $form->textField($model1,'bandName'); ?>
		<?php echo $form->error($model1,'bandName'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model1,'genreId'); ?>
		<?php echo $form->dropDownList($model1,'genreId', CHtml::listData(Genre::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model1,'genreId'); ?>
        <p class="info">Your genre selection determines where your music appears in Bandcamp Discover. It's OK if you don't fit perfectly within one of these - just use the genre tag field, below, to provide more granularity. </p>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model1,'genreTags'); ?>
		<?php echo $form->textField($model1,'genreTags'); ?>
		<?php echo $form->error($model1,'genreTags'); ?>
        <p>Optional. Use a comma to separate multiple tags.</p>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location'); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model1,'url'); ?>
		<?php echo $form->textField($model1,'url'); ?>.musichutt.com
		<?php echo $form->error($model1,'url'); ?>
        <p class="info">If you prefer to set this up as a custom domain (e.g., "music.dfsfdsf.com"), you can do that later, as part of Bandcamp Pro.</p>
	</div>
	
<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->