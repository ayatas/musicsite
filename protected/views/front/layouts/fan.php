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
        <li class="menubar-item bclogo"><a href="<?php echo Yii::app()->request->baseUrl; ?>"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" /> </a></li>
      </ul>
      <ul id="user-nav" class="menubar-section horizontal">
        <li id="feed-main" class="menubar-item "> <a href="#"> <span>music feed</span> </a> </li>
        <li id="collection-main" class="menubar-item "> <a href="#"> <span>collection</span> </a> </li>
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
      <div id="fan-container" class="fan-container"> <?php echo $content; ?> </div>
    </div>
  </div>
</div>
</body>
</html>
<!-- bender03-4 Sat Oct 25 10:01:44 UTC 2014 -->