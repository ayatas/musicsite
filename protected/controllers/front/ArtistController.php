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
		$model1 =  new Artist;
		if(isset($_POST['User'])){
			$model->attributes = $_POST['User'];
			if($model->validate())
			{
				$model->password = $this->passwordEncode($_POST['User']['password']);
				$model->save();
				$this->redirect(array('artist/signup'));
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
				if ($model->validate() && $model->login())
				{
					echo "hello";
					exit;
					$this->redirect('account');
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
		echo "Hello";
	}
}
