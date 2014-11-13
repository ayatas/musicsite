<script type="text/javascript">
$(function(){
	$("#Tracks_name").keyup(function(){
		if($("#Tracks_name").val())
		$("#trackTitle").html($("#Tracks_name").val());		
		else
		$("#trackTitle").html("Untitled Album");
	});
	
	$("#Tracks_price").keyup(function(){
		
		if($('#Tracks_payMore').attr('checked')){
			if($("#Tracks_price").val() != 0)
				$("#trackPriceInfo").html("$"+$("#Tracks_price").val()+" or more");
			else
				$("#trackPriceInfo").html("name your price (no minimum)");			
			
		}else{
			if($("#Tracks_price").val() != 0)
				$("#trackPriceInfo").html("$"+$("#Tracks_price").val());			
			else
				$("#trackPriceInfo").html("free");			
		}
		
	});
	
	$("#Tracks_payMore").change(function() {
		
		if(this.checked){
			if($("#Tracks_price").val() != 0)
				$("#trackPriceInfo").html("$"+$("#Tracks_price").val()+" or more");
			else{
				$("#trackPriceInfo").html('name your price (no minimum)');
			}
			
		}else{			
			if($("#Tracks_price").val() != 0)
				$("#trackPriceInfo").html("$"+$("#Tracks_price").val());
			else	
				$("#trackPriceInfo").html('free');			
		}				
		
	});
	
	$("#paypalInfoShow").click(function(){
		$(this).hide();		
		$("#paypalInfo").slideToggle('slow');
	});
	$("#paypalInfoHide").click(function(){			
		$("#paypalInfo").slideToggle('slow', function(){
			$("#paypalInfoShow").show();
		});
	});
	$("#downloadShow").click(function(){
		$(this).hide();		
		$("#downloadInfo").slideToggle('slow');
	});
	$("#downloadHide").click(function(){			
		$("#downloadInfo").slideToggle('slow', function(){
			$("#downloadShow").show();
		});
	});
	
	
});
</script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'edit-tralbum-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php //echo $form->errorSummary($model); ?>
  <div class="top-spacer" style="margin:0px;"></div>
  <div class="track selectable single featured streaming-enabled nyp downloadable selected">
    <div class="right-panel">      
      <dl class="track-panel">
        <dd class="bottom-border track-title"> <span class="required-asterisk" style="opacity: 1;">*</span>
          <div class="jquery-placeholder-wrapper" style="display: inline-block; position: relative;">
          <?php echo $form->textField($model, 'name', array('class'=>'title', 'placeholder'=>'track title')); ?>
          <?php echo $form->error($model, 'name'); ?>
          </div>
          <div class="alert"></div>
          <div class="include-in-preorder"> <strong>During Pre-order:</strong>
            <label class="disabled">
              <input type="checkbox" disabled="" value="1" name="track.preorder_download_0">
              give this track to fans when they pre-order the album (also allows fans to stream this track during the pre-order) </label>
            <div class="show-if-private"> Bonus tracks cannot be included in the preorder. </div>
          </div>
        </dd>
        <dd class="download-settings bottom-border">
          <div data-bind="animateVisible: downloadable, animationType: 'slide'" style="">
            <dl data-bind="animateVisible: downloadable, animationType: 'slide'" class="download-options" style="">
              <dt data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="pricing">track pricing: <a href="javascript:void(0);" >What pricing performs best?</a> </dt>
              <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="">
                <label class="price">
                <?php echo $form->textField($model, 'price', array('class'=>'price')); ?>
                <?php echo $form->error($model, 'price' ); ?>
                &nbsp; <a href="javascript:void(0);"  class="currency-plural">US Dollars</a>
                <div class="alert"></div>
                </label>
                <p class="controlTip">enter zero or more</p>
                <label>
                  <?php echo $form->checkbox($model,'payMore'); ?>
                  let fans pay <span class="hide-if-free">more</span> if they want </label>
                <p class="controlTip allowpaymore">Are you sure you don't want to at least give fans the <em>option</em> to pay you? Fans want to support the artists they love, and when they do your release will be added to their My MusicHutt collection (which promotes it to even more fans, and also means your supporters can listen to it in <a  href="javascript:void(0);">the My MusicHutt app</a>). We couldn't say it any better than <a  href="javascript:void(0);">this guy</a>.</p>
                <div style="display:none;" class="show-if-free">
                  <label>
                    <input type="checkbox" value="1" name="track.require_email_0">
                    require email address <span class="show-if-nyp">if fan enters zero</span> <a class="smallspace"  href="javascript:void(0);">more info</a> </label>
                  <p> You have 200 free downloads remaining this month. <a class="smallspace"  href="javascript:void(0);">more info / buy credits</a> </p>
                </div>
              </dd>              
              <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }, visible: payment_details_visible" class="disabled-when-private">
                <div data-bind="with: payment_settings" class="payment">
                  <div data-bind="css: {expanded: box_expanded}" class="box">
                    <p> Payments will go to <span data-bind="text: paypal_email" class="email"><?=$user->email;?></span> via PayPal. <a href="javascript:void(0)" id="paypalInfoShow" class="toggler show-details smallspace">more info</a> </p>
                    <div class="hide" id="paypalInfo" style="background-color: #fffdea; border: 1px solid #fef58d;"> 
                    <p class="details"> When a fan buys your music, the money will go directly to the above address via PayPal. If this is not your correct PayPal address, please visit your <a data-bind="attr: {href: paypal_setup_url}" class="profile"  href="javascript:void(0);">Profile page</a> to change it. </p>
                    <p class="details"> If you do not yet have a PayPal account, kindly follow <a href="javascript:void(0);" >these instructions</a> to set one up. </p>
                    <p class="details"> Once your PayPal address is correct, please read <a href="javascript:void(0);" >Sell Your Music on My MusicHutt</a> to complete the setup, and be sure to review our <a href="javascript:void(0);" >pricing page</a>. </p>
                     <p class="details" style="text-align:center; margin:5px 0;"> <a id="paypalInfoHide" class="toggler">hide</a> </p>
                    <!-- /ko -->
                    </div>
                  </div>
                </div>
              </dd>
              <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="description">
                <input type="hidden" value="1" name="track.new_desc_format_0">
                <div class="expander"> <span class="add-more"> <a href="javascript:void(0)" id="downloadShow">download description</a> </span>
                  <div class="description-expanded hide" id="downloadInfo">
                    <div>download description:</div>
                    <div class="controlTip">The following text appears by default:</div>
                    <div class="description-text item_desc"> Includes unlimited streaming via the free my MusicHutt app, plus high-quality download in MP3, FLAC and more. </div>
                    <div class="more">add more:
                      <?php echo $form->textarea($model, 'downLoadDescription'); ?>
                    </div>
                    <div><a class="toggler" id="downloadHide">hide</a></div>
                  </div>
                </div>
              </dd>
            </dl>
          </div>
        </dd>
        <dt>about this track:</dt>
        <dd>
         <?php echo $form->textarea($model, 'description', array('placeholder'=>'(optional)')); ?>
        </dd>
        <dt class="lyrics">lyrics: <a  href="javascript:void(0);">Why add lyrics? I dislike typing.</a></dt>
        <dd>
          <?php echo $form->textarea($model, 'lyrics', array('placeholder'=>'(optional)')); ?>
        </dd>
        <dt>track credits:</dt>
        <dd class="bottom-border">
          <?php echo $form->textarea($model, 'trackCredits', array('placeholder'=>'(optional)')); ?>
        </dd>
        <dt>artist:</dt>
        <dd>
           <?php echo $form->textField($model, 'artist', array('placeholder'=>'leave blank to use band name')); ?>
          <p class="controlTip">for compilations, labels, etc.</p>
          <div class="alert"></div>
        </dd>
        <dd class="art-upload bottom-border">
          <p class="show-if-part-of-album"> Track artwork defaults to use the album artwork. If you would like track art that differs from album art, upload specific track art here. </p>
          <div class="blank">
          <div class="track-image-block hide"></div>
            <div class="image-upload-hint" style="margin-top:30px;">
              <?php
			  $getTrackImage = CController::createUrl('artist/getTrackImage');
			  $trackUrl = Yii::app()->request->baseUrl.'/images/tracks/';
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
					'id'=>'uploadFile',
					'config'=>array(
					'action'=>Yii::app()->createUrl('artist/trackArtUpload'),
					 'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">Upload Track Art</div><ul class="qq-upload-list"></ul></div>',
					'allowedExtensions'=>array("jpg","jpeg","gif","png"),
					'sizeLimit'=>4*1024*1024,
					'auto'=>true,
					'multiple' => false,
					//'onSubmit'=>'js:function(){ $("#userLoader").addClass("userloading");}',
					'onComplete'=>'js:function(id, fileName, responseJSON){		
						var file = responseJSON["filename"];
						$.ajax({
							url: "'. $getTrackImage . '",
							type:"POST",
							data: { "imageName": file ,"tag":"single"},
							success: function(data) { 
								$(".image-upload-hint").hide();
								$(".track-image-block").html(data); 
								$("#trackThumb img").attr("src","'.$trackUrl.'"+file);
								$("#trackThumb img").show();
								$("#trackThumb .blank").hide();							
								$(".track-image-block").show();
								$("#Tracks_image").val(file);							
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
              <p class="hint"> 700 x 700 pixels minimum <br>
                (bigger is better)<br>
                <br>
                .jpg, .gif or .png, 4MB max </p>
            </div>
            <div class="upload-progress-wrapper">
              <div class="label">Uploading <span class="filename"></span>...</div>
              <div class="upload-progress"></div>
            </div>
          </div>
          <?php echo $form->hiddenField($model,'image'); ?>
        </dd>
        <dt> tags: <span class="bandtag">rock</span>, <span class="bandtag">folk</span>, <span class="bandtag">Rock</span>,
          
          
          and… </dt>
        <dd class="bottom-border"> <span class="acWidget">
        <?php echo $form->textField($model, 'tags', array('placeholder'=>'comma-separated list of tags')); ?>
          </span>
          <div class="suggestion"></div>
          <div class="alert"></div>
          <div class="whylink controlTip"> <a  href="javascript:void(0);">Why bother tagging?</a> </div>
        </dd>
        
        <dt>track ISRC:</dt>
        <dd class="bottom-border">
          <?php echo $form->textField($model,'ISRC'); ?>
          <div class="alert"></div>
          <div class="controlTip">e.g., "US-Z04-99-32243" <a  href="javascript:void(0);">more info</a></div>
        </dd>
        <dt class="release-date">release date:</dt>
        <dd class="release-date bottom-border">
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
          <span class="controlTip">mm/dd/yyyy</span> <span class="controlTip show-if-part-of-album">leave blank to use album release date</span>
          <div class="alert"></div>
        </dd>
        <dt class="hiddenAccess">visibility</dt>
        <dd class="private bottom-border ">
          <label>
            <?php echo $form->checkbox($model, 'visibility'); ?>
            <span class="show-if-part-of-album">bonus track</span> <span class="hide-if-part-of-album">private</span> </label>
          <p class="show-if-included-in-preorder"> A track included in the preorder cannot be a bonus track. </p>
          <span data-bind="visible: private_checkbox_disabled() &amp;&amp; parent_subscriber_only()" class="hint" style="display: none;"> Subscriber-only items cannot have bonus tracks. </span>         
        </dd>       
      </dl>
    </div>
    <div class="left-panel-container">
      <div class="left-panel track single" id="trackThumb">
        <div class="art "> <img alt="artwork thumbnail" src="" width="70" height="70">
          <div class="blank"></div>
        </div>
        <div class="album-title-artist">
          <p data-bind="text: title() || 'Untitled Track'" class="title" id="trackTitle">Untitled Track</p>
          <p class="by">by <span class="artist"><?=$user->name;?></span></p>
          <div class="summary">
            <ul>
              <li class="price last-child" id="trackPriceInfo"> $1 or more </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="edit-track-audio">
      <h3 class="h3-audio">Audio <span class="controlHint"><span class="percent">x</span>% complete, <span class="eta">mm:ss</span> remaining</span></h3>
      <div class="audio-upload">
        <div class="no-audio">
          <div class="html5-upload-wrapper" style="position: relative; display: inline-block; cursor: pointer; margin: 0px 20px 0px 0px;">
          <?php	
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
					'id'=>'uploadTrack',
					'config'=>array(
					'action'=>Yii::app()->createUrl('artist/uploadTrack'),
					 'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">add audio</div><ul class="qq-upload-list"></ul></div>',
					'allowedExtensions'=>array("mp3"),
					'sizeLimit'=>291*1024*1024,
					'auto'=>true,
					'multiple' => false,
					'onSubmit'=>'js:function(){ $("#userLoader").addClass("userloading");}',
					'onComplete'=>'js:function(id, fileName, responseJSON){	
						var file = responseJSON["filename"];
						$(".audio-upload").html(file);
						$("#Tracks_fileName").val(file);
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
                ?>  </div>
          <span class="controlHint">291MB <a  href="javascript:void(0);">max</a>, lossless <a  href="javascript:void(0);">.mp3</a></span>
          <p class="pro-notice">Uploading a lot of audio? <a  href="/pro?from={{band.pro_entry_pt_bulk_upload}}&amp;id={{band.id}}">My MusicHutt Pro</a> features batch album upload, private streaming, and more. <a  href="javascript:void(0);" class="b">Get details…</a></p>
        </div>
        <div class="progress-wrapper"> <span class="filename"></span> <span class="status"></span> <span class="bar">|</span> <a class="cancel">cancel</a>
          <div class="upload-progress"></div>
        </div>
      </div>
    </div>
    <?php echo $form->hiddenField($model, 'fileName'); ?>
  </div>
  <div class="part-of-album">   
  Select Album: 
    <?php
	$album_list = CHtml::listData($user->artists->albums, 'id', 'name');
    echo $form->dropDownList($model,'albumId',$album_list);
	?>
  </div>
  <div class="save">
    <div id="save-buttons">
      <div class="draft-buttons"><?php echo CHtml::submitButton("save", array('class'=>'button')); ?></div>      
      <div data-bind="visible: free_warning_visible" class="publish-warning controlTip" style="display: none;"> Free tracks aren't automatically granted to your subscribers, but can be downloaded individually. </div>
      <div data-bind="visible: subscription_bonus_item() &amp;&amp; is_free()" class="publish-warning controlTip" style="display: none;"> Subscription bonus items can't be free. </div>
    </div>
  </div>
<?php $this->endWidget(); ?>
