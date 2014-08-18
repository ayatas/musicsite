<form class="" action="/edit_album_v2" onsubmit="Form.delaySubmitUntilReady(event)" method="post" id="edit-tralbum-form">
    <input type="hidden" value="" name="paypal_aware">
    <div class="top-spacer"></div>
	<div data-bind="css: { 'private': private() }" class="album selectable top-border bottom-border nyp downloadable selected">
 	<div class="right-panel">            
	<input type="hidden" data-bind="value: id" name="album.id" value="">
	<dl class="album-panel">
    <dt class="hiddenAccess">album title:</dt>
    <dd class="album-title">
        <span class="required-asterisk" style="opacity: 1;">*</span><div class="jquery-placeholder-wrapper" style="display: inline-block; position: relative;"><span class="jquery-placeholder-hint controlHint" style="position: absolute; -moz-user-select: none; font-size: 22px; font-family: &quot;Helvetica Neue&quot;,Arial,sans-serif; font-weight: 400; line-height: 26px; top: 6px; left: 12px; right: 11px;">album name</span><input type="text" data-bind="value: title, valueUpdate: 'input'" value="" class="title required force-placeholder-wrapper" name="album.title"></div>
        <div class="alert"></div>
    </dd>
    <!--dt class="hiddenAccess">release date</dt-->
    <dd class="release-date bottom-border">
        <label>
            release date:
            <span class="required-asterisk" style="opacity: 0;">*</span><input type="text" value="" name="album.release_date" placeholder="optional">
            <span class="controlTip">mm/dd/yyyy</span>
            <span class="controlTip hide-if-preorder">leave blank to use publish date</span>
        </label>
        <div class="alert"></div>
        <div class="show-if-preorder"><p><b>Please note:</b> your pre-order will NOT automatically release on this date. <a  href="javascript:void(0);">more info</a></p></div>
    </dd>
    <dt class="hiddenAccess">download settings</dt>
    <dd class="download-settings bottom-border">
        <p class="show-if-private">
            Private albums are not visible to fans but can be made available via
            
            <a href="javascript:void(0);" >download codes</a>.
        </p>
        <p class="show-if-subscriber-only">
            Subscriber-only items are given to all of your subscribers when published. They are inaccessible to everyone else. Subscriber-only items can also be made available via
            
            <a href="javascript:void(0);" >download codes</a>.
        </p>
	<div data-bind="animateVisible: downloadable, animationType: 'slide'" style="">
    <dl data-bind="animateVisible: downloadable, animationType: 'slide'" class="download-options" style="">
        <dt data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="pricing"> pricing:
            <a href="javascript:void(0);" >What pricing performs best?</a>
        </dt>
        <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="">
            <label class="price">
                <input type="text" data-bind="value: price, valueUpdate: 'input'" name="album.price" class="price">
                &nbsp;
                <a href="javascript:void(0);"  class="currency-plural">US Dollars</a>
                <div class="alert"></div>
            </label>
            <p class="controlTip">enter zero or more</p>
            <label>
                <input type="checkbox" data-bind="checked: name_your_price" checked="" value="1" name="album.nyp">
                let fans pay <span class="hide-if-free">more</span> if they want
            </label>
            <p class="controlTip allowpaymore">Are you sure you don't want to at least give fans the <em>option</em> to pay you? Fans want to support the artists they love, and when they do your release will be added to their Bandcamp collection (which promotes it to even more fans, and also means your supporters can listen to it in <a  href="javascript:void(0);">the Bandcamp app</a>). We couldn't say it any better than <a  href="javascript:void(0);">this guy</a>.</p>
            <div style="display:none;" class="show-if-free">
                <label>
                    <input type="checkbox" value="1" name="album.require_email">
                    require email address <span class="show-if-nyp">if fan enters zero</span>
                    <a class="smallspace"  href="javascript:void(0);">more info</a>
                </label>
                <p>
                    You have 200 free downloads remaining this month. <a class="smallspace"  href="javascript:void(0);">more info / buy credits</a>
                </p>
            </div>
        </dd>
        <dt data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }, visible: payment_details_visible" class="hiddenAccess">payments go to:</dt>
        <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }, visible: payment_details_visible" class="disabled-when-private">
            <div data-bind="with: payment_settings" class="payment">
    <div data-bind="css: {expanded: box_expanded}" class="box">
        <p>
            Payments will go to <span data-bind="text: paypal_email" class="email">manikanta@ayatas.com</span> via PayPal.
                <a data-bind="click: togglePaypalBox" class="toggler show-details smallspace">more info</a>
        </p>
         <p class="details">
                When a fan buys your music, the money will go directly to the above address via PayPal. If this is not your correct PayPal address, please visit your <a data-bind="attr: {href: paypal_setup_url}" class="profile"  href="javascript:void(0);">Profile page</a> to change it.
            </p>
            <p class="details">
                If you do not yet have a PayPal account, kindly follow <a href="javascript:void(0);" >these instructions</a> to set one up.
            </p>
            <p class="details">
                Once your PayPal address is correct, please read <a href="javascript:void(0);" >Sell Your Music on Bandcamp</a> to complete the setup, and be sure to review our <a href="javascript:void(0);" >pricing page</a>.
            </p>
        <!-- /ko -->
        
        <p class="details hide">
            <a data-bind="click: togglePaypalBox" class="toggler">hide</a>
        </p>
        
    </div>
