<?php

class FanController extends Controller
{
	public function filters() {
		return array (
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete'  // we only allow deletion via POST request
				);
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 *
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array(
				'allow', // allow all users to perform 'index' and 'view' actions
				'actions' => array('signup'),
				'users' => array('*')
			),
			array(
				'allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('index'),
				'users' => array('@') 
			),
			array(
				'deny', // deny all users
				'users' => array('*') 
			) 
		);
	}
	
	public function actionIndex()
	{
		$this->layout = 'fan';
		
		$userId = Yii::app()->user->getId();		
		$albums = FanAlbums::model()->findAllByAttributes(array('userId'=>$userId));
		$user = User::model()->findByPk($userId);		
		
		$this->render('index',array('albums'=>$albums,'user'=>$user));
	}
	
	public function actionSignup(){
		
		$rnd = rand(0,9999);  // generate random number between 0-9999
		
		$model = new User ( 'create' );
		
		if (isset ( $_POST ['User'])) {
			
			$model->attributes = $_POST ['User'];
			$model->password = $this->passwordEncode ( $_POST ['User'] ['password'] );
			
			$uploadedFile=CUploadedFile::getInstance($model,'image');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image = $fileName;
			
			if ($model->save ()) {
				
				$uploadedFile->saveAs(Yii::app()->basePath.'/../images/fan/'.$fileName);  // image will uplode to rootDirectory/banner/
				
				$this->redirect ( array (
						'/fan/index' 
				) );
			}
		}
		$this->render ( 'signup', array (
				'model' => $model
		) );
	}
	
	public function passwordEncode($password) {
		return base64_encode ( base64_encode ( $password ) );
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	
}