  <div style="display: none" id="sidecart">
    <div class="reveal" id="sidecartReveal">
      <div id="sidecartBody">
        <div id="sidecartHeader">
          <h3 class="title">shopping cart</h3>
        </div>
        <div id="sidecart-phone-reveal">
          <div id="sidecartContents">
            <div id="item_list"> </div>
          </div>
          <div id="sidecartFooter">
            <div id="sidecartSummary">
              <table id="summary">
                <tbody>
                  <tr class="total">
                    <th>total</th>
                    <td class="numeric">- -&nbsp;</td>
                    <td class="currency"><a href="/no_js/country_picker">USD</a></td>
                  </tr>
                </tbody>
              </table>
              <div class="summary-notes"> </div>
            </div>
            <h4><a href="#" class="buttonLink notSkinnable" id="sidecartCheckout">Checkout</a></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <meta content="" itemprop="name">
  <div data-bind="css: {'ko-ready': $data}" id="bio-container" class="ko-ready"> 
     
    <div class="artists-bio-pic portrait <?php if(!$model->user->image) { ?> empty <?php } ?>">
    <?php if((!Yii::app()->user->isGuest) && (Yii::app()->user->getId() == $model->user->id)){ ?>
    	<div class="artist-image <?php if(!$model->user->image) { ?> hide <?php } ?>">
        <?php if($model->user->image){ ?>
     <img src="<?php echo Yii::app()->request->baseUrl; ?>/timthumb.php?src=<?php echo Yii::app()->request->baseUrl; ?>/images/artist/<?php echo $model->user->image; ?>&w=120&h=100&zc=1" alt="" />
	<?php 	
    echo CHtml::ajaxLink(
    "X",
    Yii::app()->createUrl('artist/removeArtistImage'),
    array(
    'type' => 'POST',
    'beforeSend' => "function(request){ if(confirm('Are you sure you want to delete image?')) { return true; } else{ return false; }}",
    'success' => "function(data){  
		$('.artist-image').html(''); 
		$('.artists-bio-pic.portrait').addClass('empty');    	
		$('.artist-upload-hint').show();
		$('.artist-image').hide();  						
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
    <div class="artist-upload-hint <?php if($model->user->image) { ?> hide <?php } ?>">
        <?php
    $getArtistImage = CController::createUrl('artist/getArtistImage');    
    $this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
    'id'=>'uploadArtistImage',
    'config'=>array(
    'action'=>Yii::app()->createUrl('artist/uploadArtistImage'),
     'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">add artist photo</div><ul class="qq-upload-list"></ul></div>',
    'allowedExtensions'=>array("jpg","jpeg","gif","png"),
    'sizeLimit'=>2*1024*1024,
    'auto'=>true,
    'multiple' => false,
    //'onSubmit'=>'js:function(){ $("#userLoader").addClass("userloading");}',
    'onComplete'=>'js:function(id, fileName, responseJSON){	
        var file = responseJSON["filename"];
        $.ajax({
        url: "'. $getArtistImage . '",
        type:"POST",
        data: { "imageName": file },
        success: function(data) {
			$(".artist-image").html(data);
			$(".artist-upload-hint").hide();
			$(".artist-image").show();						
            
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
    <?php } else if($model->user->image) { ?>
    	<div class="artist-image">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/timthumb.php?src=<?php echo Yii::app()->request->baseUrl; ?>/images/artist/<?php echo $model->user->image; ?>&w=120&h=100&zc=1" alt="" />
    	</div>
    <?php } ?>
    </div>
        
    <p id="band-name-location"> <span class="title"><?=$model->user->name;?></span> <span class="location secondaryText" style="display:block;"><?=$model->user->location;?></span> </p>
    <!--<div id="following-actions" style="display: block;">
      <button class="follow-unfollow compound-button" type="button" id="follow-unfollow">
      <div>Follow</div>
      </button>
    </div>-->
    <div class="artists-bio-text">
    <?php if((!Yii::app()->user->isGuest) && (Yii::app()->user->getId() == $model->user->id)){ ?>
      <a class="bio-text-add <?php if($model->user->bio) {?> hide <?php } ?>">add artist bio</a>      
      <div class="bio-info-text <?php if(empty($model->user->bio)) {?> hide <?php } ?>"><?=$model->user->bio;?></div> 
      <div class="edit-bio-form hide">        
      <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'artist-info-form',
            'enableAjaxValidation'=>false,
    )); ?>
    	<?php echo CHtml::textArea("artistDescription",$model->user->bio,array('rows'=>6,'maxlength'=>400, 'cols'=>12,"placeholder"=>"Plain text only, no HTML."));?>
        <div id="characterLeft"><?php if( strlen($model->user->bio) < 400 ) echo 400 - strlen($model->user->bio); ?>&nbsp;characters left</div>
        <?php
        echo CHtml::ajaxSubmitButton('Save', 
         CHtml::normalizeUrl(array('artist/saveArtistBio')), 
         array(
              'type'=>'post',
			  'beforeSend'=>'function(){                                          
              }' ,     
              'success'=>'function(data){
				  if(data){
				  	$(".bio-info-text").html(data);
					$(".edit-bio-form").hide();
					$(".bio-info-text").show();	
					$(".bio-text-edit").show();			
				  }else{
					  $(".edit-bio-form").hide();					  
					  $(".bio-text-add").show();
				  }
                    						
               }'
          ) 
         ); 
				
		?>
		<?php echo CHtml::button("cancel", array("class"=>"cancel-bio-edit notSkinnable"));?>
 		<?php $this->endWidget(); ?>
	</div>
    <a class="bio-text-edit <?php if(empty($model->user->bio)) {?> hide <?php } ?>">edit artist bio</a>
	<?php } else { 
	echo $model->user->bio;
	} ?>
    </div>
  </div>
  <?php if(isset($_GET['album']) || isset($_GET['track'])) { ?>
  <div class="sidebar peekaboo-list" id="discography"> 
<h3 class="title"><?php echo CHtml::link('discography',array('artist/site','domain'=>$model->url)); ?>
</h3>
<ul>
	<?php foreach($model->albums as $albumslist): ?>
    <li>
    <div>
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/artist/site?domain=<?=$model->url;?>&album=<?=$albumslist->slug;?>" class="thumbthumb ">
    <?php if($albumslist->image) { ?>
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/timthumb.php?src=<?php echo Yii::app()->request->baseUrl; ?>/images/albums/<?=$albumslist->image;?>&w=120&h=120&zc=1" alt="" />
    <?php } ?>
    </a>
    </div>
    <div class="trackTitle">
    <?php echo CHtml::link($albumslist->name, array('artist/site','domain'=>$model->url,'album'=>$albumslist->slug)); ?>
    </div>
    <div class="trackYear secondaryText"><?=date('M Y',strtotime($albumslist->releaseDate));?></div>
    </li>
    <?php endforeach; ?>
</ul>
</div><br /><br />
<?php } ?>
  <h3 class="title" id="contact-help">contact / help</h3>
  <a title="Send an email to Brahmaji" href="javascript:void(0)" class="contactOwner">Contact <?=$model->user->name;?></a>
  <div id="contactForm" class="hide" title="Send an email to <?=$model->user->name;?>">
  	<?php $this->renderPartial("contact-form",array('contactModel'=>$contactModel)); ?>
  </div>
  <p><a target="_blank" href="#">Download help</a></p>