</div>
        </dd>
        
        <dt data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="description hiddenAccess">download description:</dt>
        <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="description">
                 <input type="hidden" value="1" name="album.new_desc_format">
        
                <div class="expander">
                    
                        <span class="add-more">
                            <a href="#">download description</a>
                            
                                <span class="controlTip">&nbsp; tell your fans about bonus items, hidden tracks, etc.</span>
                            
                        </span>
                    
                    <div style="display:none;" class="description-expanded">
                        <div>download description:</div>
                        <div class="controlTip">The following text appears by default:</div>
                        <div class="description-text item_desc">
                            
                            
                            
                            
                            
                            
                            
                            
 
    
      
        Includes unlimited streaming via the free Bandcamp app, plus high-quality download in MP3, FLAC and more.
      
      
 
                        </div>
                        
                        <div class="more">add more: 
                            
                                <span class="controlTip">&nbsp; tell your fans about bonus items, hidden tracks, etc.</span>
                            
                            <textarea name="album.download_desc"></textarea>
                        </div>
                        <div class="hide"><a class="toggler">hide</a></div>
                    </div>
                </div>
            
        </dd>
    </dl>
</div>
    </dd>
    <dt class="hiddenAccess">artwork upload</dt>
    <dd class="art-upload bottom-border">
        
        
        
<input type="hidden" value="" name="album.art_id">
    <p class="show-if-part-of-album">
        Track artwork defaults to use the album artwork. If you would like track art that differs from album art, upload specific track art here.
    </p>
    <div class="blank">
        <div class="image-upload-hint">
            <div class="html5-upload-wrapper" style="position: relative; display: inline-block; cursor: pointer; margin: 60px 0px 0px;"><div class="input-wrapper" style="position: absolute; overflow: hidden; width: 3px; height: 3px; top: 16.4833px; left: 138.683px;"><input type="file" style="position: absolute; opacity: 0; z-index: 10000; cursor: pointer; right: -1em; top: -0.5em;"></div><a class="upload" style="margin: 0px;">
                Upload Album Art
            </a></div>
            <p class="hint">
                700 x 700 pixels minimum <br>(bigger is better)<br><br>.jpg, .gif or .png, 4MB max
            </p>
        </div>
        <div class="upload-progress-wrapper">
            <div class="label">Uploading <span class="filename"></span>...</div>
            <div class="upload-progress"></div>
        </div>
    </div>
    </dd>
    <dt class="hiddenAccess">bonus download items:</dt>
    <dd class="bdis bottom-border">
        <div class="items">
            
<ul>
    
</ul>
            
<div class="upload-controls">
    <div class="html5-upload-wrapper" style="position: relative; display: inline-block; cursor: pointer; margin: 0px;"><div class="input-wrapper" style="position: absolute; overflow: hidden; width: 3px; height: 3px;"><input type="file" style="position: absolute; opacity: 0; z-index: 10000; cursor: pointer; right: -1em; top: -0.5em;"></div><a href="/no_js/upload_bdi" class="upload-file" style="margin: 0px;">add bonus item</a></div>
    <span class="controlHint">pdf liner note booklets, photos, videos, <a  href="/help/editing#bonus_formats">etc</a>.</span>
</div>
<div class="progress-wrapper">
    <span class="filename"></span>
    <span class="status"></span>
    <div class="upload-progress"></div>
