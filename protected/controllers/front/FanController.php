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
				'actions' => array('index','updateProfilePic','removeFanPic'),
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
	
	public function actionUpdateProfilePic(){
		
		$userId = Yii::app()->user->getId();
		
		Yii::import ( "ext.EAjaxUpload.qqFileUploader" );
		$folder = Yii::getPathOfAlias ( 'webroot' ) . '/images/fan/'; // folder for uploaded files
		$allowedExtensions = array (
				"jpg",
				"jpeg",
				"gif",
				"png" 
		); // array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 2 * 1024 * 1024; // maximum file size in bytes
		$uploader = new qqFileUploader ( $allowedExtensions, $sizeLimit );
		$result = $uploader->handleUpload ( $folder );
		$return = htmlspecialchars ( json_encode ( $result ), ENT_NOQUOTES );
		$fileSize = filesize ( $folder . $result ['filename'] ); // GETTING FILE SIZE
		$fileName = $result ['filename']; // GETTING FILE NAME
		
		if (! empty ( $fileName )) {
			if($userId){
				$fan = User::model ()->findByPk($userId);
				$fan->image = $fileName;
				$fan->save();
			}
		}
		
		echo $return; // it's array
	}
	
	
	public function actionRemoveFanPic(){
		$userId = Yii::app()->user->getId();
		if($userId){
			$fan = User::model ()->findByPk($userId);
			$fan->image = "";
			$fan->save();
		}
	}
	
	public function passwordEncode($password) {
		return base64_encode ( base64_encode ( $password ) );
	}
	
	public function base64Encode($password){
		
		$password = $_GET['Password'];		
		$model = new Fan();		
		$model->attributes = $_POST['Fan'];		
		if($model->save()){
			$this->redirect(array('site/index'));
		}
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