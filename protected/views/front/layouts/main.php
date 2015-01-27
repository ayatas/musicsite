<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link href='http://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css' />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/owl.carousel.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jqtransform.css" type="text/css" media="screen" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/responsive.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>
<script defer src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flexslider.js"></script>
<script defer src="<?php echo Yii::app()->request->baseUrl; ?>/js/owl.carousel.js"></script>
<script defer src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jqtransform.js"></script>
</head>
<body>
<div class="wrapper">
  <div class="header">
    <div class="signupHead">
      <div class="page_wrapper">
        <div class="leftSign"> <span>Welcome Back,<em>Sevolfo</em></span> <a href="#">Your Settings</a> </div>
        <div class="rightSign"> <a href="#">Sign out</a> </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="mianHead">
      <div class="page_wrapper">
        <div class="logo"> <a href="<?php echo Yii::app()->getBaseUrl(true); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="" /></a></div>
        <div class=""> </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <?php echo $content; ?>
  <div class="clear"></div>
  <div class="footer">
    <div class="page_wrapper">
      <div class="footersocialBlock">
        <ul>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
        </ul>
      </div>
      <span>Copyright  2014  suono</span> <samp>of suono you can listen to thousands songs and buy your favorite songs or albums.</samp> </div>
  </div>
  <div id="toTop"><a id="toTopLink"><span class="icon-up"></span><span id="toTopText"> Back to top</span></a></div>
</div>
</body>
</html>