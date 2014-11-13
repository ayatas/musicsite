<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
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

<body>

<div class="container" id="page">
	<div id="header">
		<div id="logo"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="My Music Hut" /></a></div>
        
        <div class="right">
        <?php 	
	if(!Yii::app()->user->isGuest){
		$user = User::model()->findByPk(Yii::app()->user->getId());	
		echo 'Hi '.$user->name;
		echo CHtml::link('Your Site', array('artist/site','domain'=>$user->artists->url));
	}
	?>  
        </div>
        <div class="clear"></div>
	</div><!-- header -->	
    <div class="clear"></div>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Artist Signup', 'url'=>array('/artist/signup'),'visible'=>Yii::app()->user->getId()==""),
				array('label'=>'Fan Signup', 'url'=>array('/site'), 'visible'=>Yii::app()->user->getId()==""),	
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->getId()==""),				
				array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>Yii::app()->user->getId()!="")
			),
		)); 
		?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->
</body>
</html>