</div>
        </div>
    </dd>
    
    <dt>artist:</dt>
    <dd>
        <input type="text" data-bind="placeholder: artist_placeholder" value="" name="album.artist" placeholder="leave blank to use band name">
        <p class="controlTip">for compilations, labels, etc.</p>
        <div class="alert"></div>
    </dd>
    
    <dt>about this album:</dt>
    <dd>
        <textarea placeholder="(optional)" name="album.about"></textarea>
    </dd>
    
    <dt>album credits:</dt>
    <dd>
        <textarea placeholder="(optional)" name="album.credits"></textarea>
    </dd>
    <dt>
        tags:
        
            <span class="bandtag">rock</span>,
            
        
            <span class="bandtag">folk</span>,
            
        
            <span class="bandtag">Rock</span>,
            
        
         and… 
    </dt>
    <dd class="bottom-border">
        <span class="acWidget"><input type="text" value="" placeholder="comma-separated list of tags" name="album.tags" class="yui-ac-input" autocomplete="off"><div class="yui-ac-container"><div class="yui-ac-content" style="display: none;"><div class="yui-ac-hd" style="display: none;"></div><div class="yui-ac-bd"><ul><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li></ul></div><div class="yui-ac-ft" style="display: none;"></div></div></div></span>
        <div class="suggestion"></div>
        <div class="alert"></div>
        <div class="whylink controlTip">
            <a  href="http://blog.bandcamp.com/2010/02/11/oh-no-not-another-music-community">Why bother tagging?</a>
        </div>
    </dd>
    
    <dt>album UPC/EAN code:</dt>
    <dd>
        <input type="text" value="" placeholder="(optional)" name="album.upc">
        <div class="alert"></div>
        <div class="controlTip">e.g., "027616 852809" <a  href="https://bandcamp.com/help/soundscan">more info</a></div>
    </dd>
</dl>
            </div>
            
            <div class="left-panel-container">
                <div class="left-panel">
                    <div class="art ">
                        <img alt="artwork thumbnail" src="">
                        <div class="blank"></div>
                    </div>
                
                    
                    
                    <div class="album-title-artist">
                        <p data-bind="text: title() || 'Untitled Album'" class="title">Untitled Album</p>
                        <p class="by">by <span class="artist">IndianRock</span></p>
                        <p class="release-date"></p>
                        <div class="summary">
                            
    <ul>
        
        
        
        
            
            
            
        
        
        
            <li class="price last-child">
                
                    
                        $7 or more
                    
                
            </li>
        
    </ul>
    
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tracks bottom-border">
            <h3 class="h3-audio">Tracks <span class="controlHint">uploading <span class="upload-count">x tracks</span>, <span class="percent">x</span>% complete, <span class="eta">mm:ss</span> remaining</span></h3>
            
            <ol class="tracks ui-sortable" style="">
                
                
                
                
                
                <li class="add-audio">
                    <div class="left-panel audio-upload add-audio">
                        <div class="html5-upload-wrapper" style="position: relative; display: inline-block; cursor: pointer; margin: 0px;"><div class="input-wrapper" style="position: absolute; overflow: hidden; width: 3px; height: 3px; top: 18.4667px; left: 28px;"><input type="file" style="position: absolute; opacity: 0; z-index: 10000; cursor: pointer; right: -1em; top: -0.5em;"></div><a href="/no_js/upload_audio?newTrack=1" class="add-audio" style="margin: 0px;">
                            add track
                        </a></div>
                        <div class="without-audio">
                            <a class="menu"><span class="bc-ui menu-triangle"></span></a>
                            <a class="add-track">add track w/o audio</a>
                        </div>
                        <span class="controlHint">291MB <a  href="https://bandcamp.com/help/uploading#maxupload">max</a> per track, lossless <a  href="https://bandcamp.com/help/uploading#aiffwavuploadrequirement">.wav, .aif or .flac</a></span>
                        
                            <p class="pro-notice">
                                Uploading a lot of tracks?
                                <a  href="/pro?from=b&amp;id=1544826807">Bandcamp Pro</a> features batch upload, private streaming, and more.
                                <a  href="/pro?from=b&amp;id=1544826807" class="b">Get details…</a>
                            </p>
                        
                    </div>
                </li>
            </ol>
            <div class="deleted-tracks"></div>
            
        </div>
                        
        
        <div class="packages bottom-border">
            <h3>Merch</h3>
            <ol data-bind="
        visible: tralbum.show_package_list,
        sortable: {
            data: tralbum.packages,
            options: {
                axis: 'y',
                containment: 'parent',
                handle: '.left-panel-container',
                tolerance: 'pointer'
            }
        }" style="display: none;" class="packages merch ko_container ui-sortable"><li class="package_wrapper" style="">
        <div class="left-panel-container">
            <div class="left-panel">
                <div class="info">
                    <div class="drag-thumb"><span class="bc-ui">=</span></div>
                    <!-- ko if: type === 'package' --><!-- /ko -->
                    <!-- ko if: type === 'digital-download' -->
                        <div class="package-counter-holder"></div>
                        <p class="title digital-download">digital</p>
                        <div class="summary">
                            Drag up or down to choose the position of the digital download relative to your merch items.
                        </div>
                    <!-- /ko -->
                </div>
            </div>
        </div>
    </li></ol>
