<?php if((!Yii::app()->user->isGuest) && (Yii::app()->user->getId() == $model->user->id)){ ?>
<div class="bannercontainer <?php if(!$model->customHeader) { ?> hide <?php } ?>">
  <?php if($model->customHeader){ ?>
     <img src="<?php echo Yii::app()->request->baseUrl; ?>/timthumb.php?src=<?php echo Yii::app()->request->baseUrl; ?>/images/albumHeader/<?php echo $model->customHeader; ?>&w=945&h=180&zc=1" alt="" />
	<?php 	
    echo CHtml::ajaxLink(
    "X",
    Yii::app()->createUrl('artist/removeAlbumHeader'),
    array(
    'type' => 'POST',
    'beforeSend' => "function(request){ if(confirm('Are you sure you want to delete your custom header?')) { return true; } else{ return false; }}",
    'success' => "function(data){  
		$('#customHeaderWrapper .bannercontainer').html('');     	
		$('#customHeaderWrapper .bannercontainer').hide();						
		$('#customHeaderWrapper #customHeaderBlank').show();
    }",
    'data' => array('val1' => '1')
    ),
    array(
		'class' => 'removeAlbum'
    )
    );
    ?>
    <?php } ?>

 </div>
 <div class="bandmember-only custom-header-upload <?php if($model->customHeader) { ?> hide <?php } ?>" id="customHeaderBlank">
  <span class="upload-button-and-hint" id="chUploadButtonAndHint">
   
    <div class="html5-upload-wrapper" style="position: relative; display: inline-block; cursor: pointer; margin: 20px 0px 0px;">
	<?php
    $getHeaderImage = CController::createUrl('artist/getHeaderImage');    
    $this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
    'id'=>'uploadCustomHeader',
    'config'=>array(
    'action'=>Yii::app()->createUrl('artist/uploadHeaderImage'),
     'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">Upload Custom Header</div><ul class="qq-upload-list"></ul></div>',
    'allowedExtensions'=>array("jpg","jpeg","gif","png"),
    'sizeLimit'=>2*1024*1024,
    'auto'=>true,
    'multiple' => false,
    //'onSubmit'=>'js:function(){ $("#userLoader").addClass("userloading");}',
    'onComplete'=>'js:function(id, fileName, responseJSON){	
        var file = responseJSON["filename"];
        $.ajax({
        url: "'. $getHeaderImage . '",
        type:"POST",
        data: { "imageName": file },
        success: function(data) { 						
            $("#customHeaderWrapper .bannercontainer").html(data);	
            $("#customHeaderWrapper .bannercontainer").show();						
            $("#customHeaderWrapper #customHeaderBlank").hide();
            }
        });															
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
    <div id="headerDimensionsHint">975 pixels wide, 40-180 pixels tall, .jpg, .gif or .png, 2mb max</div>
    </span></div>
<?php } else if($model->customHeader) { ?>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/timthumb.php?src=<?php echo Yii::app()->request->baseUrl; ?>/images/albumHeader/<?php echo $model->customHeader; ?>&w=945&h=180&zc=1" alt="" />
<?php } ?>