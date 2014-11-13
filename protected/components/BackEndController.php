<?php
class BackEndController extends CController
{
    public $layout = 'column1';
    public $menu = array();
    public $breadcrumbs = array();

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {

        return array(
            array('allow'  ,
                'users'  =>array('*'),
                'actions'=>array('login'),
            ),
            array('allow',
                'users'=>array('@'),
				'expression' => 'Adminusers::model()->findByPk(Yii::app()->user->getId())',				
            ),
            array('deny' ,
                'users'=>array('*'),
				'deniedCallback' => array($this, 'redirecting'),
            ),
        );
    }
	
		public function redirecting(){
			$this->redirect(array('/site/login'));
		}
}