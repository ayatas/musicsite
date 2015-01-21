<div id="left-col">
  <div id="fan-bio-pic-outer">
    <div id="fan-bio-pic">
      <?php if($user->image): ?>
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fan/<?php echo $user->image; ?>" width="210" height="210" itemprop="image"></div>
    <?php endif; ?>
  </div>
  <div id="fan-bio-content" >
    <div id="name-location-wrapper">
      <h1 class="fan-name">Maggie DeVries </h1>
      <div class="fan-location"> <span class="">Michigan</span> </div>
    </div>
    <div id="fan-counts">
      <div id="fan-collection-count" class="section cf">
        <div class="titles">
          <h3><a href="#">Collection</a></h3>
          <h3><a href="#">Wishlist</a></h3>
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
        <h3> <a href="#">Collection</a> </h3>
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
  <div id="collection-items" class="collection-items">
    <ol class="collection-grid">
      <?php foreach($albums as $album): ?>
      <li class="collection-item-container track_play_hilite">
        <div class="collection-item-gallery-container">
          <div class="collection-item-art-container">
            <?php if($album->album->image): ?>
            <img class="collection-item-art" src="<?php echo Yii::app()->request->baseUrl; ?>/images/albums/<?php echo $album->album->image; ?>">
            <?php endif; ?>
          </div>
          <a target="_blank" href="/album/i-ship-it-original-soundtrack" class="item-link">
          <div class="collection-item-title"><?php echo $album->album->name; ?></div>
          </a> </div>
        <div class="collection-item-details-container"> <span class="item-link-alt">
          <div class="collection-item-title">I Ship It | Original Soundtrack</div>
          <div class="collection-item-artist">by Yulin Kuang | Film Soundtracks</div>
          </span>
          <div class="collection-item-actions wishlist">
            <ul>
              <li class="first" id="collect-item_3353038599"> <span class="wishlist-msg" title="Add this album to your wishlist"> <span class="bc-ui2 collect-item-icon trigger"></span> <span class="text trigger"><a>wishlist</a></span> </span> <span class="wishlisted-msg"> <span title="Remove this album from your wishlist"> <span class="bc-ui2 collect-item-icon trigger"></span> <span class="text trigger"><a>in wishlist</a></span> </span> <span class="view"><a target="_blank" href="/Gemini77#wishlist" title="View your wishlist">&raquo;</a></span> </span> <span class="purchased-msg"> <span class="bc-ui2 collect-item-icon"></span> <span class="purchased-msg-text">You own this</span> </span> </li>
              <span class="dot wl">·</span>
              <li class="buy-now "><a href="/album/i-ship-it-original-soundtrack" target="_blank">buy now</a></li>
              <span class="dot">·</span>
              <li class="hear-more"><a href="/album/i-ship-it-original-soundtrack" target="_blank">hear more</a></li>
            </ul>
          </div>
        </div>
      </li>
      <?php endforeach; ?>
    </ol>
  </div>
</div>
