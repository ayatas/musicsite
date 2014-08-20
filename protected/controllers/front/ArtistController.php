<?php
class ArtistController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','signup','login','account','profile'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('addAlbum','upload','removeAlbumImage','getAlbumImage'),
				'users'=>array('@'),
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


    public function actionIndex()
    {
        $this->render('index');
    }
    public function actionSignup()
    {
        $model = new User('create');
        $model1= new Artist('create');
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate()) {
                $model->password = $this->passwordEncode($_POST['User']['password']);
                if ($model->save()):
                $model1->attributes = $_POST['Artist'];
                $model1->userId = $model->id;
                $model1->genreId = '1';
                if ($model1->save()):
                $this->redirect(array('artist/login'));
                endif;
                endif;
            }
        }
        $this->render('signup', array('model' => $model,'model1'=> $model1));
    }
    public function actionLogin()
    {
        $model = new User('login');
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() ) {
                if ($model->login() == "") {
                    $this->redirect('account');
                }
            }
        }
        $this->render('login', array('model'=> $model));
    }
    public function passwordEncode($password)
    {
        return base64_encode(base64_encode($password));
    }
    public function actionAccount()
    {
        $this->render('account');
    }
    public function actionProfile()
    {
        $model = Artist::model()->find('userId = :userId', array(':userId'=> Yii::app()->user->getId()));
        $model->scenario = 'update';
        $model1 = User::model()->findByPk(Yii::app()->user->getId());
        $model1->scenario = 'update';
        //$model1 = new User('update');
        // uncomment the following code to enable ajax - based validation
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'artist-profile-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['Artist'])) {
            $model->attributes = $_POST['Artist'];
            $model1->attributes = $_POST['User'];
            if ($model->validate() && $model1->validate()) {
                // form inputs are valid, do something here
                $model->save();
                $model1->save();
                $this->redirect('/artist/profile');
                return;
            }
        }
        $this->render('profile',array('model' =>$model,'model1'=>$model1));
    }
    public function actionAddalbum()
    {	
		$user = User::model()->findByPk(Yii::app()->user->getId());
		$model = new Albums;
		$model->price = "7.00";
		
		if(isset($_POST['Albums'])){			
			$model->attributes = $_POST['Albums'];
			$model->artistId = $user->id;			
			$model->releaseDate = date("Y-m-d", strtotime($model->releaseDate));
			$model->createdDate = date("Y-m-d");
			if($model->save())
			$this->redirect(array('artist/account'));
			
		}
		
		$this->render('addalbum',array(
			'model' => $model,
			'user' => $user,
			));
    }
	
	public function actionUpload()
	{
        $userID = Yii::app()->user->getId();
		Yii::import("ext.EAjaxUpload.qqFileUploader");
        $folder=Yii::getPathOfAlias('webroot').'/images/albums/';// folder for uploaded files
        $allowedExtensions = array("jpg","jpeg","gif","png");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 4 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES); 
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME  
		
		echo $return;// it's array
    }	
	
	public function actionGetAlbumImage(){
		
		if(isset($_POST['imageName'])){
			$url = Yii::app()->request->baseUrl.'/images/albums/'.$_POST['imageName'];
			echo '<img src="'.$url.'" alt="" width="210" height="210" />';			
			
			echo CHtml::tag('div',array(
				'onClick'=>CHtml::ajax(array(			
				'type'=>'POST',
				'url'=>array('artist/removeAlbumImage'),
				'data'=>array('imgName' =>$_POST['imageName'] ),
				'success'=>'function(data) {
					$(".album-image-block").hide();
					$(".image-upload-hint").show();
					$(".album-image-thumnail img").attr("src","");
				}',				
				'update'=>'.album-image-block',
				)
				),
				'class'=>'album-image-delete',
				),'',true
			);
			}
	}
		
    public function actionRemoveAlbumImage(){
		if(isset($_POST['imgName'])){
			unlink('images/albums/'.$_POST['imgName']);
			echo '';
		}
	}
	public function actionAddtrack()
    {
        $this->render('addtrack');
    }
}
