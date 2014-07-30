<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/unicorn.login.css" />
	</head>
	<body>
		<div id="logo">
			<img src="<?php echo Yii::app()->baseUrl; ?>/images/logo.png" alt="" />
		</div>
		<div id="loginbox">
			<?php echo $content; ?>
		</div>		
		<script src="<?php echo Yii::app()->baseUrl; ?>/js/unicorn.login.js"></script>
	</body>
</html>
