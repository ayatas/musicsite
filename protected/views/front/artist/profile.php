 <?php
/* @var $this ArtistController */
/* @var $model Artist */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'artist-profile-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<h2>Account Details</h2>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'bandName'); ?>
		<?php echo $form->textField($model,'bandName'); ?>
		<?php echo $form->error($model,'bandName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url').".mymusichut.com "; ?>
		<?php echo $form->error($model,'url'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model1,'location'); ?>
		<?php echo $form->textField($model1,'location'); ?>
		<?php echo $form->error($model1,'location'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model1,'websites'); ?>
		<?php echo $form->textField($model1,'websites'); ?>
		<?php echo $form->error($model1,'websites'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fanEmail'); ?>
		<?php echo $form->textField($model,'fanEmail'); ?>
		<?php echo $form->error($model,'fanEmail'); ?>
         <div style="width:300px; margin-left:175px;">
        <span>This is the address for fan correspondence only.</span><br />
       
        <?php
			echo $form->radioButton($model, 'shoFanEmail', array(
		    'value'=>1,
		    'uncheckValue'=>null,
			'style'=>'float:left; margin:5px 20px  0 0'
		));
		?>
          <label style="float:none; width:auto; font-weight:normal">Show this address on my site.</label>
          <div class="clear:both"></div>
        <?php
			echo $form->radioButton($model, 'shoFanEmail', array(
		    'value'=>0,
		    'uncheckValue'=>null,
			'style'=>'float:left; margin:5px 20px 0 0'
		));
		?>
        <label style="float:none; width:auto; font-weight:normal">Don't show this address on my site.<span style="font-weight:normal"> (We'll show fans a contact form instead.)</span></label>
        </div>
        <?php ?>
	</div>
   <div class="row">
		<?php echo $form->labelEx($model,'genreId'); ?>
		<?php echo $form->dropDownList($model,'genreId', CHtml::listData(Genre::model()->findAll(array('order' => 'name')),'id','name'));?>
		<?php echo $form->error($model,'genreId'); ?><br />
        <div style="width:300px; margin-left:175px;">
        	Your genre selection determines where your music appears in MyMusicHut Discover. It's OK if you don't fit perfectly within one of these - just use the genre tag field, below, to provide more granularity. 
        </div>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'genreTags'); ?>
		<?php echo $form->textField($model,'genreTags'); ?>
		<?php echo $form->error($model,'genreTags'); ?>
        <div style="width:300px; margin-left:175px;">Optional. Use a comma to separate multiple tags. </div>
	</div>
	<div class="row">
    	<label>Termination</label>
        <a href="javascript:void(0);">permanently delete this artist...</a>
    </div>
    <div class="row">
    	<label>Pro</label>
        <a href="javascript:void(0);">MyMusicHut</a> Pro gives you access to batch upload, private streaming, advanced analytics, and more. <a href="javascript:void(0);">Get details…</a>
    </div>
    <h2>Payment Details</h2>
	<div class="row">
		<?php echo $form->labelEx($model,'paypalEmail'); ?>
		<?php echo $form->textField($model,'paypalEmail'); ?>
		<?php echo $form->error($model,'paypalEmail'); ?>
        <p style="padding:0.3em 0.3em 0.3em 0.6em;width:360px; margin-left:175px; background:#fbf693">
                         When a fan buys your music, the money will go directly to 
                         the above address. Please also be sure to 
                         follow the instructions on the <a href="javascript:void(0);" target="_blank">Sell Your Music on MyMusicHut</a> page!</p>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->dropDownList($model,'currency',array('USD'=>'US Dollar(AUD)','AUD'=>'Australian Dollar(AUD)','GBP'=>'British Pound Sterling(GBP)','CAD'=>'Canadian Dollar(CAD)','CZK'=>'Czech Koruna(CZK)','DKK'=>'Danish Krone(DKK)','EUR'=>'Euro','HKD'=>'Hong Kong Dollar(HKD)','HUF'=>'Hungarian Forint(HUF)','ILS'=>'Israeli New Sheqel(ILS)','JPY'=>'Japanese Yen(JPY)','MXN'=>'Mexican Peso(MXN)','NZD'=>'New Zealand Dollar(NZD)','NOK'=>'Norwegian Krone','PLN'=>'Polish Ziloty','SGD'=>'singapore Dollar(SGD)','SEK'=>'Swedish Krona(SEK)','CHF'=>'Swiss Franc(CHF)')); ?>
		<?php echo $form->error($model,'currency'); ?>
        <p style="margin-left:175px;">
                            All sales on your MyMusicHut site will be conducted using this currency.
                            If you change the setting, you will have an opportunity to adjust any
                            existing prices to reflect the new currency.
                            <br><br>For more information, see the 
                            <a href="javascript:void(0);" target="_blank">Currencies</a> page.
                        </p>
	</div>
