<script type="text/javascript">
$(function(){
	
	$(".audioPlay").click(function(){	
		
		var file = "<?=Yii::app()->homeUrl;?>audio/"+$(this).val();
		
		if($("#jp_audio_0").attr("src") != file)
		$("#jp_audio_0").attr("src",file);
		$(".jouele-play").click();
		$(".jouele-name").text($(this).attr('name'));		
		$('.audioPlay').show();
		$('.audioPause').hide();
		$(this).hide();
		$(this).next('.audioPause').show();
	});
	
	$(".audioPause").click(function(){
		$(".jouele-pause").click();
		$(this).hide();
		$('.audioPlay').show();
	});
	
	$(".jouele-play").click(function(){
		var text = $(".jouele-name").text();
		$(".audioPlay[name='"+text+"']").hide();
		$(".audioPlay[name='"+text+"']").next('.audioPause').show();
	});
	$(".jouele-pause").click(function(){
		var text = $(".jouele-name").text();
		$(".audioPlay[name='"+text+"']").show();
		$('.audioPause').hide();
	});
	
	$("a.contactOwner").click(function(){
		$("#contactForm").dialog({minWidth: 650});		 
	});
	
	$("#buyAlbum").click(function(){
		$("#buyAlbumBlock").dialog({minWidth: 650});		 
	});
	
	$("#contactCancel").click(function(){
		 $("#contactForm").dialog("close");		 
	});
	
	$("#embedAlbum").click(function(){
		 var url = $(this).attr('href');
		 showDialog(url);
		  return false;
		//$('#embedAlbumDialog').dialog('open');
	});
	
	$("#embedAlbumDialog").dialog({  //create dialog, but keep it closed
		autoOpen: false,
		height: 650,
		width: 900,
		modal: true
	});
	
	$("a.bio-text-add").click(function(){
		$(this).hide();
		$(".edit-bio-form").show();
	});
	$(".cancel-bio-edit").click(function(){
		$(".bio-info-text ").show();
			$(".edit-bio-form").hide();
			$(".bio-text-edit").show();	
	});
	$(".bio-text-edit").click(function(){
		$(".edit-bio-form").show();
		$(".bio-info-text").hide();	
		$(".bio-text-edit").hide();	
	});	
	
	/*var max = 400;
	if($('#artistDescription').val().length)
	max = max - $('#artistDescription').val().length;
	$('#characterLeft').text(max+' characters left');*/
	
	$('#artistDescription').keyup(function () {		
		var max = 400;
		var len = $(this).val().length;
		if (len >= max) {
			$('#characterLeft').text(' you have reached the limit');
		} else {
			var ch = max - len;
			$('#characterLeft').text(ch + ' characters left');
		}
	});
	
	$("#designAlubm").click(function(){
		$("#designBlock").dialog({minWidth: 650});
	});
	$("#designClose").click(function(){
		// $("#designBlock").dialog("close");	
		  location.reload();	 
	});
	
	/*Color Picker Start*/
	var f = $.farbtastic('#picker');
	var p = $('#picker').css('opacity', 0.25);
	var selected;
	$('.colorwell')
	.each(function () { f.linkTo(this); $(this).css('opacity', 0.75); })
	.focus(function() {
	if (selected) {
	  $(selected).css('opacity', 0.75).removeClass('colorwell-selected');
	}
	f.linkTo(this);
	p.css('opacity', 1);
	$(selected = this).css('opacity', 1).addClass('colorwell-selected');
	});
	/*Color Picker End*/
	
	$("#Design_bodyColor").attrchange({
		
		trackValues: true,
		callback: function(evnt) {			
		    $(".container").css({"background-color":$(this).css("background-color")});
		}
	});
	$("#Design_backgroundColor").attrchange({
		trackValues: true,
		callback: function(evnt) {
		   $("body").css({"background-color":$(this).css("background-color")});
		}
	});
	$("#Design_textColor").attrchange({
		trackValues: true,
		callback: function(evnt) {
		   $("h3.title").css({"color":$(this).css("background-color")});
		}
	});
	$("#Design_linkColor").attrchange({
		trackValues: true,
		callback: function(evnt) {
		   $(".rightColumn a").css({"color":$(this).css("background-color")});
		}
	});
	$("#Design_secondaryTextColor").attrchange({
		trackValues: true,
		callback: function(evnt) {
		   $(".secondaryText").css({"color":$(this).css("background-color")});
		}
	});	
	$("#removeBg").click(function(){
		$("#Design_backgroundImage").val("");			
		$("body").css("background-image", "none");
		$("#siteBackgrondImageDelete").hide();						
		$("#siteBackgrondImage").show();
	});
});

