<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>My Music hut</title>
<meta name="viewport" content="width=device-width">
<meta name="Description" content="
">
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/global_bundle.css" media="all and (min-width: 641px)">
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fan_bundle.css" media="all and (min-width: 641px)">
</head>
<body class="gecko has-menubar ">
<div id="menubar-wrapper" class="bc-ui">
  <div id="menubar-vm" class="loading" >
    <div id="menubar" class="menubar out">
      <ul id="site-nav" class="menubar-section horizontal">
        <li class="menubar-item bclogo"><a href="<?php echo Yii::app()->request->baseUrl; ?>">
         <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" />
          </a></li></ul>
      <ul id="user-nav" class="menubar-section horizontal">
        <!-- ko if: user() --> 
        
        <!-- ko if: (fan() && !fan().private) -->
        <li id="feed-main" class="menubar-item "> <a href="/Gemini77/feed"> <span>music feed</span> </a> </li>
        <li id="collection-main" class="menubar-item "> <a href="/Gemini77"> <span>collection</span> </a> </li>
        <!-- /ko --> 
        
        <!-- ko if: artistsMenu.bmgr.bands().length > 0 -->
        <li
        class="menubar-item hidden-while-loading"
        data-bind="with: artistsMenu"
    > <a>
          <div> 
            <!-- ko if: options().showPhoto -->
            <div class="userpic hidden-while-loading"> <img src="https://s1.bcbits.com/img/blank.gif"
                        data-bind="src_image: {image_id: options().photo, format: 'bio_navbar'}"
                    > </div>
            <!-- /ko --> 
            
            <span class="bandname" data-bind="text: options().title">artists</span>
            <div data-bind="visible: options().showPro" class="menubar-badge-pro round3 hidden-while-loading">PRO</div>
            <span class="bc-ui menucaret"></span> </div>
          </a>
          <ul class="artists-menu menu hidden-while-loading"
            data-bind="
                css: {
                    'has-multiple-columns': columns() > 1 && (pageBandParentLabel() || pageLabel()),
                    col1: columns() === 1,
                    col2: columns() === 2,
                    col3: columns() === 3
                }
            "
        >
            <!-- ko if: toolsProfileBand() -->
            <li class="page-band-links" data-bind="css: {'page-label-links': pageLabel}">
              <ol>
                <!-- ko if: options().toolsProfileEditable -->
                <li> <a data-bind="
                                attr: {href: '/profile?id=' + toolsProfileBand().id},
                                css: {admin: options().adminAccess}"
                            > profile </a> </li>
                <li> <a data-bind="
                                attr: {href: '/tools?id=' + toolsProfileBand().id},
                                css: {admin: options().adminAccess}"
                            > tools </a> </li>
                <!-- /ko --> 
                
                <!-- ko ifnot: options().toolsProfileEditable -->
                <li class="ui-state-disabled"><a>profile</a></li>
                <li class="ui-state-disabled"><a>tools</a></li>
                <!-- /ko -->
                
                <li><a data-bind="attr: {href: toolsProfileBand().trackpipeLocalUrl()}">home</a></li>
              </ol>
            </li>
            <!-- /ko --> 
            
            <!-- ko if: labelBands() && isParentLabel() && (pageBandParentLabel() || pageLabel()) -->
            <li class="parent-label" data-bind="css: {'wide-parent-label': columns() > 2}">
              <div class="sublist-title" data-bind="css: {'show-in-single-column': !pageBandParentLabel()}">Label</div>
              <ol>
                <li data-bind="template: {
                            'name': 'band-parentlabel-template',
                            'data': bmgr.bandByID(pageBandParentLabel().id)
                        }"></li>
              </ol>
            </li>
            <!-- /ko --> 
            
            <!-- ko if: labelBands() && labelBands().length > 0  && (pageBandParentLabel() || pageLabel())-->
            <li class="label-member-bands">
              <div class="sublist-title" data-bind="css: {
                        'show-in-single-column': otherLinkedAccounts().length > 1 &amp;&amp; !pageBandParentLabel()}">Label Artists</div>
              <div class="multi-column-artist-menu no-pro-badges"> 
                <!-- ko foreach: labelBands -->
                <ol>
                  <!-- ko foreach: bands -->
                  <li data-bind="template: {
                                'name': 'band-menuitem-template'
                            },
                            css: {
                                'ui-state-disabled': $parents[1].isPageBand($data.id)
                            }"></li>
                  <!-- /ko --> 
                  <!-- ko if: $parent.labelBandsOverflow() > 0 && $index() === $parent.labelBands().length - 1 -->
                  <li class="more"> <a data-bind="attr: {href: $parent.pageLabel().url() + '/artists'}"> and&nbsp;<span data-bind="text: $parent.labelBandsOverflow()"></span>&nbsp;more&hellip; </a> </li>
                  <!-- /ko -->
                </ol>
                <!-- /ko --> 
              </div>
            </li>
            <!-- /ko --> 
            
            <!-- ko if: otherLinkedAccounts().length > 1 -->
            <li class="linked-bands">
              <div class="sublist-title" data-bind="css: {
                    'show-in-single-column': labelBands() &amp;&amp; labelBands().length > 0
                }">Other Linked Artists/Labels</div>
              <div class="multi-column-artist-menu"> 
                <!-- ko foreach: linkedBands -->
                <ol>
                  <!-- ko foreach: bands -->
                  <li data-bind="template: {
                                'name': 'band-menuitem-template'
                            },
                            css: {
                                'ui-state-disabled': $root.artistsMenu.isPageBand($data.id)
                            }"></li>
                  <!-- /ko -->
                </ol>
                <!-- /ko --> 
              </div>
            </li>
            <!-- /ko --> 
            
            <!-- ko if: !pageBandParentLabel() && !pageLabel() -->
            <li class="edit-artists">
              <ol>
                <li><a href="/settings?pane=artists"> 
                  <!-- ko if: otherLinkedAccounts().length > 1 -->edit artists&hellip;<!-- /ko --> 
                  <!-- ko ifnot: otherLinkedAccounts().length > 1 -->add more artists&hellip;<!-- /ko --> 
                  </a></li>
              </ol>
            </li>
            <!-- /ko -->
          </ul>
        </li>
        <!-- /ko --> 
        
        <!-- ko if: partner() -->
        <li class="menubar-item hidden-while-loading"> <a href="/partner">partner</a> </li>
        <!-- /ko -->
        
        <li class="menubar-item "> <a class="gear-dropdown-toggle">
          <div>
            <div class="bc-ui gear " data-bind="css: {admin: isAdmin()}"></div>
            <span class="bc-ui menucaret"></span> </div>
          </a>
          <ul class="menu user-menu hidden-while-loading">
            <li><a href="/settings">settings</a></li>
            <!-- ko if: (fan() && !fan().private) -->
            <li><a href="/Gemini77" data-bind="click: fanWalkthroughClick">fan tutorial</a></li>
            <!-- /ko -->
            <li><a href="/help">help</a></li>
            <li><a href="/basics">basics</a></li>
            <li><a href="/logout?crumb=73a62eb141ba784f90c4ab616f18af2e">sign out</a></li>
          </ul>
        </li>
        <!-- /ko --> 
        
        <!-- ko ifnot: user -->
        <li class="menubar-item hidden-while-loading "> <a href="/login?from=fan_page">log in</a> </li>
        <li class="menubar-item hidden-while-loading mobile-hidden"> <a href=
        
            "/signup"
        
        >signup</a> </li>
        <!-- /ko -->
      </ul>
    </div>
  </div>
