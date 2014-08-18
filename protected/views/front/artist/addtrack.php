<form class="" action="/edit_track_v2" onsubmit="Form.delaySubmitUntilReady(event)" method="post" id="edit-tralbum-form">
  <input type="hidden" value="" name="paypal_aware">
  <div class="top-spacer"></div>
  <div data-bind="css: { 'private': private(), 'subscriber-only': subscriber_only() }" class="track selectable single featured streaming-enabled nyp downloadable selected">
    <div class="right-panel">
      <input type="hidden" data-bind="value: id" name="track.id_0" value="">
      <input type="hidden" value="" name="track.track_number_0">
      <input type="hidden" value="" name="track.action_0">
      <input type="hidden" value="" name="track.featured_0">
      <dl class="track-panel
           ">
        <dt class="hiddenAccess">track title</dt>
        <dd class="bottom-border track-title"> <span class="required-asterisk" style="opacity: 1;">*</span>
          <div class="jquery-placeholder-wrapper" style="display: inline-block; position: relative;"><span class="jquery-placeholder-hint controlHint" style="position: absolute; -moz-user-select: none; font-size: 22px; font-family: &quot;Helvetica Neue&quot;,Arial,sans-serif; font-weight: 400; line-height: 26px; top: 6px; left: 12px; right: 11px;">track name</span>
            <input type="text" data-bind="value: title, valueUpdate: 'input'" value="" class="title required force-placeholder-wrapper" name="track.title_0">
          </div>
          <div class="alert"></div>
          <div class="include-in-preorder"> <strong>During Pre-order:</strong>
            <label class="disabled">
              <input type="checkbox" disabled="" value="1" name="track.preorder_download_0">
              give this track to fans when they pre-order the album (also allows fans to stream this track during the pre-order) </label>
            <div class="show-if-private"> Bonus tracks cannot be included in the preorder. </div>
          </div>
        </dd>
        <dt class="hiddenAccess">download settings</dt>
        <dd class="download-settings bottom-border">
          <p class="show-if-private"> <span class="show-if-part-of-album"> Bonus tracks are not visible to fans, but are included in the download of the album and </span> <span class="hide-if-part-of-album"> Private tracks </span> can be made available via <a href="/tools#dl_codes" >download codes</a>. </p>
          <p class="show-if-subscriber-only"> Subscriber-only items are given to all of your subscribers when published. They are inaccessible to everyone else. Subscriber-only items can also be made available via <a href="/tools#dl_codes" >download codes</a>. </p>
          <div style="display:none;" class="streaming">
            <label data-bind="css: { 'disabled': subscriber_only() || parent_subscriber_only() || private() }" class="enable-streaming">
              <input type="checkbox" data-bind="disable: subscriber_only() || parent_subscriber_only() || private()" checked="" value="1" name="track.streaming_0">
              enable streaming <span class="show-if-preorder">(after pre-order is released)</span> </label>
          </div>
          <div data-bind="animateVisible: downloadable, animationType: 'slide'" style="">
            <dl data-bind="animateVisible: downloadable, animationType: 'slide'" class="download-options" style="">
              <dt data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="pricing">track pricing: <a href="javascript:void(0);" >What pricing performs best?</a> </dt>
              <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="">
                <label class="price">
                <input type="text" data-bind="value: price, valueUpdate: 'input'" name="track.price_0" class="price">
                &nbsp; <a href="javascript:void(0);"  class="currency-plural">US Dollars</a>
                <div class="alert"></div>
                </label>
                <p class="controlTip">enter zero or more</p>
                <label>
                  <input type="checkbox" data-bind="checked: name_your_price" checked="" value="1" name="track.nyp_0">
                  let fans pay <span class="hide-if-free">more</span> if they want </label>
                <p class="controlTip allowpaymore">Are you sure you don't want to at least give fans the <em>option</em> to pay you? Fans want to support the artists they love, and when they do your release will be added to their My MusicHutt collection (which promotes it to even more fans, and also means your supporters can listen to it in <a  href="javascript:void(0);">the My MusicHutt app</a>). We couldn't say it any better than <a  href="javascript:void(0);">this guy</a>.</p>
                <div style="display:none;" class="show-if-free">
                  <label>
                    <input type="checkbox" value="1" name="track.require_email_0">
                    require email address <span class="show-if-nyp">if fan enters zero</span> <a class="smallspace"  href="javascript:void(0);">more info</a> </label>
                  <p> You have 200 free downloads remaining this month. <a class="smallspace"  href="javascript:void(0);">more info / buy credits</a> </p>
                </div>
              </dd>
              <dt data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }, visible: payment_details_visible" class="hiddenAccess">payments go to:</dt>
              <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }, visible: payment_details_visible" class="disabled-when-private">
                <div data-bind="with: payment_settings" class="payment">
                  <div data-bind="css: {expanded: box_expanded}" class="box">
                    <p> Payments will go to <span data-bind="text: paypal_email" class="email">manikanta@ayatas.com</span> via PayPal. <a data-bind="click: togglePaypalBox" class="toggler show-details smallspace">more info</a> </p>
                    
                    <!-- ko if: $parent.payment_editable --><!-- /ko --> 
                    <!-- ko if: !$parent.payment_editable() && !user_owns_label() && label() --><!-- /ko --> 
                    
                    <!-- ko if: show_paypal_setup_info -->
                    <p class="details"> When a fan buys your music, the money will go directly to the above address via PayPal. If this is not your correct PayPal address, please visit your <a data-bind="attr: {href: paypal_setup_url}" class="profile"  href="javascript:void(0);">Profile page</a> to change it. </p>
                    <p class="details"> If you do not yet have a PayPal account, kindly follow <a href="javascript:void(0);" >these instructions</a> to set one up. </p>
                    <p class="details"> Once your PayPal address is correct, please read <a href="javascript:void(0);" >Sell Your Music on My MusicHutt</a> to complete the setup, and be sure to review our <a href="javascript:void(0);" >pricing page</a>. </p>
                    <!-- /ko -->
                    
                    <p class="details hide"> <a data-bind="click: togglePaypalBox" class="toggler">hide</a> </p>
                  </div>
                </div>
              </dd>
              <dt data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="description hiddenAccess">download description:</dt>
              <dd data-bind="css: { 'disabled': private() || subscriber_only() || parent_subscriber_only() }" class="description">
                <input type="hidden" value="1" name="track.new_desc_format_0">
                <div class="expander"> <span class="add-more"> <a href="#">download description</a> </span>
                  <div style="display:none;" class="description-expanded">
                    <div>download description:</div>
                    <div class="controlTip">The following text appears by default:</div>
                    <div class="description-text item_desc"> Includes unlimited streaming via the free my MusicHutt app, plus high-quality download in MP3, FLAC and more. </div>
                    <div class="more">add more:
                      <textarea name="track.download_desc_0"></textarea>
                    </div>
                    <div class="hide"><a class="toggler">hide</a></div>
                  </div>
                </div>
              </dd>
            </dl>
          </div>
        </dd>
        <dt>about this track:</dt>
        <dd>
          <textarea placeholder="(optional)" name="track.about_0"></textarea>
        </dd>
        <dt class="lyrics">lyrics: <a  href="javascript:void(0);">Why add lyrics? I dislike typing.</a></dt>
        <dd>
          <textarea placeholder="(optional)" name="track.lyrics_0"></textarea>
        </dd>
        <dt>track credits:</dt>
        <dd class="bottom-border">
          <textarea placeholder="(optional)" name="track.credits_0"></textarea>
        </dd>
        <dt>artist:</dt>
        <dd>
          <input type="text" data-bind="placeholder: artist_placeholder" value="" name="track.artist_0" placeholder="leave blank to use band name">
          <p class="controlTip">for compilations, labels, etc.</p>
          <div class="alert"></div>
        </dd>
        <dt class="hiddenAccess">artwork upload</dt>
        <dd class="art-upload bottom-border">
          <input type="hidden" value="" name="track.art_id_0">
          <p class="show-if-part-of-album"> Track artwork defaults to use the album artwork. If you would like track art that differs from album art, upload specific track art here. </p>
          <div class="blank">
            <div class="image-upload-hint">
              <div class="html5-upload-wrapper" style="position: relative; display: inline-block; cursor: pointer; margin: 60px 0px 0px;">
                <div class="input-wrapper" style="position: absolute; overflow: hidden; width: 3px; height: 3px;">
                  <input type="file" style="position: absolute; opacity: 0; z-index: 10000; cursor: pointer; right: -1em; top: -0.5em;">
                </div>
                <a class="upload" style="margin: 0px;"> Upload Track Art </a></div>
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
        </dd>
        <dt> tags: <span class="bandtag">rock</span>, <span class="bandtag">folk</span>, <span class="bandtag">Rock</span>,
          
          
          and… </dt>
        <dd class="bottom-border"> <span class="acWidget">
          <input type="text" value="" placeholder="comma-separated list of tags" name="track.tags_0" class="yui-ac-input" autocomplete="off">
          <div class="yui-ac-container">
            <div class="yui-ac-content" style="display: none;">
              <div class="yui-ac-hd" style="display: none;"></div>
              <div class="yui-ac-bd">
                <ul>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                  <li style="display: none;"></li>
                </ul>
              </div>
              <div class="yui-ac-ft" style="display: none;"></div>
            </div>
          </div>
          </span>
          <div class="suggestion"></div>
          <div class="alert"></div>
          <div class="whylink controlTip"> <a  href="javascript:void(0);">Why bother tagging?</a> </div>
        </dd>
        <dt>license:</dt>
        <dd class="license bottom-border">
          <label>
            <input type="radio" checked="" name="track.license_type_0" value="1">
            All rights reserved <span class="cc-icons commercial"></span> </label>
          <h4>Creative Commons:</h4>
          <ul class="license-selector">
            <li>
              <label>
                <input type="radio" name="track.license_type_0" value="2">
                Attribution Non-commercial No Derivatives </label>
              <a class="cc-icons toggler"><span class="attribution"></span><span class="non-commercial"></span><span class="no-derivatives"></span></a><a class="text toggler">info</a><a style="display:none;" class="text toggler">hide</a>
              <p>This license is the most restrictive Creative Commons license, allowing redistribution. This license is often called the “free advertising” license because it allows others to download your works and share them with others as long as they mention you and link back to you, but they can’t change them in any way or use them commercially. <a  href="http://creativecommons.org/licenses/by-nc-nd/3.0/">more</a></p>
            </li>
            <li>
              <label>
                <input type="radio" name="track.license_type_0" value="3">
                Attribution Non-commercial Share Alike </label>
              <a class="cc-icons toggler"><span class="attribution"></span><span class="non-commercial"></span><span class="share-alike"></span></a><a class="text toggler">info</a><a style="display:none;" class="text toggler">hide</a>
              <p>This license lets others remix, tweak, and build upon your work non-commercially, as long as they credit you and license their new creations under the identical terms. Others can download and redistribute your work, but they can also translate, make remixes, and produce new stories based on your work. All new work based on yours will carry the same license, so any derivatives will also be non-commercial in nature. <a  href="http://creativecommons.org/licenses/by-nc-sa/3.0/">more</a></p>
            </li>
            <li>
              <label>
                <input type="radio" name="track.license_type_0" value="4">
                Attribution Non-commercial </label>
              <a class="cc-icons toggler"><span class="attribution"></span><span class="non-commercial"></span></a><a class="text toggler">info</a><a style="display:none;" class="text toggler">hide</a>
              <p>This license lets others remix, tweak, and build upon your work non-commercially, and although their new works must also acknowledge you and be non-commercial, they don’t have to license their derivative works on the same terms. <a  href="http://creativecommons.org/licenses/by-nc/3.0/">more</a></p>
            </li>
            <li>
              <label>
                <input type="radio" name="track.license_type_0" value="5">
                Attribution No Derivatives </label>
              <a class="cc-icons toggler"><span class="attribution"></span><span class="no-derivatives"></span></a><a class="text toggler">info</a><a style="display:none;" class="text toggler">hide</a>
              <p>This license allows for redistribution, commercial and non-commercial, as long as it is passed along unchanged and in whole, with credit to you. <a  href="http://creativecommons.org/licenses/by-nd/3.0/">more</a></p>
            </li>
            <li>
              <label>
                <input type="radio" name="track.license_type_0" value="8">
                Attribution Share Alike </label>
              <a class="cc-icons toggler"><span class="attribution"></span><span class="share-alike"></span></a><a class="text toggler">info</a><a style="display:none;" class="text toggler">hide</a>
              <p>This license lets others remix, tweak, and build upon your work even for commercial reasons, as long as they credit you and license their new creations under the identical terms. This license is often compared to open source software licenses. All new works based on yours will carry the same license, so any derivatives will also allow commercial use. <a  href="http://creativecommons.org/licenses/by-sa/3.0/">more</a></p>
            </li>
            <li>
              <label>
                <input type="radio" name="track.license_type_0" value="6">
                Attribution </label>
              <a class="cc-icons toggler"><span class="attribution"></span></a><a class="text toggler">info</a><a style="display:none;" class="text toggler">hide</a>
              <p>This license lets others distribute, remix, tweak, and build upon your work, even commercially, as long as they credit you for the original creation. This is the most accommodating of licenses offered, in terms of what others can do with your works licensed under Attribution. <a  href="http://creativecommons.org/licenses/by/3.0/">more</a></p>
            </li>
          </ul>
        </dd>
        <dt>track ISRC:</dt>
        <dd class="bottom-border">
          <input type="text" value="" placeholder="(optional)" name="track.isrc_0">
          <div class="alert"></div>
          <div class="controlTip">e.g., "US-Z04-99-32243" <a  href="javascript:void(0);">more info</a></div>
        </dd>
        <dt class="release-date">release date:</dt>
        <dd class="release-date bottom-border">
          <input type="text" value="" placeholder="(optional)" name="track.release_date_0">
          <span class="controlTip">mm/dd/yyyy</span> <span class="controlTip show-if-part-of-album">leave blank to use album release date</span>
          <div class="alert"></div>
        </dd>
        <dt class="hiddenAccess">visibility</dt>
        <dd class="private bottom-border ">
          <label>
            <input type="checkbox" data-bind="checked: private_checkbox, disable: private_checkbox_disabled" value="1" name="track.private_0">
            <span class="show-if-part-of-album">bonus track</span> <span class="hide-if-part-of-album">private</span> </label>
          <p class="show-if-included-in-preorder"> A track included in the preorder cannot be a bonus track. </p>
          <span data-bind="visible: private_checkbox_disabled() &amp;&amp; parent_subscriber_only()" class="hint" style="display: none;"> Subscriber-only items cannot have bonus tracks. </span>
          <p data-bind="visible: !private_checkbox_disabled()" class="controlTip"> <span class="show-if-part-of-album">Bonus tracks are not visible to fans, but are included in the download of the album.</span> <span class="hide-if-part-of-album">Private tracks are not visible to fans.</span> They can <span class="show-if-part-of-album">also</span> be made available via <a href="/tools#dl_codes" >download codes</a><span class="hide-when-published"> once published</span>. </p>
        </dd>
        <dt class="hiddenAccess">dissociation</dt>
        <dd class="last-item-on-page"> <a style="display:none;" class="button dissociate"> detach from album </a> &nbsp; </dd>
      </dl>
    </div>
    <div class="left-panel-container">
      <div class="left-panel track single">
        <div class="art "> <img alt="artwork thumbnail" src="">
          <div class="blank"></div>
        </div>
        <div class="album-title-artist">
          <p data-bind="text: title() || 'Untitled Track'" class="title">Untitled Track</p>
          <p class="by">by <span class="artist">IndianRock</span></p>
          <div class="summary">
            <ul>
              <li class="price last-child"> $1 or more </li>
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
            <div class="input-wrapper" style="position: absolute; overflow: hidden; width: 3px; height: 3px; top: 0.46667px; left: 76px;">
              <input type="file" style="position: absolute; opacity: 0; z-index: 10000; cursor: pointer; right: -1em; top: -0.5em;">
            </div>
            <a href="javascript:void(0)" class="add-audio" style="margin: 0px;">add audio</a></div>
          <span class="controlHint">291MB <a  href="javascript:void(0);">max</a>, lossless <a  href="javascript:void(0);">.wav, .aif or .flac</a></span>
          <p class="pro-notice">Uploading a lot of audio? <a  href="/pro?from={{band.pro_entry_pt_bulk_upload}}&amp;id={{band.id}}">My MusicHutt Pro</a> features batch album upload, private streaming, and more. <a  href="javascript:void(0);" class="b">Get details…</a></p>
        </div>
        <div class="progress-wrapper"> <span class="filename"></span> <span class="status"></span> <span class="bar">|</span> <a class="cancel">cancel</a>
          <div class="upload-progress"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="part-of-album">
    <label class="disabled">
      <input type="checkbox" disabled="" value="1" name="part_of_album">
      part of an album, EP, what have you </label>
    <select disabled="" class="album_select_list_choice" size="1" name="album_select_list_choice">
      <option disabled="" selected="" value="0">no albums </option>
    </select>
  </div>
  <div class="save">
    <div id="save-buttons">
      <div class="draft-buttons"> <a class="button save-draft hide-when-dirty disabled">Save Draft</a> <a href="/no_js/save" class="button save-draft show-when-dirty">Save Draft</a> <a href="/" class="cancel ">cancel</a> </div>
      <div data-bind="visible: publish_warning_visible" class="publish-warning controlTip" style="display: none;"> 
        <!-- ko if: persist_action() === 'publish' --> 
        Publishing 
        <!-- /ko --> 
        <!-- ko if: persist_action() === 'save' --><!-- /ko --> 
        this track will immediately grant it to your <a href="/subscribers"> <span data-bind="text: subscriber_count"></span> <span data-bind="pluralize: subscriber_count, singleText: 'subscriber'">subscribers</span>. </a> </div>
      <div data-bind="visible: free_warning_visible" class="publish-warning controlTip" style="display: none;"> Free tracks aren't automatically granted to your subscribers, but can be downloaded individually. </div>
      <div data-bind="visible: subscription_bonus_item() &amp;&amp; is_free()" class="publish-warning controlTip" style="display: none;"> Subscription bonus items can't be free. </div>
    </div>
  </div>
</form>
