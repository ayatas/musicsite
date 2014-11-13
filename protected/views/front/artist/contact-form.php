<dl class="tableLayout">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<dt><?php echo $form->labelEx($contactModel,'name'); ?></dt>
    <dd>
		<?php echo $form->textField($contactModel,'name'); ?>
		<?php echo $form->error($contactModel,'name'); ?>
	</dd>
    <dt><?php echo $form->labelEx($contactModel,'email'); ?></dt>
		<dd><?php echo $form->textField($contactModel,'email'); ?>
		<?php echo $form->error($contactModel,'email'); ?></dd>
	
    <dt><?php echo $form->labelEx($contactModel,'subject'); ?></dt>
	<dd>	<?php echo $form->textField($contactModel,'subject'); ?>
		<?php echo $form->error($contactModel,'subject'); ?></dd>
	
    <dt><?php echo $form->labelEx($contactModel,'body'); ?></dt>
	<dd>	<?php echo $form->textArea($contactModel,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($contactModel,'body'); ?></dd>
	

	<?php if(CCaptcha::checkRequirements()): ?>
	<dt>
		<?php echo $form->labelEx($contactModel,'verifyCode'); ?>
		</dt>
		<dd><?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($contactModel,'verifyCode'); ?>		
		<?php echo $form->error($contactModel,'verifyCode'); ?>
        </dd>
	<?php endif; ?>
    <dt></dt>
<dd style="padding-top:1ex">
    <?php echo CHtml::submitButton('Submit', array('class'=>'button')); ?>
   <?php echo CHtml::button('Cancel',array('id'=>'contactCancel', 'class'=>'button')); ?>
  </dd>
<?php $this->endWidget(); ?>
</dl>