</div>
<div id="fan-banner" class="fan-banner ">
  <div class="fan-banner-inner"> </div>
</div>
<div id="centerWrapper">
  <div id="propOpenWrapper">
    <div id="pgBd" class="yui-skin-sam">
      <div id="customHeaderWrapper">
        <div class="bannercontainer"> </div>
      </div>
      <div id="fan-container" class="fan-container">
        <div id="left-col">
          <div id="fan-bio-pic-outer">
            <div id="fan-bio-pic"> <a class="popupImage" href="<?php echo Yii::app()->request->baseUrl; ?>/images/1.jpg" data-image-size="960,640"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/1.jpg" width="210" height="210" itemprop="image"> </a> </div>
          </div>
          <div id="fan-bio-content" >
            <div id="name-location-wrapper">
              <h1 class="fan-name">Maggie DeVries </h1>
              <div class="fan-location"> <span class="">Michigan</span> </div>
            </div>
            <div id="fan-counts">
              <div id="following-actions" class="hasfollowers">
                <button id="follow-unfollow_27546" type="button" class="follow-unfollow " onclick="Fanpage.followUnfollow(27546, 'owner');">
                <div>Follow</div>
                </button>
              </div>
              <div class="following-note"> <span>You're now following Maggie DeVries</span>, which means you'll see a story in your music feed whenever Maggie DeVries collects new music. We'll also send you the occasional email summarizing the activity of all the fans you follow (you can turn that off over on your settings, if you prefer).
                <div class="close followingnoteclose">close</div>
              </div>
              <div id="fan-collection-count" class="section cf">
                <div class="titles">
                  <h3><a href="/maggiedevries">Collection</a></h3>
                  <h3><a href="/maggiedevries#wishlist">Wishlist</a></h3>
                </div>
                <div class="purchases count"><a href="/maggiedevries">40</a></div>
                <div class="wishlist count">0</div>
              </div>
              <div id="fan-follows" class="section">
                <div id="fan-following-count" class="cf">
                  <div class="following">
                    <h3 class="following-head"><a href="/maggiedevries/following">Following</a></h3>
                    <span class="count" id="following-bands-count">16</span> <span class="following-text"> artists,</span> <span class="count" id="following-fans-count">0</span><span class="following-text"> fans &nbsp;<!-- nbsp for better line wrap --></span> </div>
                  <div class="followers">
                    <h3 class='followers-head'><a href="/maggiedevries/followers">Followed by</a></h3>
                    <span class="count" id="followers-count">4</span> fans </div>
                </div>
              </div>
            </div>            
            <div id="fan-counts-brief" class="section followbutton  ">
              <div id="fan-collection-count">
                <h3> <a href="/maggiedevries">Collection</a> </h3>
                <div class="purchases"> <span class="count">40</span> </div>
              </div>
              <div id="fan-wishlist-count">
                <h3> Wishlist </h3>
                <div class="purchases"> <span class="count">0</span> </div>
              </div>
              <div id="fan-follows">
                <div id="fan-following-count">
                  <div class="following">
                    <h3 class="following-head"><a href="/maggiedevries/following">Following</a></h3>
                    <span class="count" id="following-bands-count">16</span> </div>
                </div>
              </div>
              <div id="following-actions">
                <button id="follow-unfollow_27546" type="button" class="follow-unfollow " onclick="Fanpage.followUnfollow(27546, 'owner', this);">
                <div>Follow</div>
                </button>
              </div>
              <div class="following-note"> <span>You're now following Maggie DeVries</span>, which means you'll see a story in your music feed whenever Maggie DeVries collects new music. We'll also send you the occasional email summarizing the activity of all the fans you follow (you can turn that off over on your settings, if you prefer).
                <div class="close followingnoteclose">close</div>
              </div>
            </div>            
            <div class="bc-ui2 reportFan" onclick="ReportFan.show_form();"></div>
          </div>
          <a id="track_play_waypoint" class="waypoint track_play_waypoint"> <img src=""/>
          <div class="waypoint-header-last">last played</div>
          <div class="waypoint-header-now">now playing</div>
          <div class="waypoint-item-title"></div>
          <div class="waypoint-artist-title"></div>
          </a> </div>
        <div id="collection-container" class="collection-container noreviewtrack">
          <div id="collection-search">
            <input type="search" placeholder="search collection"/>
            <span class="bc-ui2 search-icon"></span> </div>
          <?php echo $content; ?>          
        </div>
      </div>
      <div class="share-controls-alt section">
        <h3><a id="share-link-alt" class="compound-button">Share this collection...</a></h3>
      </div>
      <script type="text/javascript">
    
    if ( window.Cart && window.MediaView && MediaView.mode == "desktop" )
        Cart.writeCart = false;
