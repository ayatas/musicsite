<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/edittrack.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/farbtastic.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lightbox.css" />
    
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.custom.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/farbtastic.js"></script>	    
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/attrchange.js"></script>	   
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/lightbox.js"></script> 
</head>
    
    <?php 
    $bodyColor = '';
    $backgroundColor = '';
    $backgroundImge = '';
    
    if(isset($_GET['domain'])){
        if(Artist::model()->findByAttributes(array("url"=>$_GET['domain']))){
            $artistModel = Artist::model()->findByAttributes(array("url"=>$_GET['domain']));
			if($artistModel->designs){
            $bodyColor = $artistModel->designs->bodyColor;
            $backgroundColor = $artistModel->designs->backgroundColor;
			if($artistModel->designs->backgroundImage)
            $backgroundImge = Yii::app()->request->baseUrl.'/images/background/'.$artistModel->designs->backgroundImage;
			}
        }
    }
    ?>
<body style="background-image:url(<?=$backgroundImge;?>); background-color:<?=$backgroundColor?>" >

<div class="container" id="page" style="background-color:<?=$bodyColor;?>">
	<div id="header">
		<div id="logo"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="My Music Hut" /></a></div>
        
        <div class="right">
        <ul class="rightMenu">
        <?php 	
	if(!Yii::app()->user->isGuest && (Yii::app()->user->getId() == $artistModel->userId)){
		$user = User::model()->findByPk(Yii::app()->user->getId());	
		echo '<b>Hi '.$user->name.' :</b>';
		echo CHtml::link('Profile', array('artist/profile'));
		echo CHtml::link('Add Music', array('artist/account'));
		echo '<a href="javascript:void(0)" id="designAlubm">Design</a>';
		echo CHtml::link('Your Site', array('artist/site','domain'=>$user->artists->url));
    	echo CHtml::link('Logout', array('site/logout'));
	}
	?>  
    </ul>
        </div>
        <div class="clear"></div>
	</div><!-- header -->	
    <div class="clear"></div>
	<!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
<div id="content">
	<?php echo $content; ?>
</div>
	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->
</body>
</html>
