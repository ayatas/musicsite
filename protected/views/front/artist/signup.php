<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'artist-signup-form',
	'enableClientValidation' => true,
	'clientOptions' => array('validateOnSubmit' => true, ),
));
?>

<p class="note">
	Fields with <span class="required">*</span> are required.
</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
	<?php echo $form->labelEx($model, 'userName'); ?>
	<?php echo $form->textField($model, 'userName', array(
			'size' => 50,
			'maxlength' => 50
		));
	?>
	<?php echo $form->error($model, 'userName'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model, 'password'); ?>
	<?php echo $form->passWordField($model, 'password', array(
			'size' => 50,
			'maxlength' => 50
		));
	?>
	<?php echo $form->error($model, 'password'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model, 'email'); ?>
	<?php echo $form->textField($model, 'email', array(
			'size' => 50,
			'maxlength' => 50
		));
	?>
	<?php echo $form->error($model, 'email'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model, 'bandName'); ?>
	<?php echo $form->textField($model, 'bandName', array(
			'size' => 50,
			'maxlength' => 50
		));
	?>
	<?php echo $form->error($model, 'bandName'); ?>
</div>
<div class="row">
	<?php echo $form->checkBox($model, 'TermsCondition');?>
	<?php echo CHtml::link('Terms of Use', array('site/index')) ?>
	<?php echo $form->labelEx($model, 'TermsCondition'); ?>	
	<?php echo $form->error($model, 'TermsCondition'); ?>
</div>
<div class="row buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>