<div class="add-package">
    <div class="left-panel add-package">
        <a data-bind="click: tralbum.addMerch, css: {disabled: tralbum.add_merch_disabled}" class="add-merch">
            add merch
        </a>
        <span data-bind="visible: !tralbum.subscriber_only()">
            <span class="controlHint">CD, vinyl, etc. </span><a href="https://bandcamp.com/help/merch_how_to" >more info</a>
        </span>
        <span data-bind="visible: tralbum.subscriber_only" class="controlHint" style="display: none;">
            Subscriber-only items cannot have merch
        </span>
        
    </div>
</div>
            
            
        </div>
        
        <div class="preorder bottom-border">
            <div class="check-wrapper">
    <h3 data-bind="animateVisible: preorder.preorder_panel_open, animationType: 'slide'" style="display: none;">Pre-order</h3>
    <label data-bind="css: { controlTip: preorder.preorder_open_saved, disabled: preorder.preorder_checkbox_disabled }" class="">
        
        <input type="checkbox" data-bind="disable: preorder.preorder_checkbox_disabled, checked: preorder.preorder_panel_open" value="1" name="preorder.on" id="preorderCheckbox">
        <input type="hidden" data-bind="disable: !preorder.preorder_open_saved()" value="1" name="preorder.on" disabled="">
        this is a digital pre-order
    </label>
    &nbsp;&nbsp;
    <a data-bind="visible: !subscriber_only()"  href="https://bandcamp.com/help/preorder_how_to">How do I set up a pre-order?</a>
    <span data-bind="visible: subscriber_only" style="display: none;" class="hint">Subscriber-only items cannot be preorders.</span>
</div>
<div data-bind="animateVisible: preorder.preorder_panel_open, animationType: 'slide'" class="control-wrapper hidden-while-loading" style="display: none;">
    
    <div data-bind="visible: !preorder.preorder_open_saved()">
        <p id="preorder-select-tracks-note" class="note">
        <strong>To choose which tracks to give fans when they pre-order the digital album</strong> (or any of its download-included packages), select the track above, then check "give this track to fans when they pre-order the album."
        </p>
    </div>
    <ul class="actions">
        <li>
            <label class="preorder-box">
                <input type="radio" data-bind="checked: preorder.preorder_radio" value="o" name="preorder.state" id="preorder_state_inprogress">
                in-progress
                <span data-bind="visible: preorder.preorder_count() &gt; 0" class="controlTip" style="display: none;"><span data-bind="text: preorder.preorder_count">0</span>
                <span data-bind="pluralize: preorder.preorder_count, singleText: 'order', pluralText: 'orders'">orders</span>
                to date</span>
                <span class="controlTip hide-when-published">&mdash; publish album to start the pre-order</span>
            </label>
            <p data-bind="visible: preorder.preorder_radio() == 'o'" class="widgetNote controlTip" style="display: none;">
                To release your digital pre-order, return here, choose "release pre-order now" (below), and click Update. We'll then email a link to the full album to all pre-order customers<span data-bind="visible: preorder.soundscan_not_yet_reported"> and report your sales to
                SoundScan</span>.
                </p><div data-bind="visible: !preorder.soundscan_not_yet_reported()" style="display: none;">
                    <br><br>
                    <strong>Note: Sales of this album have already been reported to SoundScan.</strong>
                            Pre-order sales from here on out will be reported normally (on a weekly basis).
                </div>
            <p></p>
        </li>
        <li>
            <label>
                <input type="radio" data-bind="disable: preorder.preorder_release_radio_disabled, checked: preorder.preorder_radio" value="i" name="preorder.state" id="preorder_state_release" disabled="">
                release pre-order now
            </label>
            <div data-bind="visible: preorder.preorder_count() &gt; 0" style="display: none;">
                <div data-bind="visible: preorder.preorder_radio() == 'i'" style="display:none;" class="widgetNote widgetWarning" id="preorderReleaseNote">
                    <strong>This is not a drill!</strong> Once you click Update, we'll email a link to the full album to the
                    <span data-bind="text: preorder.preorder_count">0</span>
                    <span data-bind="pluralize: preorder.preorder_count, singleText: 'fan', pluralText: 'fans'">fans</span>
                    who
                    <span data-bind="pluralize: preorder.preorder_count, singleText: 'has', pluralText: 'have'">have</span>
                    pre-ordered<span data-bind="visible: preorder.soundscan_not_yet_reported">,
                    and all pre-sales will be reported to SoundScan this week</span>. <strong>There is no undo.</strong>
                    Are you sure the album is 100% good to go? All tracks have final audio? Lyrics and liner notes added?
                    Final artwork and any bonus download items uploaded?
        
                    <span data-bind="animateVisible: preorder.preorder_audio_warning_visible, animationStyle: 'slide'" id="preorderAudioWarning" style="display: none;">
                    <br><br>
                    Looks to us like there's a problem: <strong>one or more of your tracks do not contain audio.</strong>
                    </span>
                </div>
            </div>
        </li>
        
        <li>
            <label data-bind="css: { controlTip: !preorder.preorder_open_saved() }" class="controlTip">
                <input type="radio" data-bind="disable: preorder.preorder_cancel_radio_disabled, checked: preorder.preorder_radio" value="c" name="preorder.state" id="preorder_state_cancel" disabled="">
                cancel this preorder
            </label>
            
            <div data-bind="visible: preorder.preorder_count() &gt; 0" style="display: none;">
                <div data-bind="visible: preorder.preorder_radio() == 'c'" style="display:none;" class="widgetNote widgetWarning" id="preorderCancelNote">
                    <strong>Are you sure you want to cancel this pre-order?</strong> Once you click Update, the pre-order will be closed.
                    The
                    <span data-bind="text: preorder.preorder_count">0</span>
                    <span data-bind="pluralize: preorder.preorder_count, singleText: 'fan', pluralText: 'fans'">fans</span>
                    who
                    <span data-bind="pluralize: preorder.preorder_count, singleText: 'has', pluralText: 'have'">have</span>
                    pre-ordered this album will not receive a link to it, nor any direct notice from Bandcamp.
                    <span data-bind="visible: preorder.soundscan_not_yet_reported">
                        Also, these previously-recorded sales will not be reported to SoundScan.
                    </span>
                </div>
            </div>
        </li>
    </ul>
