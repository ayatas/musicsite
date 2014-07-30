<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>
<?php $form = $this->beginWidget('CActiveForm', array(
        'id'                    =>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'                  =>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
<p>
    Enter username and password to continue.
</p>
<div class="control-group">
    <div class="controls">
        <div class="input-prepend">
            <span class="add-on">
                <i class="icon-user">
                </i>
            </span>
            <?php echo $form->textField($model,'username',array('placeholder'=>'Username')); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <div class="input-prepend">
            <span class="add-on">
                <i class="icon-lock">
                </i>
            </span><?php echo $form->passwordField($model,'password',array('placeholder'=>'Password')); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
    </div>
</div>
<div class="control-group">
    <div class="controls remember">
        <div class="input-prepend">
        <?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>		
        </div>
    </div>
</div>
<div class="form-actions">
    <span class="pull-right">
        <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-inverse')); ?>
    </span>
</div>
<?php $this->endWidget(); ?>