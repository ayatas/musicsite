<script type="text/javascript">
$(function(){
	$("#Albums_name").keyup(function(){
		if($("#Albums_name").val())
		$("#albumTitleArtist").html($("#Albums_name").val());		
		else
		$("#albumTitleArtist").html("Untitled Album");
	});
	
	$("#Albums_price").keyup(function(){
		
		if($('#Albums_payMore').attr('checked')){
			if($("#Albums_price").val() != 0)
				$("#albumPriceInfo").html("$"+$("#Albums_price").val()+" or more");
			else
				$("#albumPriceInfo").html("name your price (no minimum)");			
			
		}else{
			if($("#Albums_price").val() != 0)
				$("#albumPriceInfo").html("$"+$("#Albums_price").val());			
			else
				$("#albumPriceInfo").html("free");			
		}
		
	});
	
	$("#Albums_payMore").change(function() {
		
		if(this.checked){
			if($("#Albums_price").val() != 0)
				$("#albumPriceInfo").html("$"+$("#Albums_price").val()+" or more");
			else{
				$("#albumPriceInfo").html('name your price (no minimum)');
			}
			
		}else{			
			if($("#Albums_price").val() != 0)
				$("#albumPriceInfo").html("$"+$("#Albums_price").val());
			else	
				$("#albumPriceInfo").html('free');			
		}				
		
	});	
	
	$("#downLoadDescription").click(function(){
		$("#downLoadDescription").hide();
		$(".description-expanded").slideToggle('slow');
	});
	$("#description-close").click(function(){		
		$(".description-expanded").slideToggle('slow',function(){
			$("#downLoadDescription").show();
		});		
		
	});
	
	$(".show-details").click(function(){
		$(".show-details").hide();
		$(".payment .box").addClass('expanded');
		$(".payment-info").slideToggle('slow');		
	});
	
	$(".payment-info-hide").click(function(){
		$(".payment-info").slideToggle('slow',function(){
			$(".payment .box").removeClass('expanded');
			$(".show-details").show();
		});					
	});	
	
	$(".left-panel-container").click(function(){
		$("div.album").addClass("selected");
		$("dl.album-panel").show();
		$("ol.tracks li").removeClass("selected");
	});	
	
	$("#edit-tralbum-form").submit(function(){
		var valid = true;
		var check = true;
		
		if(!$("#Albums_name").val().length){			
			valid = false;
			if(check){
				$('.album-panel').show();
				$("ol.tracks li.track").removeClass('selected');
				$('.album').addClass('selected');
				check = false;
			}
		}
		$("input:text[name^=\"Tracks[name]\"]").each(function() {
			if (!$.trim($(this).val()).length) { 
				$(this).css({"border":"1px solid #f00"});	
				$(this).next(".trackAlert").html("Please enter a track name.");				
					if(check){
						$('.album').removeClass('selected');
						$('.album-panel').hide();
						$("ol.tracks li.track").removeClass('selected');
						$(this).parents("li.track").addClass("selected");
						check = false;
					}					
				valid = false;
			}else{
				$(this).css({"border":"1px solid #9c9c9c"});	
				$(this).next(".trackAlert").html("");
			}			
		});
		
		if(valid) return true; else return false;

	});
	
	$('.without-audio a').click(function(){
		if($('.without-audio').hasClass('selected'))
		$(this).parent().removeClass("selected");
		else
		$(this).parent().addClass("selected");
	});
	
	$("ol.tracks li.track").unbind().click(function(event){	
		if(event.target.id != "delete"){									
			$("div.album").removeClass("selected");
			$("dl.album-panel").hide();
			$("ol.tracks li").removeClass("selected");						
			$(this).addClass("selected");
		}
		
		$("ol.tracks li.track.selected .right-panel .expander span.add-more a").unbind().click(function(event){
		event.preventDefault();
			$(this).hide(); 
			$("ol.tracks li.track.selected .right-panel .expander .description-expanded").slideToggle();
		});	
		$("ol.tracks li.track.selected .right-panel .expander .description-expanded .desc-close a").unbind().click(function(event){
			event.preventDefault();							
			$("ol.tracks li.track.selected .right-panel .expander .description-expanded").slideToggle("slow",function(){
				$("ol.tracks li.track.selected .right-panel .expander .add-more a").show(); 	
			});								
		});	
		
$(".trackPrice").keyup(function(){								
		if($("ol.tracks li.track.selected .right-panel .trackPayMore").attr("checked")){
			if($(this).val() != 0)
				$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("$"+$(this).val()+" or more");
			else
				$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("name your price (no minimum)");										
		}else{
			if($(this).val() != 0)
				$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("$"+$(this).val());			
			else
				$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("free");			
		}								
	});
	
	$(".trackPayMore").change(function() {
	
		if(this.checked){
			if($("ol.tracks li.track.selected .right-panel .trackPrice").val() != 0)
				$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("$"+$("ol.tracks li.track.selected .right-panel .trackPrice").val()+" or more");
			else
				$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("name your price (no minimum)");
											
		}else{			
			if($("ol.tracks li.track.selected .right-panel .trackPrice").val() != 0)
				$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("$"+$("ol.tracks li.track.selected .right-panel .trackPrice").val());
			else	
				$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("free");			
		}				
	
	});
	
	$(".trackName").keyup(function(){
		if($(this).val())
		$("ol.tracks li.track.selected .left-panel p.title").html($(this).val());		
		else
		$("ol.tracks li.track.selected .left-panel p.title").html("Untitled Album");
	});
	});
	
	$(".track-downloadable").unbind().click(function(){								
		if($(this).is(":checked")){ 																		
			$(this).next(".track-download-options").slideToggle();
			$("ol.tracks li.track.selected .left-panel-container .info .summary").slideToggle();
		}else{
			$("ol.tracks li.track.selected .left-panel-container .info .summary").slideToggle();
			$(this).next(".track-download-options").slideToggle();
		}							
	});	
	
	$('.delete span.bc-ui').unbind().click(function(){														
		if(confirm('Are you sure you want to delete this track?')){									
			if($(this).closest('li').hasClass('selected')){	
				$('div.album').addClass('selected');								
				$('dl.album-panel').show();
			}
			$(this).closest('li').slideToggle('slow', function(){
				if($(this).hasClass('selected')){	
					$('div.album').addClass('selected');								
					$('dl.album-panel').show();
				}
				$(this).remove();
			});							
		}
	});	
	$('a.album-image-delete').click(function(){
		$(".album-image-block").hide();
		$(".image-upload-hint").show();
		$(".album-image-thumnail img").attr("src","");
		$("#Albums_image").val("");
	});
	$('a.track-image-delete').click(function(){
		$("ol.tracks li.track.selected .right-panel .image-upload-hint").show();
		$("ol.tracks li.track.selected .right-panel .track-image-block").hide();
		$("ol.tracks li.track.selected .right-panel .trackImageField").val("");				
	});

});
</script>
<?php if(Yii::app()->user->hasFlash('addalbum')): ?>
<div class="flash-success">
<?php echo Yii::app()->user->getFlash('addalbum'); ?></div>
<?php endif; ?>
<div id="propOpenWrapper">
<div id="pgBd" class="yui-skin-sam loaded">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'edit-tralbum-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php //echo $form->errorSummary($model); ?>