<h2>Physical Goods</h2>
	<div class="row">
    	<p style="margin-left:175px">You only need to fill out the following if you're selling merch from MyMusicHut.</p>
        <?php echo $form->labelEx($model,'yourLocation')?>
        <?php echo $form->dropDownList($model,'yourLocation', CHtml::listData(Countries::model()->findAll(array('order' => 'countryName')),'countryId','countryName'),array('empty'=>'-Select Country-'))?><br />
    </div>
    <p style="margin-left:175px"> <?php echo Chtml::radiobutton('chargeTax','chargeTax',array('value'=>1))."Charge".$form->textField($model,'taxPercent')."% tax ";?><br />
        <?php echo Chtml::radiobutton('chargeTax','chargeTax',array('value'=>0))."Don't Charge Tax";?><br />
        </p>
         <?php echo $form->labelEx($model,'returnPolicy'); ?>
		<?php echo $form->textArea($model,'returnPolicy'); ?><br />
        <?php echo $form->labelEx($model,'shippingInfo'); ?>
		<?php echo $form->textArea($model,'shippingInfo'); ?>
       
    <h2>Navigation Bar</h2>
    
    <div class="row">
    	<div style="margin-left:175px;">
        	<span>Music link title:</span><br />
        	<?php echo $form->textField($model,'musicLink'); ?>   <span>url: http://<?php $model->url?>.MyMusicHut.com/music</span><br />
            <span>Merch link title:</span><br />
            <?php echo $form->textField($model,'merchLink'); ?>   <span>url: http://<?php $model->url?>.MyMusicHut.com/merch</span>
            <p><?php echo $form->checkBox($model,'showNavigation',array('value'=>1,'uncheckValue'=>0)); ?>&nbsp;&nbsp;Hide navigation bar <br />
            <p style="width:400px">If you would like to use your own custom header image to navigate between pages on MyMusicHut, hide the navigation bar and use a custom image map with the urls above. </p>
            </p>
        </div>
    </div>
    <h2>Custom Header</h2>
    <div style="margin-left:175px;">
    	<p style="width:400px;">These settings apply to the custom header graphic on your MyMusicHut site only (they do not apply to your Facebook header graphic, which is set in the Facebook app section, below). </p>
        <p style="width:400px;"> You don't have a custom header yet. Go to any track or album page, upload your header, and then return here to set these options. </p>
        <p><input type="radio" checked="checked" disabled="disabled" value="0" />Links to:<br /><?php echo $form->textField($model,'customHeader',array('disabled'=>'diabled')); ?></p>
        <p><input type="radio"  disabled="disabled" value="1" /> Uses an image map:<br /><?php echo $form->textArea($model,'customHeader',array('disabled'=>'diabled')); ?><br />list of area tags only </p>
    </div>
    <h2>Custom Domain</h2>
    <p style="margin-left:175px; width:400px;"> 
    	Your MyMusicHut domain is <?php $model->url?>.MyMusicHut.com. You can point your own custom domain (maybe indianrock.com or music.indianrock.com?) to <?php $model->url?> by following the instructions on the Custom Domains page. After completing every last step and checking them twice, enter your domain here:<br /><br />
		MyMusicHut Pro gives you access to this feature, batch upload, and more.  <a href="javascript:void(0);">Get details…</a><br />
                            <input type="text" value="" name="band.custom_domain" disabled="" class="textInput pro-feature" id="band.custom_domain"> <button title="Checks the status of your custom domain" onclick="Profile.testCustomDomain()" class="pro-feature disabled" type="button" id="test-custom-domain-btn" disabled="disabled"><div>Test</div></button>