</div>
        </div>
        
    
    
    
    
    <div class="save">
        <div id="save-buttons">
    
    
    <div class="draft-buttons">
            <a class="button save-draft hide-when-dirty">Save Draft</a>
       <a href="/no_js/save" class="button save-draft show-when-dirty">Save Draft</a>        
        <a href="/" class="cancel ">cancel</a>
    </div>
    
    
        <h4>Publish</h4>
        <dl class="visibility-radios">
            <dd class="public row">
                <div class="first-column">
                    <input type="radio" data-bind="checked: public_radio_button" value="1" name="album.public" id="public-radio">
                </div>
                <div class="second-column">
                    <label for="public-radio">
                        public
                    </label>
                </div>
            </dd>
            <dd class="private row">
                <div class="first-column">
                    <input type="radio" data-bind="checked: private_radio_button, disable: private_radio_button_disabled" value="1" name="album.private" id="private-radio">
                </div>
                <div class="second-column">
                    <label data-bind="css: { 'disabled': private_radio_button_disabled }" for="private-radio" class="">
                        private
                    </label>
                    <span data-bind="visible: subscription_bonus_item" class="private-disable" style="display: none;">
                        Subscription bonus items cannot be private
                    </span>
                </div>
            </dd>
            <dd data-bind="animateVisible: private_radio_button, animationType: 'slide'" class="private-hint row" style="display: none;">
                <div class="first-column">
                </div>
                <div class="second-column">
                    <p class="private hint">
                        Private albums are not visible to fans, but they can be made available via
                        
                            <a href="/tools#dl_codes" >download codes</a><span class="hide-when-published"> once published</span>.
                        
                    </p>
                </div>
            </dd>
            
        </dl>
    
    
    <div data-bind="visible: publish_warning_visible" class="publish-warning controlTip" style="display: none;">
        <!-- ko if: persist_action() === 'publish' -->
        Publishing
        <!-- /ko -->
        <!-- ko if: persist_action() === 'save' --><!-- /ko -->
        this album will immediately grant it to your
        <a href="/subscribers">
            <span data-bind="text: subscriber_count"></span>
            <span data-bind="pluralize: subscriber_count, singleText: 'subscriber'">subscribers</span>.
        </a>
    </div>
    <div data-bind="visible: free_warning_visible" class="publish-warning controlTip" style="display: none;">
        Free albums aren't automatically granted to your subscribers, but can be downloaded individually.
    </div>
    <div data-bind="visible: subscription_bonus_item() &amp;&amp; is_free()" class="publish-warning controlTip" style="display: none;">
        Subscription bonus items can't be free.
    </div>
    
    
    
    
    
</div>
    </div>
</form>