<div class="top-spacer"> </div>
<div data-bind="css: { 'private': private() }" class="album selectable top-border bottom-border nyp downloadable selected">
  <div class="right-panel">
    <dl class="album-panel">
      <dt class="hiddenAccess">
        <?php //echo $form->label($model,'name'); ?>		
      </dt>
      <dd class="album-title"> <span class="required-asterisk" style="opacity: 1;"> * </span>
        <div class="jquery-placeholder-wrapper" style="display: inline-block; position: relative;"> <?php echo $form->textField($model,'name',array('placeholder' => 'album name')); ?><?php echo $form->error($model,'name'); ?> </div>
        <div class="alert"> </div>
      </dd>
      <!--dt class="hiddenAccess">release date</dt-->
      <dd class="release-date bottom-border">
        <label> <?php echo $form->label($model,'releaseDate'); ?>: <span class="required-asterisk" style="opacity: 0;"> * </span>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'releaseDate',
				'options' => array(       
					'dateFormat' => 'mm/dd/yy',
				),
				'htmlOptions' => array(
					'size' => '10',
					'maxlength' => '10',
					'placeholder' => 'optional',
				),
			));
        ?>
          <?php echo $form->error($model,'releaseDate'); ?> <span class="controlTip"> mm/dd/yyyy </span> <span class="controlTip hide-if-preorder"> leave blank to use publish date </span> </label>
        <div class="alert"> </div>
        <div class="show-if-preorder">
          <p> <b> Please note: </b>your pre-order will NOT automatically release on this date. <a  href="javascript:void(0);"> more info </a> </p>
        </div>
      </dd>
      <dd class="download-settings bottom-border">
        <p class="show-if-private"> Private albums are not visible to fans but can be made available via <a href="javascript:void(0);" > download codes </a>. </p>
        <p class="show-if-subscriber-only"> Subscriber-only items are given to all of your subscribers when published. They are inaccessible to everyone else. Subscriber-only items can also be made available via <a href="javascript:void(0);" > download codes </a>. </p>
        <div data-bind="animateVisible: downloadable, animationType: 'slide'" style="">
          <dl data-bind="animateVisible: downloadable, animationType: 'slide'" class="download-options" style="">
            <dt data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="pricing"> <?php echo $form->label($model,'price'); ?> <a href="javascript:void(0);" > What pricing performs best? </a> </dt>
            <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="">
              <label class="price">
              <?php echo $form->textField($model,'price',array('class'=>'price')); ?> &nbsp; <a href="javascript:void(0);"  class="currency-plural"> US Dollars </a>
              <div class="alert"> </div>
              </label>
              <p class="controlTip"> enter zero or more </p>
              <label> <?php echo $form->checkBox($model,'payMore'); ?> let fans pay <span class="hide-if-free"> more </span> if they want </label>
              <p class="controlTip allowpaymore"> Are you sure you don't want to at least give fans the <em> option </em>to pay you? Fans want to support the artists they love, and when they do your release will be added to their Bandcamp collection (which promotes it to even more fans, and also means your supporters can listen to it in <a  href="javascript:void(0);"> the Bandcamp app </a>). We couldn't say it any better than <a  href="javascript:void(0);"> this guy </a>. </p>
              <div style="display:none;" class="show-if-free">
                <label>
                  <input type="checkbox" value="1" name="album.require_email">
                  require email address <span class="show-if-nyp"> if fan enters zero </span> <a class="smallspace"  href="javascript:void(0);"> more info </a> </label>
                <p> You have 200 free downloads remaining this month. <a class="smallspace"  href="javascript:void(0);"> more info / buy credits </a> </p>
              </div>
            </dd>
            <dd class="disabled-when-private">
              <div class="payment">
                <div class="box">
                  <p> Payments will go to <span data-bind="text: paypal_email" class="email">
                    <?php	echo $user->artists->paypalEmail; ?>
                    </span> via PayPal. <a data-bind="click: togglePaypalBox" class="toggler show-details smallspace"> more info </a> </p>
                  <div class="payment-info hide">
                    <p class="details"> When a fan buys your music, the money will go directly to the above address via PayPal. If this is not your correct PayPal address, please visit your <a data-bind="attr: {href: paypal_setup_url}" class="profile"  href="javascript:void(0);"> Profile page </a> to change it. </p>
                    <p class="details"> If you do not yet have a PayPal account, kindly follow <a href="javascript:void(0);" > these instructions </a> to set one up. </p>
                    <p class="details"> Once your PayPal address is correct, please read <a href="javascript:void(0);" > Sell Your Music on Bandcamp </a> to complete the setup, and be sure to review our <a href="javascript:void(0);" > pricing page </a>. </p>
                    <!-- /ko -->
                    <p class="details"> <a class="toggler payment-info-hide"> hide </a> </p>
                  </div>
                </div>
              </div>
            </dd>
            <dd class="description">
              <div class="expander"> <span class="add-more" id="downLoadDescription"> <a href="javascript:void(0)"> download description </a> <span class="controlTip"> &nbsp; tell your fans about bonus items, hidden tracks, etc. </span> </span>
                <div style="display:none;" class="description-expanded">
                  <div> download description: </div>
                  <div class="controlTip"> The following text appears by default: </div>
                  <div class="description-text item_desc"> Includes unlimited streaming via the free Bandcamp app, plus high-quality download in MP3, FLAC and more. </div>
                  <div class="more"> add more: <span class="controlTip"> &nbsp; tell your fans about bonus items, hidden tracks, etc. </span> <?php echo $form->textArea($model, 'downLoadDescription'); ?> </div>
                  <div id="description-close"><a class="toggler">hide</a></div>
                </div>
              </div>
            </dd>
          </dl>
        </div>
      </dd>
      <dd class="art-upload bottom-border">
        <p class="show-if-part-of-album"> Track artwork defaults to use the album artwork. If you would like track art that differs from album art, upload specific track art here. </p>
        <div class="blank">
        <?php
		$albumUrl = Yii::app()->request->baseUrl.'/images/albums/';
		$getAlbumImage = CController::createUrl('artist/getAlbumImage');
		?>		
    	<?php if($model->isNewRecord){?>	    
          <div class="album-image-block hide"> </div>
          <?php } else if($model->image) { ?>
          <div class="album-image-block">
          <img src="<?=Yii::app()->request->baseUrl?>/timthumb.php?src=<?=$albumUrl.$model->image;?>&w=210&h=210&zc=1" alt="" />
          <a href="javascript:void(0)" class="album-image-delete"></a>		  
          </div>
          <?php } else { ?>
          <div class="album-image-block hide"> </div>
          <?php } ?>
          <div class="image-upload-hint <?php if(!$model->isNewRecord && $model->image){?>hide<?php } ?>"> <br />
            <br />
            <?php
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
					'id'=>'uploadFile',
					'config'=>array(
					'action'=>Yii::app()->createUrl('artist/upload'),
					 'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">Upload Album Art</div><ul class="qq-upload-list"></ul></div>',
					'allowedExtensions'=>array("jpg","jpeg","gif","png"),
					'sizeLimit'=>4*1024*1024,
					'auto'=>true,
					'multiple' => false,
					//'onSubmit'=>'js:function(){ $("#userLoader").addClass("userloading");}',
					'onComplete'=>'js:function(id, fileName, responseJSON){							
						var file = responseJSON["filename"];
						$.ajax({
        				url: "'. $getAlbumImage . '",
						type:"POST",
						data: { "imageName": file },
        				success: function(data) { 
							$(".album-image-block").html(data); 
							$(".album-image-thumnail img").attr("src","'.$albumUrl.'"+file);
							}
        				});			
						$(".image-upload-hint").hide();
						$("#Albums_image").val(file);
						$(".album-image-block").show();
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
            <?php echo $form->hiddenField($model, 'image'); ?>
            <p class="hint"> 700 x 700 pixels minimum <br>
              (bigger is better)<br>
              <br>
              .jpg, .gif or .png, 4MB max </p>
          </div>
        </div>
      </dd>
      <dt><?php echo $form->label($model, 'artist'); ?>: </dt>
      <dd> <?php echo $form->textField($model, 'artist', array('placeholder' => 'leave blank to use band name')); ?> <?php echo $form->error($model, 'artist'); ?>
        <p class="controlTip"> for compilations, labels, etc. </p>
        <div class="alert"> </div>
      </dd>
      <dt> <?php echo $form->label($model, 'description'); ?>: </dt>
      <dd> <?php echo $form->textArea($model, 'description', array('placeholder' => '(optional)')); ?> </dd>
      <dt> <?php echo $form->label($model, 'credits'); ?>: </dt>
      <dd> <?php echo $form->textArea($model, 'credits', array('placeholder' => '(optional)')); ?> <?php echo $form->error($model, 'credits'); ?> </dd>
      <dt> <?php echo $form->label($model, 'tags'); ?>: <span class="bandtag"> rock </span>, <span class="bandtag"> folk </span>, <span class="bandtag"> Rock </span>,
        
        
        and… </dt>
      <dd class="bottom-border"> <span class="acWidget"> <?php echo $form->textField($model, 'tags', array('placeholder' => 'comma-separated list of tags')); ?> <?php echo $form->error($model, 'tags'); ?> </span>
        <div class="suggestion"> </div>
        <div class="alert"> </div>
        <div class="whylink controlTip"> <a  href="#"> Why bother tagging? </a> </div>
      </dd>
      <dt> <?php echo $form->label($model, 'upc_ean'); ?>: </dt>
      <dd> <?php echo $form->textField($model, 'upc_ean', array('placeholder' => '(optional)')); ?> <?php echo $form->error($model, 'upc_ean'); ?>
        <div class="alert"> </div>
        <div class="controlTip"> e.g., "027616 852809" <a  href="#"> more info </a> </div>
      </dd>
    </dl>
  </div>
  <div class="left-panel-container">
    <div class="left-panel">
      <div class="art ">
        <div class="blank album-image-thumnail">
        <?php if($model->isNewRecord) { ?>
        <img src="" alt="" width="70" height="70" />
        <?php } else if($model->image) { ?>
        <img src="<?=Yii::app()->request->baseUrl?>/timthumb.php?src=<?=$albumUrl.$model->image;?>&w=70&h=70&zc=1" alt="" />
        <?php } ?>
        </div>
      </div>
      <div class="album-title-artist">
        <p id="albumTitleArtist" class="title"> <?php if($model->isNewRecord){ echo 'Untitled Album'; }else{ echo $model->name; } ?></p>
        <p class="by"> by <span class="artist"> <?php echo $user->name; ?> </span> </p>
        <p class="release-date"> </p>
        <div class="summary">
          <ul>
            <li class="price last-child" id="albumPriceInfo">$<?php if($model->isNewRecord){ echo '7.00 or more'; }else{ echo $model->price; if($model->payMore) echo ' or more'; } ?>  </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tracks bottom-border">
  <h3 class="h3-audio"> Tracks <span class="controlHint"> uploading <span class="upload-count"> x tracks </span>, <span class="percent"> x </span>% complete, <span class="eta"> mm:ss </span>remaining </span> </h3>
  <ol class="tracks ui-sortable"> 
  <?php 	
  foreach($model->tracks as $trackList){	
  	if(isset(Yii::app()->session['trackId'])){
		$trackId = Yii::app()->session['trackId'];
	}else{			
		Yii::app()->session['trackId'] = 0;
		$trackId = Yii::app()->session['trackId'];
	}
	$track = Tracks::model()->findByPk($trackList->id);
  	$this->renderPartial('trackForm',array('trackFile'=>$track->fileName,'track'=>$track,'trackId'=>$trackId,'selected'=>''));
	Yii::app()->session['trackId'] = $trackId+1;
  } 
  ?>
    <li class="add-audio">
      <div class="left-panel audio-upload add-audio">
        <div class="html5-upload-wrapper" style="position: relative; display: inline-block; cursor: pointer; margin: 0px;">          
          <?php		
		  		$addTrackUrl = 	CController::createUrl('artist/addTrackBlock');	
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
					'id'=>'uploadTrack',
					'config'=>array(
					'action'=>Yii::app()->createUrl('artist/uploadTrack'),
					 'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">add track</div><ul class="qq-upload-list"></ul></div>',
					'allowedExtensions'=>array("mp3"),
					'sizeLimit'=>291*1024*1024,
					'auto'=>true,
					'multiple' => false,
					'onSubmit'=>'js:function(){ $("#userLoader").addClass("userloading");}',
					'onComplete'=>'js:function(id, fileName, responseJSON){	
						var file = responseJSON["filename"];
						$.ajax({
        				url: "'. $addTrackUrl . '",
						type:"POST",
						data: { "trackFile": file },
        				success: function(data) { 
							$("div.album").removeClass("selected");
							$("ol.tracks li").removeClass("selected");
							$("ol.tracks li.add-audio").before(data); 							
							$("ol.tracks li.track").unbind().click(function(event){	
								if(event.target.id != "delete"){									
									$("div.album").removeClass("selected");
									$("dl.album-panel").hide();
							 		$("ol.tracks li").removeClass("selected");						
									$(this).addClass("selected");
								}
							});
							$(".delete span.bc-ui").unbind().click(function(){														
								if(confirm("Are you sure you want to delete this track?")){									
									if($(this).closest("li").hasClass("selected")){	
										$("div.album").addClass("selected");								
										$("dl.album-panel").show();
									}
									$(this).closest("li").slideToggle("slow", function(){
										if($(this).hasClass("selected")){	
											$("div.album").addClass("selected");								
											$("dl.album-panel").show();
										}
										$(this).remove();
									});							
								}
							});							
							$(".track-downloadable").unbind().click(function(){								
								if($(this).is(":checked")){ 																		
									$(this).next(".track-download-options").slideToggle();
									$("ol.tracks li.track.selected .left-panel-container .info .summary").slideToggle();
								}else{
									$("ol.tracks li.track.selected .left-panel-container .info .summary").slideToggle();
									$(this).next(".track-download-options").slideToggle();
								}							
							});	
							$(".trackPrice").keyup(function(){								
								if($("ol.tracks li.track.selected .right-panel .trackPayMore").attr("checked")){
									if($(this).val() != 0)
										$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("$"+$(this).val()+" or more");
									else
										$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("name your price (no minimum)");										
								}else{
									if($(this).val() != 0)
										$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("$"+$(this).val());			
									else
										$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("free");			
								}								
							});
							
							$(".trackPayMore").change(function() {
							
								if(this.checked){
									if($("ol.tracks li.track.selected .right-panel .trackPrice").val() != 0)
										$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("$"+$("ol.tracks li.track.selected .right-panel .trackPrice").val()+" or more");
									else
										$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("name your price (no minimum)");
																	
								}else{			
									if($("ol.tracks li.track.selected .right-panel .trackPrice").val() != 0)
										$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("$"+$("ol.tracks li.track.selected .right-panel .trackPrice").val());
									else	
										$("ol.tracks li.track.selected .left-panel-container ul li.price.last-child").html("free");			
								}				
							
							});
							
							$(".trackName").keyup(function(){
								if($(this).val())
								$("ol.tracks li.track.selected .left-panel p.title").html($(this).val());		
								else
								$("ol.tracks li.track.selected .left-panel p.title").html("Untitled Album");
							});
							
							$("ol.tracks li.track.selected .right-panel a.paymentMoreInfoLink").click(function(){
								$(this).hide();
								$("ol.tracks li.track.selected .right-panel .box").addClass("expanded");
								$("ol.tracks li.track.selected .right-panel p.details").show();
							});
							$("ol.tracks li.track.selected .right-panel p.details.hide").click(function(){
								$("ol.tracks li.track.selected .right-panel a.paymentMoreInfoLink").show();
								$("ol.tracks li.track.selected .right-panel p.details").hide();
								$("ol.tracks li.track.selected .right-panel .box").removeClass("expanded");
							});
							$("ol.tracks li.track.selected .right-panel .expander span.add-more a").click(function(event){
								event.preventDefault();
								$(this).hide(); 
								$("ol.tracks li.track.selected .right-panel .expander .description-expanded").slideToggle();
							});	
							$("ol.tracks li.track.selected .right-panel .expander .description-expanded .desc-close a").click(function(event){
								event.preventDefault();							
								$("ol.tracks li.track.selected .right-panel .expander .description-expanded").slideToggle("slow",function(){
									$("ol.tracks li.track.selected .right-panel .expander .add-more a").show(); 	
								});								
							});							
							//$("#ytTracks_downloadable").remove();
							$("dl.album-panel").hide();							
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
        <div class="without-audio">
            <a class="menu"><span class="bc-ui menu-triangle"></span></a>
            <?php		
        echo CHtml::ajaxLink(
        "add track w/o audio",
        Yii::app()->createUrl( 'artist/addTrackBlock' ),
        array( // ajaxOptions
        'type' =>'POST',
        'beforeSend' => "function( request ){        
        }",
        'success' => "function( data ){			 		
        	$('div.album').removeClass('selected');
							$('ol.tracks li').removeClass('selected');
							$('ol.tracks li.add-audio').before(data); 							
							$('ol.tracks li.track').unbind().click(function(event){	
								if(event.target.id != 'delete'){									
									$('div.album').removeClass('selected');
									$('dl.album-panel').hide();
							 		$('ol.tracks li').removeClass('selected');						
									$(this).addClass('selected');
								}
							});
							$('.delete span.bc-ui').unbind().click(function(){														
								if(confirm('Are you sure you want to delete this track?')){									
									if($(this).closest('li').hasClass('selected')){	
										$('div.album').addClass('selected');								
										$('dl.album-panel').show();
									}
									$(this).closest('li').slideToggle('slow', function(){
										if($(this).hasClass('selected')){	
											$('div.album').addClass('selected');								
											$('dl.album-panel').show();
										}
										$(this).remove();
									});							
								}
							});							
							$('.track-downloadable').unbind().click(function(){								
								if($(this).is(':checked')){ 																		
									$(this).next('.track-download-options').slideToggle();
									$('ol.tracks li.track.selected .left-panel-container .info .summary').slideToggle();
								}else{
									$('ol.tracks li.track.selected .left-panel-container .info .summary').slideToggle();
									$(this).next('.track-download-options').slideToggle();
								}							
							});	
							$('.trackPrice').keyup(function(){								
								if($('ol.tracks li.track.selected .right-panel .trackPayMore').attr('checked')){
									if($(this).val() != 0)
										$('ol.tracks li.track.selected .left-panel-container ul li.price.last-child').html('$'+$(this).val()+' or more');
									else
										$('ol.tracks li.track.selected .left-panel-container ul li.price.last-child').html('name your price (no minimum)');										
								}else{
									if($(this).val() != 0)
										$('ol.tracks li.track.selected .left-panel-container ul li.price.last-child').html('$'+$(this).val());			
									else
										$('ol.tracks li.track.selected .left-panel-container ul li.price.last-child').html('free');			
								}								
							});
							
							$('.trackPayMore').change(function() {
							
								if(this.checked){
									if($('ol.tracks li.track.selected .right-panel .trackPrice').val() != 0)
										$('ol.tracks li.track.selected .left-panel-container ul li.price.last-child').html('$'+$('ol.tracks li.track.selected .right-panel .trackPrice').val()+' or more');
									else
										$('ol.tracks li.track.selected .left-panel-container ul li.price.last-child').html('name your price (no minimum)');
																	
								}else{			
									if($('ol.tracks li.track.selected .right-panel .trackPrice').val() != 0)
										$('ol.tracks li.track.selected .left-panel-container ul li.price.last-child').html('$'+$('ol.tracks li.track.selected .right-panel .trackPrice').val());
									else	
										$('ol.tracks li.track.selected .left-panel-container ul li.price.last-child').html('free');			
								}				
							
							});
							
							$('.trackName').keyup(function(){
								if($(this).val())
								$('ol.tracks li.track.selected .left-panel p.title').html($(this).val());		
								else
								$('ol.tracks li.track.selected .left-panel p.title').html('Untitled Album');
							});
							
							$('ol.tracks li.track.selected .right-panel a.paymentMoreInfoLink').click(function(){
								$(this).hide();
								$('ol.tracks li.track.selected .right-panel .paymentMoreInfo').slideToggle();
								$('ol.tracks li.track.selected .right-panel p.details').show();
							});
							$('ol.tracks li.track.selected .right-panel #paymentMoreInfoHide').click(function(){								
								$('ol.tracks li.track.selected .right-panel .paymentMoreInfo').slideToggle(function(){
								$('ol.tracks li.track.selected .right-panel a.paymentMoreInfoLink').show();	
								});								
							});
							$('ol.tracks li.track.selected .right-panel .expander span.add-more a').click(function(event){
								event.preventDefault();
								$(this).hide(); 
								$('ol.tracks li.track.selected .right-panel .expander .description-expanded').slideToggle();
							});	
							$('ol.tracks li.track.selected .right-panel .expander .description-expanded .desc-close a').click(function(event){
								event.preventDefault();							
								$('ol.tracks li.track.selected .right-panel .expander .description-expanded').slideToggle('slow',function(){
									$('ol.tracks li.track.selected .right-panel .expander .add-more a').show(); 	
								});								
							});							
							$('.without-audio').removeClass('selected');
							$('dl.album-panel').hide();					
        }"        
        ),
		array( //htmlOptions
    	'class' =>'add-track'
  )
        );
        ?>
        </div>
        <span class="controlHint"> 291MB <a  href="#"> max </a>per track, lossless <a  href="#"> .mp3 </a> </span>
        <p class="pro-notice"> Uploading a lot of tracks? <a  href="/pro?from=b&amp;id=1544826807"> Bandcamp Pro </a> features batch upload, private streaming, and more. <a  href="#" class="b"> Get details… </a> </p>
      </div>
    </li>
  </ol>
  <div class="deleted-tracks"> </div>
</div>
<div class="save">
  <div id="save-buttons">    
    <h4> Publish </h4>
    <dl class="visibility-radios">
      <dd class="public row">
        <div class="first-column"> <?php echo $form->radioButton($model, 'visibility', array('value'=>1,'uncheckValue'=>null)); ?> </div>
        <div class="second-column">
          <label for="public-radio"> public </label>
        </div>
      </dd>
      <dd class="private row">
        <div class="first-column"> <?php echo $form->radioButton($model, 'visibility', array('value'=>0,'uncheckValue'=>null)); ?> </div>
        <div class="second-column">
          <label data-bind="css: { 'disabled': private_radio_button_disabled }" for="private-radio" class=""> private </label>
          <span data-bind="visible: subscription_bonus_item" class="private-disable" style="display: none;"> Subscription bonus items cannot be private </span> </div>
      </dd>
      <dd data-bind="animateVisible: private_radio_button, animationType: 'slide'" class="private-hint row" style="display: none;">
        <div class="first-column"> </div>
        <div class="second-column">
          <p class="private hint"> Private albums are not visible to fans, but they can be made available via <a href="/tools#dl_codes" > download codes </a> <span class="hide-when-published"> once published </span>. </p>
        </div>
      </dd>
    </dl>
    <div class="draft-buttons"> <?php echo CHtml::submitButton('Save',array('class' => 'saveButton'));  ?> </div>    
  </div>
</div>
<?php $this->endWidget(); ?>
</div>
</div>