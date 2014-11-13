<li class="track selectable streaming-enabled nyp downloadable <?=$selected?>">
<div class="right-panel">   
    <dl class="track-panel part-of-album ">
      <dt class="hiddenAccess"><?php echo CHtml::activeLabel($track,'name'); ?></dt>
      <dd class="bottom-border track-title">
        <div class="jquery-placeholder-wrapper">          
          <?php echo CHtml::activeTextField($track,'name['.$trackId.']',array('value'=>$track->name, 'class'=>'title trackName', 'placeholder'=>'track name')) ?>
        <div class="alert trackAlert"></div>
        </div>
        <div class="include-in-preorder"> <strong>During Pre-order:</strong>
          <label class="disabled">
            give this track to fans when they pre-order the album (also allows fans to stream this track during the pre-order) </label>
          <div class="show-if-private"> Bonus tracks cannot be included in the preorder. </div>
        </div>
      </dd>
      <dd class="download-settings bottom-border">
        <p class="show-if-private"> <span class="show-if-part-of-album"> Bonus tracks are not visible to fans, but are included in the download of the album and </span> <span class="hide-if-part-of-album"> Private tracks </span> can be made available via <a href="/tools#dl_codes" target="_blank">download codes</a>. </p>
        <p class="show-if-subscriber-only"> Subscriber-only items are given to all of your subscribers when published. They are inaccessible to everyone else. Subscriber-only items can also be made available via <a href="/tools#dl_codes" target="_blank">download codes</a>. </p>
        <div style="display:none;" class="streaming">
        </div>        
        <?php 		
		echo CHtml::activeLabel($track,'downloadable'); ?>
        <?php echo CHtml::activeCheckBox($track,'downloadable['.$trackId.']', array('checked'=>($track->downloadable == 1) ? 'checked':'','class'=>'track-downloadable')); ?>        
        <div class="track-download-options <?php if(!$track->isNewRecord && !$track->downloadable) echo "hide"; ?>">
          <dl data-bind="animateVisible: downloadable, animationType: 'slide'" class="" style="">
            <dt data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="pricing">track pricing: <a href="https://bandcamp.com/help/selling#pricing_performance" style="margin-left:180px; font-size:11px;" target="_blank">What pricing performs best?</a> </dt>
            <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="">
              <label class="price">
             <?php echo CHtml::activeTextField($track, 'price['.$trackId.']', array('value'=>$track->price, 'class'=>'price trackPrice')); ?>
              &nbsp; <a href="https://bandcamp.com/help/currencies?from_editor&amp;band_id=26565885' }" target="_blank" class="currency-plural">US Dollars</a>
              <div class="alert"></div>
              </label>
              <p class="controlTip">enter zero or more</p>
              <label>
                <?php echo CHtml::activeCheckBox($track, 'payMore['.$trackId.']', array('checked'=>($track->payMore == 1) ? 'checked':'', 'class'=>'trackPayMore')); ?>
                let fans pay <span class="hide-if-free">more</span> if they want </label>
              <p class="controlTip allowpaymore">Are you sure you don't want to at least give fans the <em>option</em> to pay you? Fans want to support the artists they love, and when they do your release will be added to their Bandcamp collection (which promotes it to even more fans, and also means your supporters can listen to it in <a target="_blank" href="http://blog.bandcamp.com/2013/10/25/its-over/">the Bandcamp app</a>). We couldn't say it any better than <a target="_blank" href="http://hi54lofi.com/blog/bandcamp-musicians-why-name-your-price-no-minimum-is-better-than-a-free-download">this guy</a>.</p>
              <div style="display:none;" class="show-if-free">
                <label>
                  <input type="checkbox" value="1" name="track.require_email_0">
                  require email address <span class="show-if-nyp">if fan enters zero</span> <a class="smallspace" target="_blank" href="https://bandcamp.com/help/mailing_list#requireemail">more info</a> </label>
                <p> You have 200 free downloads remaining this month. <a class="smallspace" target="_blank" href="/tools#free_dls">more info / buy credits</a> </p>
              </div>
            </dd>
            <dt data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }, visible: payment_details_visible" class="hiddenAccess">payments go to:</dt>
            <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }, visible: payment_details_visible" class="disabled-when-private">
              <div data-bind="with: payment_settings" class="payment">
                <div data-bind="css: {expanded: box_expanded}" class="box">
                  <p> Payments will go to <span data-bind="text: paypal_email" class="email">check123@check123.com</span> via PayPal. <a data-bind="click: togglePaypalBox" class="toggler show-details smallspace paymentMoreInfoLink">more info</a> </p>
                  
                  <!-- ko if: $parent.payment_editable --><!-- /ko --> 
                  <!-- ko if: !$parent.payment_editable() && !user_owns_label() && label() --><!-- /ko --> 
                  <!-- ko if: show_paypal_setup_info -->
                  <div class="paymentMoreInfo hide">
                  <p class="details"> When a fan buys your music, the money will go directly to the above address via PayPal. If this is not your correct PayPal address, please visit your <a data-bind="attr: {href: paypal_setup_url}" class="profile" target="_blank" href="https://bandcamp.com/profile?id=26565885#paypal_address">Profile page</a> to change it. </p>
                  <p class="details"> If you do not yet have a PayPal account, kindly follow <a href="https://bandcamp.com/payment_setup" target="_blank">these instructions</a> to set one up. </p>
                  <p class="details"> Once your PayPal address is correct, please read <a href="https://bandcamp.com/payment_setup" target="_blank">Sell Your Music on Bandcamp</a> to complete the setup, and be sure to review our <a href="https://bandcamp.com/pricing" target="_blank">pricing page</a>. </p>
                  <!-- /ko -->
                  
                  <p class="details"> <a id="paymentMoreInfoHide" data-bind="click: togglePaypalBox" class="toggler">hide</a> </p>
                  </div>
                </div>
              </div>
            </dd>
            <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="description">
              <div class="expander"> <span class="add-more"> <a href="#">download description</a> </span>
                <div style="display:none;" class="description-expanded">
                  <div>download description:</div>
                  <div class="controlTip">The following text appears by default:</div>
                  <div class="description-text item_desc"> Includes unlimited streaming via the free Bandcamp app, plus high-quality download in MP3, FLAC and more. </div>
                  <div class="more">add more:
                    <?php echo CHtml::activeTextArea($track, 'downLoadDescription['.$trackId.']',array('value'=>$track->downLoadDescription)); ?>
                  </div>
                  <div class="desc-close"><a class="toggler">hide</a></div>
                </div>
              </div>
            </dd>
          </dl>
        </div>
      </dd>
      <dt>about this track:</dt>
      <dd>
       <?php echo CHtml::activeTextArea($track, 'description['.$trackId.']',array('value'=>$track->description)); ?>
      </dd>
      <dt class="lyrics">lyrics: <a target="_blank" href="https://bandcamp.com/help/editing#add_lyrics">Why add lyrics? I dislike typing.</a></dt>
      <dd>
       <?php echo CHtml::activeTextArea($track, 'lyrics['.$trackId.']',array('value'=>$track->lyrics)); ?>
      </dd>
      <dt>track credits:</dt>
      <dd class="bottom-border">
        <?php echo CHtml::activeTextArea($track, 'trackCredits['.$trackId.']',array('value'=>$track->trackCredits)); ?>
      </dd>
      <dt>artist:</dt>
      <dd>
      <?php echo CHtml::activeTextField($track, 'artist['.$trackId.']',array('value'=>$track->artist,'placeholder'=>'leave blank to use album artist')); ?>
        <p class="controlTip">for compilations, labels, etc.</p>
        <div class="alert"></div>
      </dd>
      <dt class="hiddenAccess">artwork upload</dt>
      <dd class="art-upload bottom-border">
        <p class="show-if-part-of-album"> Track artwork defaults to use the album artwork. If you would like track art that differs from album art, upload specific track art here. </p>
        <div class="blank">
        <?php if($track->isNewRecord){?>
        	<div class="track-image-block hide"></div>
        <?php } else if($track->image) { ?>
        	<div class="track-image-block">
            <img src="<?=Yii::app()->request->baseUrl?>/timthumb.php?src=<?=Yii::app()->request->baseUrl;?>/images/tracks/<?=$track->image;?>&w=210&h=210&zc=1" alt="" />
            <a href="javascript:void(0);" class="track-image-delete"></a>			
            </div>
		<?php } else { ?>
        	<div class="track-image-block hide"></div>
        <?php } ?>
        
          <div class="image-upload-hint <?php if(!$track->isNewRecord && $track->image){?>hide<?php } ?>">
            <div class="html5-upload-wrapper" style="position: relative; display: inline-block; cursor: pointer; margin: 60px 0px 0px;">
              <div class="input-wrapper" style="position: absolute; overflow: hidden; width: 3px; height: 3px;">
              </div>
			<?php
				$getTrackImage = CController::createUrl('artist/getTrackImage');
				$this->widget('ext.EAjaxUpload.EAjaxUpload',
				array(
				'id'=>'uploadTrackFile_'.$trackId,
				'config'=>array(
				'action'=>Yii::app()->createUrl('artist/trackArtUpload'),					
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
						data: { "imageName": file },
        				success: function(data) { 
							$("ol.tracks li.track.selected .right-panel .image-upload-hint").hide();
							$("ol.tracks li.track.selected .right-panel .track-image-block").html(data); 							
							$("ol.tracks li.track.selected .right-panel .track-image-block").show();
							$("ol.tracks li.track.selected .right-panel .trackImageField").val(file);							
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
            <p class="hint"> 700 x 700 pixels minimum <br>
              (bigger is better)<br>
              <br>
              .jpg, .gif or .png, 4MB max </p>
          </div>          
        </div>
      </dd>
      <dt> tags: <span class="bandtag">Rock</span>,
        
        
        and… </dt>
         <?php echo CHtml::activeHiddenField($track, 'image['.$trackId.']', array('value'=>$track->image, 'class' => 'trackImageField')); ?>
      <dd class="bottom-border"> <span class="acWidget">
       <?php echo CHtml::activeTextField($track, 'tags['.$trackId.']',array('value'=>$track->tags,'placeholder'=>'comma-separated list of tags')); ?>
        
        </span>
        <div class="suggestion"></div>
        <div class="alert"></div>
        <div class="whylink controlTip"> <a target="_blank" href="http://blog.bandcamp.com/2010/02/11/oh-no-not-another-music-community">Why bother tagging?</a> </div>
      </dd>      
      
      <dt>track ISRC:</dt>
      <dd class="bottom-border">
        <?php echo CHtml::activeTextField($track, 'ISRC['.$trackId.']',array('value'=>$track->ISRC,'placeholder'=>'(optional)')); ?>
        <div class="alert"></div>
        <div class="controlTip">e.g., "US-Z04-99-32243" <a target="_blank" href="https://bandcamp.com/help/soundscan">more info</a></div>
      </dd>
      <dt class="release-date">release date:</dt>
      <dd class="release-date bottom-border">
        <?php
			$rdate = '';
			if($track->releaseDate)
			$rdate =  date('m/d/Y',strtotime($track->releaseDate));
			
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $track,				
				'name'=>'releaseDate['.$trackId.']',
     			'value'=>$rdate,
				'options' => array(       
					'dateFormat' => 'mm/dd/yy',
				),
				'htmlOptions' => array(
					'size' => '10',
					'maxlength' => '10',
					'id'=>'Tracks_releaseDate_'.$trackId,
				),
			));
        ?>
        <span class="controlTip">mm/dd/yyyy</span> <span class="controlTip show-if-part-of-album">leave blank to use album release date</span>
        <div class="alert"></div>
      </dd> 
    </dl>
  </div>
  <div class="left-panel-container">
    <div class="left-panel">
      <div class="info">
        <div class="drag-thumb"><span class="bc-ui">=</span></div>
        <div class="featured-star bc-ui">*</div>
        <div class="delete round3">        
		<?php
		if($trackFile){
        echo CHtml::tag('span',array(
            'onClick'=>CHtml::ajax(array(			
            'type'=>'POST',
            'url'=>array('artist/removeAlbumTrack'),
            'data'=>array('trackFile' =>$trackFile),
            'success'=>'function(data) {
            }',				
            'update'=>'',
            )
            ),
            'class'=>'bc-ui',
            'id'=>'delete',
            ),'',true
        );
		}else{
			echo '<span class="bc-ui" id="delete"></span>';
		}
        ?>        
        </div>
        <p class="title"><?php if($track->isNewRecord) { echo "Untitled Track"; }else{ echo $track->name; } ?></p>
        <p class="featured-note"> <strong>Featured:</strong> this is the track that will be cued up when fans visit or embed the album, and it's also the track that will play in <a href="http://bandcamp.com/discover?from=edittralbum" target="_blank">Discover</a>. </p>
        <div class="audio-upload">
          <div class="no-audio"> <span class="no-audio"><?=$trackFile?></span> <!--<span class="bar">|</span>-->
            <div class="html5-upload-wrapper" style="position: relative; display: inline-block; cursor: pointer; margin: 0px;">
              <div class="input-wrapper" style="position: absolute; overflow: hidden; width: 3px; height: 3px;">
              </div>
              <!--<a href="/no_js/upload_audio?index=0" class="replace" style="margin: 0px;">add audio</a>--></div>
          </div>
          <div class="progress-wrapper"> <span class="filename"></span> <span class="status"></span> <span class="bar">|</span> <a class="cancel">cancel</a>
            <div class="upload-progress"></div>
          </div>
        </div>
        <div class="summary <?php if(!$track->isNewRecord && !$track->downloadable) echo "hide"; ?>">
          <ul>
            <li>downloadable</li>
            <li class="price last-child">$<?php if($track->isNewRecord){ echo '1.00 or more'; }else{ echo $track->price; if($track->payMore) echo ' or more'; } ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php 
  echo CHtml::activeHiddenField($track,'id['.$trackId.']',array('value'=>$track->id));
  echo CHtml::activeHiddenField($track,'fileName['.$trackId.']',array('value'=>$trackFile));
  ?>
  <!-- end left-panel container --> 
</li>
