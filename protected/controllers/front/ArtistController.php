<?php
class ArtistController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionSignup()
	{
		$model = new User('create');
		$model1 =  new Artist('create');
		if(isset($_POST['User'])){
			$model->attributes = $_POST['User'];
			if($model->validate())
			{
				$model->password = $this->passwordEncode($_POST['User']['password']);
				if($model->save()):
					$model1->attributes = $_POST['Artist'];
					$model1->userId = $model->id;
					$model1->genreId = '1';
					if($model1->save()):
						$this->redirect(array('artist/login'));
					endif;
				endif;
			}
		}
		$this->render('signup', array('model' => $model,'model1' => $model1));
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
				if ($model->validate() )
				{
					if($model->login() == "")
					{
						$this->redirect('account');
					}
				}
		}
		$this->render('login', array('model' => $model));	
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
		$model=Artist::model()->find('userId = :userId', array(':userId' => Yii::app()->session['userid']));
		$model->scenario = 'update';
		$model1 = User::model()->findByPk(Yii::app()->session['userid']);
		$model1->scenario = 'update';
		//$model1 = new User('update');
		// uncomment the following code to enable ajax-based validation
		if(isset($_POST['ajax']) && $_POST['ajax']==='artist-profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['Artist']))
		{
			$model->attributes=$_POST['Artist'];
			$model1->attributes=$_POST['User'];
			if($model->validate() && $model1->validate())
			{
				// form inputs are valid, do something here
				$model->save();
				$model1->save();
				$this->redirect('/artist/profile');
				return;
			}
		}
		$this->render('profile',array('model'=>$model,'model1'=>$model1));
	}
}
