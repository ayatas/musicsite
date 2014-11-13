<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'design-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div id="picker" style="float:left;"></div>
	<div style="float:left;">
	<div class="row">
		<?php 
		echo $form->labelEx($design,'bodyColor'); ?>
		<?php echo $form->textField($design,'bodyColor',array('class'=>'colorwell')); ?>
		<?php echo $form->error($design,'bodyColor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($design,'textColor'); ?>
		<?php echo $form->textField($design,'textColor',array('class'=>'colorwell')); ?>
		<?php echo $form->error($design,'textColor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($design,'secondaryTextColor'); ?>
		<?php echo $form->textField($design,'secondaryTextColor',array('class'=>'colorwell')); ?>
		<?php echo $form->error($design,'secondaryTextColor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($design,'linkColor'); ?>
		<?php echo $form->textField($design,'linkColor',array('class'=>'colorwell')); ?>
		<?php echo $form->error($design,'linkColor'); ?>
	 </div>
     
     <div class="row">
		<?php echo $form->labelEx($design,'backgroundColor'); ?>
		<?php echo $form->textField($design,'backgroundColor',array('class'=>'colorwell')); ?>
		<?php echo $form->error($design,'backgroundColor'); ?>
	 </div> 
    
     <div class="row">
     <?php echo $form->labelEx($design,'backgroundImage'); ?>
     <div id="siteBackgrondImage" class="<?php if($design->backgroundImage) { ?> hide <?php } ?>">
	<?php
	$backGroundUrl = Yii::app()->request->baseUrl.'/images/background/'; 	
    $this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
    'id'=>'uploadBackgroundImage',
    'config'=>array(
    'action'=>Yii::app()->createUrl('artist/uploadBackgroundImage'),
     'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">upload</div><ul class="qq-upload-list"></ul></div>',
    'allowedExtensions'=>array("jpg","jpeg","gif","png"),
    'sizeLimit'=>2*1024*1024,
    'auto'=>true,
    'multiple' => false,
    //'onSubmit'=>'js:function(){ $("#userLoader").addClass("userloading");}',
    'onComplete'=>'js:function(id, fileName, responseJSON){
		var img = "'.$backGroundUrl.'"+responseJSON["filename"];
		$("body").css("background-image", "url("+img+")");			
		var file = responseJSON["filename"];
         $("#Design_backgroundImage").val(file);						           
            $("#siteBackgrondImage").hide();
			$("#siteBackgrondImageDelete").show();
		
    }',
    'messages'=>array(
        'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
        'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
        'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
        'emptyError'=>"{file} is empty, please select files again without it.",
        'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
    ),
    )                
    ));
    ?>
    </div>
    <div id="siteBackgrondImageDelete" class="<?php if(!$design->backgroundImage) { ?> hide <?php } ?>">
    <a href="javascript:void(0)" id="removeBg">Delete</a>   
    </div>
    <?php echo $form->hiddenField($design,'backgroundImage'); ?>
    <?php echo $form->error($design,'backgroundImage'); ?>
     </div> 
          
	<div class="row buttons" style="float:right;">
		<?php echo CHtml::submitButton('Save', array('class'=>'button')); ?>
        <?php echo CHtml::button('Cancel', array('id'=>'designClose','class'=>'button')); ?>
	</div>
    </div>	

<?php $this->endWidget(); ?>
</div><!-- form -->

