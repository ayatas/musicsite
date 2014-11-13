<?php

class PaymentController extends Controller
{
	public function actionIndex(){
		
		if(isset($_POST['submit'])){
	
		$paymentInfo['Order']['theTotal'] = $_POST['albumPrice'];
		$paymentInfo['Order']['description'] = "Some payment description here";
		$paymentInfo['Order']['quantity'] = '1';

		// call paypal 
		$result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo); 
		//Detect Errors 
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later';
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			$this->render('message',array('message'=>$error));
			//Yii::app()->end();
			
		}else { 
			Yii::app()->session['albumPrice'] = $_POST['albumPrice'];
			// send user to paypal 
			$token = urldecode($result["TOKEN"]); 
			
			$payPalURL = Yii::app()->Paypal->paypalUrl.$token; 
			$this->redirect($payPalURL); 
		}
		}
	}
	
	public function actionConfirm()
	{	
		$token = trim($_GET['token']);
		$payerId = trim($_GET['PayerID']);
		
		$result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);
		
		$result['PAYERID'] = $payerId; 
		$result['TOKEN'] = $token; 
		$result['ORDERTOTAL'] = Yii::app()->session['albumPrice'];

		//Detect errors 
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later';
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			$this->render('message',array('message'=>$error));
			Yii::app()->end();
		}else{ 
			
			$paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
			//Detect errors  
			if(!Yii::app()->Paypal->isCallSucceeded($paymentResult)){
				if(Yii::app()->Paypal->apiLive === true){
					//Live mode basic error message
					$error = 'We were unable to process your request. Please try again later';
				}else{
					//Sandbox output the actual error message to dive in.
					$error = $paymentResult['L_LONGMESSAGE0'];
				}
				$this->render('message',array('message'=>$error));
				//Yii::app()->end();
			}else{
				
				//Payment was completed successfully
								
				$model = new Transactions();
				$model->userId = 1;
				$model->transactionId = $paymentResult['TRANSACTIONID'];
				$model->transactionStatus = "success";
				$model->save();
				$this->render('confirm');
			}
		}
	}
        
    public function actionCancel()
	{
		//The token of the cancelled payment typically used to cancel the payment within your application
		$token = $_GET['token'];				
		$this->render('cancel');
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