function showDialog(url){  //load content and open dialog
    $("#embedAlbumDialog").load(url);
    $("#embedAlbumDialog").dialog("open");         
}
</script>
<?php if(Yii::app()->user->hasFlash('contact')): ?>
<div class="flash-success"> <?php echo Yii::app()->user->getFlash('contact'); ?> </div>
<?php endif; ?>
<div id="customHeaderWrapper">
  <?php $this->renderPartial('header-block', array('model' => $model)); ?>
</div>
<?php if(isset($_GET['album'], $_GET['track'])){ ?>
<div itemtype="http://schema.org/MusicAlbum" itemscope="" class="trackView leftMiddleColumns has-art">
  <div id="name-section">
    <h2 itemprop="name" class="trackTitle">
      <?=$track->name;?>
    </h2>
    <h3 style="margin:0px;">by <span itemprop="byArtist">
      <?=$track->artist;?>
      </span> </h3>
  </div>
  <div class="middleColumn">
    <div id="tralbumArt">
      <?php if($track->image): ?>
      <a href="<?=Yii::app()->request->baseUrl.'/images/tracks/'.$track->image;?>" class="popupImage" data-lightbox="example-1"><img itemprop="image" alt="Track cover art" src="<?=Yii::app()->request->baseUrl.'/images/tracks/'.$track->image;?>"> </a>
      <?php elseif($album->image): ?>
      <a href="<?=Yii::app()->request->baseUrl.'/images/albums/'.$album->image;?>" class="popupImage" data-lightbox="example-1"><img itemprop="image" alt="Album1 cover art" src="<?=Yii::app()->request->baseUrl.'/images/albums/'.$album->image;?>"> </a>
      <?php else: ?>
      <div style="padding:85px;">To add cover art, edit this track.</div>
      <?php endif; ?>
    </div>
  </div>
  <div class="leftColumn" id="trackInfo">
    <div id="trackInfoInner">
      <?php if(Yii::app()->user->getId() == $model->user->id): ?>
      <ul id="editDeleteCommands" style="visibility: visible;">
        <li> <?php echo CHtml::link('Edit', array('artist/editAlbum','domain'=>$model->url, 'slug'=>$album->slug)); ?> </li>
        <li> <?php echo CHtml::link('Delete', array('artist/deleteTrack','domain'=>$model->url, 'album'=>$album->slug, 'track' => $track->slug),array('onclick'=>'return confirm("Are you sure you want to permanently delete this track?")')); ?> </li>
      </ul>
      <?php endif; ?>
      <div class="inline_player desktop-view">
        <?php
			if($track->fileName){ 
			$this->widget('ext.jouele.Jouele', array(
				'file' => Yii::app()->request->baseUrl.'/audio/'.$track->fileName,
				'name' => $track->name,
				'htmlOptions' => array(
				'class' => 'jouele-skin-silver',
				)
			));
			}			
        ?>
      </div>
      <div class="inline_player phone-view">
        <div class="inline_player_inner"> <a alt="Play/pause" class="playbutton"><span class="icon"></span></a><span class="time time_elapsed">00:00</span>
          <div class="progbar">
            <div class="progbar_empty">
              <div class="progbar_fill" style="width: 0%;"></div>
            </div>
            <div class="thumb" id="yui-gen1" style="left: 0px;"></div>
          </div>
          <span class="time time_total">00:05</span><a alt="Previous track" class="nextprev prevbutton hiddenelem"><span class="icon"></span></a><a alt="Next track" class="nextprev nextbutton"><span class="icon"></span></a> </div>
        <div class="track_info title-section"> <span class="title">Track1</span><a class="video-link is-hidden">video</a> </div>
      </div>
      <div class="tralbumData tralbum-about">
        <p>
          <?=$album->description;?>
        </p>
        <p>Release Date :
          <?=$track->releaseDate;?>
        </p>
        <p>
          <?=$album->credits;?>
        </p>
      </div>
      <div class="tralbumData tralbum-credits"> from
        <?=CHtml::link($album->name,array('artist/site','domain'=>$model->url, 'album'=>$album->slug))?>
        ,
        <?php if($album->releaseDate) echo date('j F Y',strtotime($album->releaseDate)); ?>
      </div>
      <br />
      <h3 class="tags-label">tags</h3>
      <div class="tralbumData tralbum-tags"> <span class="tags-inline-label">tags:</span>
        <?=$album->tags;?>
      </div>
    </div>
  </div>
</div>
<?php } else if(isset($_GET['album'])){ ?>
<div itemtype="http://schema.org/MusicAlbum" itemscope="" class="trackView leftMiddleColumns has-art">
  <div id="name-section">
    <h2 itemprop="name" class="trackTitle">
      <?=$album->name;?>
    </h2>
    <h3 style="margin:0px;">by <span itemprop="byArtist">
      <?=$album->artist;?>
      </span> </h3>
  </div>
  <div class="middleColumn">
    <div id="tralbumArt">
      <?php if($album->image): ?>
      <a href="<?=Yii::app()->request->baseUrl.'/images/albums/'.$album->image;?>" class="popupImage" data-lightbox="example-1"><img itemprop="image" alt="Album1 cover art" src="<?=Yii::app()->request->baseUrl.'/images/albums/'.$album->image;?>"> </a>
      <?php else: ?>
      <div style="padding:85px;">To add cover art, edit this album.</div>
      <?php endif; ?>
    </div>
    <div> <br />
      <h3><a href="<?=Yii::app()->request->baseUrl.'/artist/embedAlbum?album='.$album->slug;?>" id="embedAlbum">Embed Album</a></h3>
      <div id="embedAlbumDialog"> </div>
    </div>
  </div>
  <div class="leftColumn" id="trackInfo">
    <div id="trackInfoInner">
      <?php if(Yii::app()->user->getId() == $model->user->id): ?>
      <ul id="editDeleteCommands" style="visibility: visible;">
        <li> <?php echo CHtml::link('Edit', array('artist/editAlbum','domain'=>$model->url, 'slug'=>$album->slug)); ?> </li>
        <li> <?php echo CHtml::link('Delete', array('artist/deleteAlbum','domain'=>$model->url, 'slug'=>$album->slug),array('onclick'=>'return confirm("Are you sure you want to permanently delete this album?")')); ?> </li>
      </ul>
      <?php endif; ?>
      <div class="inline_player desktop-view">
        <?php
	  
	  if($album->tracks): 
			
			if($album->tracks[0]->fileName){ 
			$this->widget('ext.jouele.Jouele', array(
				'file' => Yii::app()->request->baseUrl.'/audio/'.$album->tracks[0]->fileName,
				'name' => $album->tracks[0]->name,
				'htmlOptions' => array(
				'class' => 'jouele-skin-silver',
				)
			));
			}
			echo '<ul class="tracksList">';
			foreach($album->tracks as $track){
				if($track->fileName){	
				?>
        <li>
          <button value="<?=$track->fileName?>" name="<?=$track->name;?>" class="audioPlay"></button>
          <button name="audioPause" value="" class="audioPause hide"></button>
          <?php echo CHtml::link($track->name, array('artist/site','domain'=>$model->url,'album'=>$album->slug,'track'=>$track->slug)); ?> </li>
        <?php }
			}
			echo '</ul>';
		endif;
		
        ?>
      </div>
      <h4 class="ft compound-button">
        <button type="button" id="buyAlbum" class="download-link buy-link">Buy Now</button>
        <span class="buyItemExtra buyItemNyp secondaryText"> $ <?php echo $album->price; ?>
        <?php if($album->payMore == 1) echo "or more"; ?>
        </span> </h4>
      <div id="buyAlbumBlock" class="hide" title="<?=$album->name;?>">
        <div class="bd footerless">
          <div class="buy-dlg">
            <form accept-charset="utf-8" action="<?=Yii::app()->request->baseUrl;?>/payment/index" method="POST" id="fan_email">             
              <div class="section">
                <div class="pricing-ui">
                  <div class="price">
                    <h3 id="nyp-header">Name your price</h3>
                    <span class="display-price nyp-symbol"></span> <span>
                    <input type="text" class="display-price numeric" id="albumPrice" name="albumPrice" value="<?=$album->price;?>">
                    <span class="nyp-summary"> <span class="secondary"> $
                    (<?php echo $album->price; ?>
        <?php if($album->payMore == 1) echo "or more"; ?>) </span> </span> </span> </div>
                  <div> </div>
                </div>
                <div id="userPrice_alert" class="alert"></div>
              </div>
              <div class="section format-section"> Includes unlimited streaming via the free Bandcamp app, plus high-quality download in MP3, FLAC and <a target="_blank" href="/faq_downloading#format">more</a>. </div>
              <div class="section notify-me-section">
                <label for="notify-me">
                <div class="checkbox-wrapper">
                  <input type="checkbox" data-bind="checked: false" name="notify-me" id="notify-me">
                </div>
                <div class="notify-me-message">Email me when J-Zone releases new music or has other updates.</div>
                </label>
              </div>
              <div style="display:none" class="email-section section" id="email-section">
                <div class="subsection">
                  <div>Email a link to my free download to:</div>
                  <input type="email" title="email address" class="textInput" onkeydown="return ChargeEmail.filter_returnkey()" id="fan_email_address" name="address">
                  <div class="small-text">Your email address won't be shared with <nobr>third parties.</nobr></div>
                </div>
                <div class="subsection"> You'll be added to the J-Zone mailing list, from which you can unsubscribe at any time. </div>
                <div class="alert" id="fan_email_error"></div>
              </div>
              <div class="section buttons-section">
                <div id="downloadButtons_paypal">
                  <div class="ft fakeFt">
                    <div class="checkout-button-wrapper">
                      <button onclick="TralbumDownload.checkout(); return false" name="submit" type="subbmit">Check out now</button>
                      <div class="small-text">(with this and the rest of your cart)</div>
                      <div class="cc-strip small-text"> <img alt="We accept Visa, MasterCard, American Express, Discover, and PayPal" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ccardspp.gif">
                        <div>PayPal is not required. <a target="_blank" href="http://bandcamp.com/buying_without_paypal">Show me</a>.</div>
                      </div>
                    </div>
                    <div class="or">or</div>
                    <div class="cart-button-wrapper">
                      <button onclick="TralbumDownload.checkout('cart'); return false" type="button">Add to cart</button>
                      <div class="small-text">(and check out later)</div>
                    </div>
                  </div>
                </div>
                <div style="display:none;" id="downloadButtons_email">
                  <div class="ft fakeFt">
                    <button onclick="TralbumDownload.checkout(); return false" type="button">OK</button>
                  </div>
                </div>
                <div style="display:none;" id="downloadButtons_download">
                  <div class="ft fakeFt">
                    <button onclick="TralbumDownload.checkout(); return false" type="button">Download Now</button>
                  </div>
                </div>
                <div style="clear:both;"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="inline_player phone-view">
        <div class="inline_player_inner"> <a alt="Play/pause" class="playbutton"><span class="icon"></span></a><span class="time time_elapsed">00:00</span>
          <div class="progbar">
            <div class="progbar_empty">
              <div class="progbar_fill" style="width: 0%;"></div>
            </div>
            <div class="thumb" id="yui-gen1" style="left: 0px;"></div>
          </div>
          <span class="time time_total">00:05</span><a alt="Previous track" class="nextprev prevbutton hiddenelem"><span class="icon"></span></a><a alt="Next track" class="nextprev nextbutton"><span class="icon"></span></a> </div>
        <div class="track_info title-section"> <span class="title">Track1</span><a class="video-link is-hidden">video</a> </div>
      </div>
      <div class="tralbumData tralbum-about">
        <p>
          <?=$album->description;?>
        </p>
        <p>Release Date :
          <?=date('j F Y',strtotime($album->releaseDate));?>
        </p>
        <p>
          <?=$album->credits;?>
        </p>
      </div>
      <h3 class="tags-label">tags</h3>
      <div class="tralbumData tralbum-tags"> <span class="tags-inline-label">tags:</span>
        <?=$album->tags;?>
      </div>
    </div>
  </div>
</div>
<?php } else { ?>
<div class="leftMiddleColumns">
  <ol data-edit-callback="/music_reorder" class="editable-grid music-grid columns-2 editable  ui-sortable">
    <?php foreach($model->albums as $album_list): ?>
    <li class="square first-four" data-band-id="" data-item-id="album-1431979926"> <a href="<?=Yii::app()->request->baseUrl;?>/artist/site?domain=<?=$model->url;?>&album=<?=$album_list->slug;?>">
      <?php if($album_list->image): ?>
      <div class="art"> <img alt="" src="<?=Yii::app()->request->baseUrl;?>/images/albums/<?=$album_list->image;?>" class="lazy" style="display: inline;"> </div>
      <?php else: ?>
      <div class="art empty"> <span class="warningBadge">no art</span> </div>
      <?php endif; ?>
      <p class="title">
        <?=$album_list->name;?>
        <br>
        <?php if($album_list->artist): ?>
        <span class="artist-override">
        <?=$album_list->artist;?>
        </span>
        <?php endif; ?>
      </p>
      </a>
      <div class="drag-thumb">
        <div class="bc-ui"></div>
      </div>
    </li>
    <?php endforeach; ?>
  </ol>
</div>
<?php } ?>
<div class="rightColumn music-page" id="rightColumn">
  <?php $this->renderPartial('right-block',array('model' => $model, 'contactModel'=>$contactModel)); ?>
</div>
<div id="designBlock" title="Edit Design" class="hide">
  <?php $this->renderPartial("design-form",array('design'=>$design)); ?>
</div>