</p>
<h2>Social Button</h2>
<p style="margin-left:175px;"><?php echo $form->checkBox($model,'showSocial',array('value'=>1,'uncheckValue'=>0)); ?>&nbsp;&nbsp; Show Like and Tweet buttons on my track and album pages.  </p>
	
    <h2>Facebook</h2>
    <p style="padding-left:175px"> To install MyMusicHut in a Facebook page, please refer to the <a href="javascript:void(0);">complete instructions</a>.</p>
    <p><label style="text-align:center">Custom Header</label><div style="margin:5px 0">MyMusicHut pages on Facebook can have a custom header specially sized for the width of a Facebook page.</div></p>
	<h2>Mobile</h2>
    <p><label style="text-align:center">Custom Header</label><div style="margin-left:175px; width:400px;">MyMusicHut pages viewed on mobile devices can have a custom header specially sized for the width of a phone screen. Tapping the header will navigate to your default music page.</div></p>
    <h2>Homepage</h2>
    <p style="padding-left:175px;">
    	When a fan visits my site: <br />
        <?php 
			echo $form->radioButtonList($model,'homePage',array(1=>'go to my latest release',2=>'go to my discography',3=>'go to my merch grid',4=>'go to my index page '));
		?>
    </p>
    <h2>Google Analytics</h2>
    <p style="padding-left:175px;width:400px;">
    You can use Google Analytics to gather detailed statistics about the visitors to your MyMusicHut pages. For setup instructions, see our <a href="javascript:void(0);">Google Analytics FAQ</a>.</p>
    <p style="padding-left:175px; width:400px;"><a href="javascript:void(0);">MyMusicHut Pro</a> gives you access to this feature, batch upload, and more.
    <a href="javascript:void(0);">Get details…</a></p>
    <p><label style="text-align:center">Tracking ID</label><input type="text" name="track_id" disabled="disabled" /></p>
    <h2>Upcoming Shows</h2>
    <p style="margin-left:175px; width:450px;"><?php echo $form->checkBox($model,'upcomingShows',array('value'=>1,'uncheckValue'=>0)); ?>&nbsp;&nbsp;Display upcoming shows <span>powered by</span> <a href="songkick.com" target="_blank">Songkick</a><br /><br />To add or edit shows, use <a href="http://tourbox.songkick.com/" target="_blank">Songkick’s Tourbox</a>. <strong>Note</strong>: MyMusicHut polls for new shows every several hours. Force refresh now.</p>
    <p style="margin-left:175px; width:450px;">
    	<?php echo $form->labelEx($model,'songkickId'); ?>
		<?php echo $form->textField($model,'songkickId'); ?>
		<?php echo $form->error($model,'songkickId'); ?>
    </p>
    <h2>Recommended Albums</h2>
    <p style="margin-left:175px; width:450px;">Let the love flow! Recommend fellow MyMusicHut artists’ albums and watch it all come back to you in spades. Your recommendations will be linked to from your sidebar, shown to fans when they download your music, and displayed in the music discovery tools on MyMusicHut. <a href="javascript:void(0);">It looks like this</a>.</p>
    <div class="row">
		<?php echo $form->labelEx($model,'recommendedheading'); ?>
		<?php echo $form->textField($model,'recommendedheading'); ?>
        <p style="padding-left:175px;">e.g., “Other albums I think you might like” or “Three albums that blow my mind”</p>
        <?php echo $form->labelEx($model,'albumUrl'); ?>
		<?php echo $form->textField($model,'albumUrl'); ?><br />
        <?php echo $form->labelEx($model,'albumDescription'); ?>
		<?php echo $form->textArea($model,'albumDescription'); ?>
	</div>
    <div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->