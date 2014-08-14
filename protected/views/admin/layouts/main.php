<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/uniform.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/select2.css" />		
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/unicorn.main.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/unicorn.grey.css" class="skin-color" />	
	</head>
	<body>
    
		<div id="header">
			<h1><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/"><?php echo CHtml::encode(Yii::app()->name); ?> Admin</a></h1>
		</div>		
		<div id="user-nav" class="navbar navbar-inverse">
			<ul class="nav btn-group">
				<li class="btn btn-inverse" >
					<a title="" target="_blank" href="<?php echo Yii::app()->getBaseUrl(true); ?>"><i class="icon icon-user"></i> <span class="text">Visit site</span></a>
				</li>
				<li class="btn btn-inverse" >
					<a title="" href="<?php echo Yii::app()->getBaseUrl(true)."/admin/user/profile"; ?>"><i class="icon icon-user"></i> <span class="text">Profile</span></a>
				</li>				
				<li class="btn btn-inverse">
					<a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a>
				</li>
				<li class="btn btn-inverse">
					<?php echo CHtml::link('<i class="icon icon-share-alt"></i> <span class="text">Logout</span>', array('site/logout')); ?>					
				</li>
			</ul>
		</div>
        <div class="mainwrapper">
		<div id="sidebar">
		<a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>			
		<?php require_once('left_menu.php'); ?>
		</div>		
		<div id="content">
			<div id="content-header">
				<h1>Dashboard</h1>				
			</div>
            <?php if(isset($this->breadcrumbs)):
    if ( Yii::app()->controller->route !== 'site/index' )
        $this->breadcrumbs = array_merge(array (Yii::t('zii','Home')=>Yii::app()->homeUrl), $this->breadcrumbs);
 
		$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink' => false,
			'tagName'=>'div',
			'separator'=>'',
			'activeLinkTemplate'=>'<a href="{url}">{label}</a>',
			'inactiveLinkTemplate'=>'<a href="javascript:void(0);" class="current">{label}</a>',
			'htmlOptions'=>array ('id'=>'breadcrumb')
		)); ?><!-- breadcrumbs -->
		<?php endif; ?>
			<div class="container-fluid">				
				<?php echo $content; ?>				
				<div class="row-fluid">
					<div id="footer" class="span12"> 2013 - 2014 &copy; Bandcamp Admin.</div>
				</div>
			</div>
		</div>
        </div>
		<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.ui.custom.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.uniform.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/select2.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/unicorn.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/unicorn.tables.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.flot.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.flot.resize.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.peity.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/fullcalendar.min.js"></script>
	</body>
</html>
