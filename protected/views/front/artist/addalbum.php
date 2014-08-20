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
<div class="top-spacer"> </div>
<div data-bind="css: { 'private': private() }" class="album selectable top-border bottom-border nyp downloadable selected">
  <div class="right-panel">
    <dl class="album-panel">
      <dt class="hiddenAccess"> <?php //echo $form->label($model,'name'); ?> </dt>
      <dd class="album-title"> <span class="required-asterisk" style="opacity: 1;"> * </span>
        <div class="jquery-placeholder-wrapper" style="display: inline-block; position: relative;"> <?php echo $form->textField($model,'name',array('placeholder' => 'album name')); ?><?php echo $form->error($model,'name'); ?>
        </div>
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
<?php echo $form->error($model,'releaseDate'); ?>
          <span class="controlTip"> mm/dd/yyyy </span> <span class="controlTip hide-if-preorder"> leave blank to use publish date </span> </label>
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
              <?php echo $form->textField($model,'price',array('class'=>'price')); ?>
              &nbsp; <a href="javascript:void(0);"  class="currency-plural"> US Dollars </a>
              <div class="alert"> </div>
              </label>
              <p class="controlTip"> enter zero or more </p>
              <label>
               <?php echo $form->checkBox($model,'payMore',array('checked' => 'checked')); ?>
                let fans pay <span class="hide-if-free"> more </span> if they want </label>
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
                  <p> Payments will go to <span data-bind="text: paypal_email" class="email"> <?php	echo $user->artists[0]->paypalEmail; ?> </span> via PayPal. <a data-bind="click: togglePaypalBox" class="toggler show-details smallspace"> more info </a> </p>
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
                  <div class="more"> add more: <span class="controlTip"> &nbsp; tell your fans about bonus items, hidden tracks, etc. </span>
                    <?php echo $form->textArea($model, 'downLoadDescription'); ?>
                  </div>
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
         <div class="album-image-block hide">
         </div>	
          <div class="image-upload-hint">            
				<br /><br />
				<?php
				$albumUrl = Yii::app()->request->baseUrl.'/images/albums/';
				$getAlbumImage = CController::createUrl('artist/getAlbumImage');
				
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
					'id'=>'uploadFile',
					'config'=>array(
					'action'=>Yii::app()->createUrl('artist/upload'),
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
      <dd>
      	<?php echo $form->textField($model, 'artist', array('placeholder' => 'leave blank to use band name')); ?>
        <?php echo $form->error($model, 'artist'); ?>
        <p class="controlTip"> for compilations, labels, etc. </p>
        <div class="alert"> </div>
      </dd>
      <dt> <?php echo $form->label($model, 'description'); ?>: </dt>
      <dd>
      	<?php echo $form->textArea($model, 'description', array('placeholder' => '(optional)')); ?>
      </dd>
      <dt> <?php echo $form->label($model, 'credits'); ?>: </dt>
      <dd>
      <?php echo $form->textArea($model, 'credits', array('placeholder' => '(optional)')); ?>
      <?php echo $form->error($model, 'credits'); ?>
      </dd>
      <dt> <?php echo $form->label($model, 'tags'); ?>: <span class="bandtag"> rock </span>, <span class="bandtag"> folk </span>, <span class="bandtag"> Rock </span>,
        
        
        and… </dt>
      <dd class="bottom-border"> <span class="acWidget">
      <?php echo $form->textField($model, 'tags', array('placeholder' => 'comma-separated list of tags')); ?>
      <?php echo $form->error($model, 'tags'); ?>
        </span>
        <div class="suggestion"> </div>
        <div class="alert"> </div>
        <div class="whylink controlTip"> <a  href="http://blog.bandcamp.com/2010/02/11/oh-no-not-another-music-community"> Why bother tagging? </a> </div>
      </dd>
      <dt> <?php echo $form->label($model, 'upc_ean'); ?>: </dt>
      <dd>
        <?php echo $form->textField($model, 'upc_ean', array('placeholder' => '(optional)')); ?>
        <?php echo $form->error($model, 'upc_ean'); ?>
        <div class="alert"> </div>
        <div class="controlTip"> e.g., "027616 852809" <a  href="https://bandcamp.com/help/soundscan"> more info </a> </div>
      </dd>
    </dl>
  </div>
  <div class="left-panel-container">
    <div class="left-panel">
      <div class="art "> 
        <div class="blank album-image-thumnail"><img src="" alt="" width="70" height="70" /></div>
      </div>
      <div class="album-title-artist">
        <p id="albumTitleArtist" class="title"> Untitled Album </p>
        <p class="by"> by <span class="artist"> <?php echo $user->name; ?> </span> </p>
        <p class="release-date"> </p>
        <div class="summary">
          <ul>
            <li class="price last-child" id="albumPriceInfo"> $7.00 or more </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tracks bottom-border">
  <h3 class="h3-audio"> Tracks <span class="controlHint"> uploading <span class="upload-count"> x tracks </span>, <span class="percent"> x </span>% complete, <span class="eta"> mm:ss </span>remaining </span> </h3>
  <ol class="tracks ui-sortable" style="">
    <li class="add-audio">
      <div class="left-panel audio-upload add-audio">
        <div class="html5-upload-wrapper" style="position: relative; display: inline-block; cursor: pointer; margin: 0px;">
          <div class="input-wrapper" style="position: absolute; overflow: hidden; width: 3px; height: 3px; top: 18.4667px; left: 28px;">
            <input type="file" style="position: absolute; opacity: 0; z-index: 10000; cursor: pointer; right: -1em; top: -0.5em;">
          </div>
          <a href="/no_js/upload_audio?newTrack=1" class="add-audio" style="margin: 0px;"> add track </a> </div>
        <div class="without-audio"> <a class="menu"> <span class="bc-ui menu-triangle"> </span> </a> <a class="add-track"> add track w/o audio </a> </div>
        <span class="controlHint"> 291MB <a  href="https://bandcamp.com/help/uploading#maxupload"> max </a>per track, lossless <a  href="https://bandcamp.com/help/uploading#aiffwavuploadrequirement"> .wav, .aif or .flac </a> </span>
        <p class="pro-notice"> Uploading a lot of tracks? <a  href="/pro?from=b&amp;id=1544826807"> Bandcamp Pro </a> features batch upload, private streaming, and more. <a  href="/pro?from=b&amp;id=1544826807" class="b"> Get details… </a> </p>
      </div>
    </li>
  </ol>
  <div class="deleted-tracks"> </div>
</div>


<div class="save">
  <div id="save-buttons">
    <div class="draft-buttons"> 
    <?php echo CHtml::submitButton('Save',array('class' => 'saveButton'));  ?>
    </div>
    <h4> Publish </h4>
    <dl class="visibility-radios">
      <dd class="public row">
        <div class="first-column">
<?php echo $form->radioButton($model, 'visibility', array('value'=>1,'uncheckValue'=>null)); ?>
        </div>
        <div class="second-column">
          <label for="public-radio"> public </label>
        </div>
      </dd>
      <dd class="private row">
        <div class="first-column">
          <?php echo $form->radioButton($model, 'visibility', array('value'=>0,'uncheckValue'=>null)); ?>
        </div>
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
    <div data-bind="visible: publish_warning_visible" class="publish-warning controlTip" style="display: none;"> 
      <!-- ko if: persist_action() === 'publish' --> 
      Publishing 
      <!-- /ko --> 
      <!-- ko if: persist_action() === 'save' --><!-- /ko --> 
      this album will immediately grant it to your <a href="/subscribers"> <span data-bind="text: subscriber_count"> </span> <span data-bind="pluralize: subscriber_count, singleText: 'subscriber'"> subscribers </span>. </a> </div>
    <div data-bind="visible: free_warning_visible" class="publish-warning controlTip" style="display: none;"> Free albums aren't automatically granted to your subscribers, but can be downloaded individually. </div>
    <div data-bind="visible: subscription_bonus_item() &amp;&amp; is_free()" class="publish-warning controlTip" style="display: none;"> Subscription bonus items can't be free. </div>
  </div>
</div>
<?php $this->endWidget(); ?>