</script> 
      <script type="text/javascript">if (Cart) { Cart.contentsScriptLoad(); }</script>
      <div style="clear:both"></div>
    </div>
    <div id="pgFt">
      <div id="pgFt-inner" class="pgft-desktop">
        <div id="footer-logo-wrapper"> <a id="footer-logo" href="?from=logo" ><span class="hiddenAccess"></span></a> <span class="webapp-selector-ui" style="display:none"></span> </div>
        <ul id="legal" class="horizNav">
          <li><a href="/terms_of_use">terms of use</a></li>
          <li><a href="/privacy">privacy</a></li>
          <li><a href="/copyright">copyright policy</a></li>
          <li><a href="/help_contact">help</a></li>
          <li class="view-switcher desktop"><a>switch to mobile view</a></li>
        </ul>
        <span class="static-content">&nbsp;</span> </div>
      <ul class="pgft-phone" style="display: none">
        <li class="navgroup">
          <ul class="horizontal-list">
            <li> <a href="/logout?crumb=73a62eb141ba784f90c4ab616f18af2e">log out</a> </li>
            <li class="contact"> <a href="/help_contact">contact / help</a> </li>
          </ul>
        </li>
        <li class="navgroup">
          <ul class="horizontal-list">
            <li> <a href="/terms_of_use">terms of use</a> </li>
            <li> <a href="/privacy">privacy</a> </li>
            <li> <a href="/copyright">copyright policy</a> </li>
          </ul>
        </li>
        <li class="navgroup">
          <ul class="horizontal-list">
            <li id="footer-logo"> <a href="?from=logo"><span class="hidden-access"></span></a> </li>
            <li> <a class="view-switcher phone">switch to desktop view</a> </li>
          </ul>
        </li>
        <li class="navgroup footer-extras hidden">
          <ul class="horizontal-list">
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
</body>
</html>
<!-- bender03-4 Sat Oct 25 10:01:44 UTC 2014 -->