<?php
class ArtistController extends Controller {
	public $counter = 0;
	
	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array (
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha' => array (
						'class' => 'CCaptchaAction',
						'backColor' => 0xFFFFFF 
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page' => array (
						'class' => 'CViewAction' 
				) 
		);
	}
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
		return array (
				array (
						'allow', // allow all users to perform 'index' and 'view' actions
						'actions' => array (
								'index',
								'signup',
								'login',
								'account',
								'profile',
								'site',
								'captcha',
								'saveArtistBio',
								'embedAlbum',
								'embeddedPlayer',
								'payment' 
						),
						'users' => array (
								'*' 
						) 
				),
				array (
						'allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions' => array (
								'addAlbum',
								'editAlbum',
								'addtrack',
								'upload',
								'removeAlbumImage',
								'getAlbumImage',
								'uploadTrack',
								'addTrackBlock',
								'removeAlbumTrack',
								'trackArtUpload',
								'getTrackImage',
								'removeTrackImage',
								'getHeaderImage',
								'uploadHeaderImage',
								'uploadArtistImage',
								'removeAlbumHeader',
								'removeArtistImage',
								'getArtistImage',
								'uploadBackgroundImage',
								'removeBackgroundImage',
								'getBackGroundImage',
								'deleteAlbum',
								'deleteTrack' 
						),
						'users' => array (
								'@' 
						) 
				),
				array (
						'deny', // deny all users
						'users' => array (
								'*' 
						) 
				) 
		);
	}
	public function actionSite() {
		$this->layout = 'album';
		$album = array ();
		$track = array ();
		$contactModel = new ContactForm ();
		
		if (isset ( $_GET ['domain'] ))
			$model = Artist::model ()->findByAttributes ( array (
					"url" => $_GET ['domain'] 
			) );
		else
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if (empty ( $model ))
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if (isset ( $_GET ['album'] ))
			$album = Albums::model ()->findByAttributes ( array (
					'artistId' => $model->id,
					'slug' => $_GET ['album'] 
			) );
			
			// if(empty($album))
			// $this->redirect(array('artist/account'));
		
		if (isset ( $_GET ['track'] ))
			$track = Tracks::model ()->findByAttributes ( array (
					'artistId' => $model->id,
					'albumId' => $album->id,
					'slug' => $_GET ['track'] 
			) );
		
		if (Design::model ()->findByAttributes ( array (
				'artistId' => $model->id 
		) )) {
			$design = Design::model ()->findByAttributes ( array (
					'artistId' => $model->id 
			) );
		} else {
			$design = new Design ();
			$design->bodyColor = '#FFFFFF';
			$design->backgroundColor = '#efefef';
			$design->linkColor = '#0066cc';
			$design->secondaryTextColor = '#555555';
			$design->textColor = '#000000';
		}
		
		if (isset ( $_POST ['Design'] )) {
			$img = $design->backgroundImage;
			$design->attributes = $_POST ['Design'];
			
			if (empty ( $design->backgroundImage ))
				unlink ( 'images/background/' . $img );
			
			$design->artistId = $model->id;
			if ($design->save ()) {
				$this->redirect ( array (
						'artist/site',
						'domain' => $_GET ['domain'] 
				) );
			}
		}
		
		if (isset ( $_POST ['ContactForm'] )) {
			$contactModel->attributes = $_POST ['ContactForm'];
			if ($contactModel->validate ()) {
				$name = '=?UTF-8?B?' . base64_encode ( $contactModel->name ) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode ( $contactModel->subject ) . '?=';
				$headers = "From: $name <{$contactModel->email}>\r\n" . "Reply-To: {$contactModel->email}\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=UTF-8";
				
				mail ( $model->user->email, $subject, $contactModel->body, $headers );
				Yii::app ()->user->setFlash ( 'contact', 'Thank you for contacting us. We will respond to you as soon as possible.' );
				$this->refresh ();
			}
		}
		
		$this->render ( 'album', array (
				'model' => $model,
				'album' => $album,
				'track' => $track,
				'contactModel' => $contactModel,
				'design' => $design 
		) );
	}
	public function actionIndex() {
		$this->render ( 'index' );
	}
	public function actionSignup() {
		$model = new User ( 'create' );
		$model1 = new Artist ( 'create' );
		if (isset ( $_POST ['User'], $_POST ['Artist'] )) {
			$model->attributes = $_POST ['User'];
			$model->password = $this->passwordEncode ( $_POST ['User'] ['password'] );
			
			$model1->attributes = $_POST ['Artist'];
			
			$valid = $model->validate ();
			$valid = $valid && $model1->validate ();
			
			if ($valid) {
				$model->save ();
				$model1->userId = $model->id;
				$model1->save ();
				$this->redirect ( array (
						'site/login' 
				) );
			}
		}
		$this->render ( 'signup', array (
				'model' => $model,
				'model1' => $model1 
		) );
	}
	public function actionLogin() {
		$model = new User ( 'login' );
		// if it is ajax validation request
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'login-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
		// collect user input data
		if (isset ( $_POST ['User'] )) {
			$model->attributes = $_POST ['User'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate ()) {
				if ($model->login () == "") {
					$this->redirect ( 'account' );
				}
			}
		}
		$this->render ( 'login', array (
				'model' => $model 
		) );
	}
	public function passwordEncode($password) {
		return base64_encode ( base64_encode ( $password ) );
	}
	public function actionAccount() {
		$model = User::model ()->findByPk ( Yii::app ()->user->getId () );
		$this->render ( 'account', array (
				'model' => $model 
		) );
	}
	public function actionProfile() {
		$model = Artist::model ()->find ( 'userId = :userId', array (
				':userId' => Yii::app ()->user->getId () 
		) );
		$model->scenario = 'update';
		$model1 = User::model ()->findByPk ( Yii::app ()->user->getId () );
		$model1->scenario = 'update';
		// $model1 = new User('update');
		// uncomment the following code to enable ajax - based validation
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'artist-profile-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
		if (isset ( $_POST ['Artist'] )) {
			$model->attributes = $_POST ['Artist'];
			$model1->attributes = $_POST ['User'];
			if ($model->validate () && $model1->validate ()) {
				// form inputs are valid, do something here
				$model->save ();
				$model1->save ();
				$this->redirect ( '/artist/profile' );
				return;
			}
		}
		$this->render ( 'profile', array (
				'model' => $model,
				'model1' => $model1 
		) );
	}
	public function actionRemoveAlbumHeader() {
		$user = User::model ()->findByPk ( Yii::app ()->user->getId () );
		$artist = Artist::model ()->findByPk ( $user->artists->id );
		unlink ( 'images/albumHeader/' . $artist->customHeader );
		$artist->customHeader = "";
		$artist->save ();
		echo "";
		Yii::app ()->end ();
	}
	public function actionRemoveArtistImage() {
		$user = User::model ()->findByPk ( Yii::app ()->user->getId () );
		unlink ( 'images/artist/' . $user->image );
		$user->image = "";
		$user->save ();
		echo "";
		Yii::app ()->end ();
	}
	public function actionAddalbum() {
		$user = User::model ()->findByPk ( Yii::app ()->user->getId () );
		$model = new Albums ();
		$model->price = "7.00";
		$model->payMore = 1;
		
		if (isset ( $_POST ['Albums'] )) {
			$model->attributes = $_POST ['Albums'];
			$model->artistId = $user->artists->id;
			$model->slug = $this->toSlug ( $model->name );
			if ($model->releaseDate)
				$model->releaseDate = date ( "Y-m-d", strtotime ( $model->releaseDate ) );
			$model->createdDate = date ( "Y-m-d" );
			
			if ($model->save ()) {
				
				if (isset ( $_POST ['Tracks'] )) {
					$trackData = array ();
					foreach ( $_POST ['Tracks'] as $key => $val ) {
						$val = array_values ( $val );
						for($i = 0; $i < sizeof ( $val ); $i ++) {
							$trackData [$i] [$key] = $val [$i];
						}
					}
					
					foreach ( $trackData as $tlist ) {
						$track = new Tracks ();
						$track->attributes = $tlist;
						$track->artistId = $model->artistId;
						$track->albumId = $model->id;
						$track->slug = $this->getTrackSlug ( $track->name, 1 );
						$track->releaseDate = date ( "Y-m-d", strtotime ( $track->releaseDate ) );
						$track->save ();
					}
				}
				unset ( Yii::app ()->session ['trackId'] );
				Yii::app ()->user->setFlash ( 'addalbum', 'Album successfully created.' );
				$this->refresh ();
			}
		}
		
		$this->render ( 'addalbum', array (
				'model' => $model,
				'user' => $user 
		) );
	}
	public function actionEditAlbum() {
		$user = User::model ()->findByPk ( Yii::app ()->user->getId () );
		
		if (! isset ( $_GET ['domain'], $_GET ['slug'] ))
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if (Artist::model ()->findByAttributes ( array (
				"url" => $_GET ['domain'] 
		) ))
			$artist = Artist::model ()->findByAttributes ( array (
					"url" => $_GET ['domain'] 
			) );
		else
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if ($user->id != $artist->user->id)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if (Albums::model ()->findByAttributes ( array (
				'artistId' => $artist->id,
				'slug' => $_GET ['slug'] 
		) ))
			$model = Albums::model ()->findByAttributes ( array (
					'artistId' => $artist->id,
					'slug' => $_GET ['slug'] 
			) );
		else
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if ($model->releaseDate)
			$model->releaseDate = date ( "m/d/Y", strtotime ( $model->releaseDate ) );
		
		if (isset ( $_POST ['Albums'] )) {
			
			$model->attributes = $_POST ['Albums'];
			$model->slug = $this->toSlug ( $model->name );
			if ($model->releaseDate)
				$model->releaseDate = date ( "Y-m-d", strtotime ( $model->releaseDate ) );
			$model->updatedDate = date ( "Y-m-d" );
			
			if ($model->save ()) {
				
				$trackIdOld = array ();
				$trackIdNew = array ();
				foreach ( $model->tracks as $tids ) {
					$trackIdOld [] = $tids->id;
				}
				
				if (isset ( $_POST ['Tracks'] )) {
					
					$trackData = array ();
					foreach ( $_POST ['Tracks'] as $key => $val ) {
						$val = array_values ( $val );
						for($i = 0; $i < sizeof ( $val ); $i ++) {
							$trackData [$i] [$key] = $val [$i];
						}
					}
					foreach ( $trackData as $tlist ) {
						
						if (empty ( $tlist ['id'] )) {
							$track = new Tracks ();
						} else {
							$trackIdNew [] = $tlist ['id'];
							$track = Tracks::model ()->findByPk ( $tlist ['id'] );
						}
						$track->attributes = $tlist;
						$track->artistId = $model->artistId;
						$track->albumId = $model->id;
						$track->slug = $this->getTrackSlug ( $track->name, 1 );
						if ($track->releaseDate)
							$track->releaseDate = date ( "Y-m-d", strtotime ( $track->releaseDate ) );
						$track->save ();
					}
				}
				$delId = array_diff ( $trackIdOld, $trackIdNew );
				foreach ( $delId as $tid ) {
					Tracks::model ()->findByPk ( $tid )->delete ();
				}
				unset ( Yii::app ()->session ['trackId'] );
				Yii::app ()->user->setFlash ( 'addalbum', 'Album successfully updated.' );
				$this->refresh ();
			}
		}
		
		$this->render ( 'addalbum', array (
				'model' => $model,
				'user' => $user 
		) );
	}
	public function actionDeleteAlbum() {
		$user = User::model ()->findByPk ( Yii::app ()->user->getId () );
		
		if (! isset ( $_GET ['domain'], $_GET ['slug'] ))
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if (Artist::model ()->findByAttributes ( array (
				"url" => $_GET ['domain'] 
		) ))
			$artist = Artist::model ()->findByAttributes ( array (
					"url" => $_GET ['domain'] 
			) );
		else
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if ($user->id != $artist->user->id)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if (Albums::model ()->findByAttributes ( array (
				'artistId' => $artist->id,
				'slug' => $_GET ['slug'] 
		) )) {
			$album = Albums::model ()->findByAttributes ( array (
					'artistId' => $artist->id,
					'slug' => $_GET ['slug'] 
			) );
			if ($album->tracks) {
				Tracks::model ()->deleteAllByAttributes ( array (
						'albumId' => $album->id,
						'artistId' => $artist->id 
				) );
			}
			$album->delete ();
			$this->redirect ( array (
					'artist/site',
					'domain' => $_GET ['domain'] 
			) );
		}
	}
	public function toSlug($string) {
		return strtolower ( trim ( preg_replace ( '/[^A-Za-z0-9-]+/', '-', $string ) ) );
	}
	public function actionUploadHeaderImage() {
		$user = User::model ()->findByPk ( Yii::app ()->user->getId () );
		
		Yii::import ( "ext.EAjaxUpload.qqFileUploader" );
		$folder = Yii::getPathOfAlias ( 'webroot' ) . '/images/albumHeader/'; // folder for uploaded files
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
			$artist = Artist::model ()->findByPk ( $user->artists->id );
			$artist->customHeader = $fileName;
			$artist->save ();
		}
		echo $return; // it's array
	}
	public function actionUploadBackgroundImage() {
		Yii::import ( "ext.EAjaxUpload.qqFileUploader" );
		$folder = Yii::getPathOfAlias ( 'webroot' ) . '/images/background/'; // folder for uploaded files
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
		
		echo $return; // it's array
	}
	public function actionUploadArtistImage() {
		$user = User::model ()->findByPk ( Yii::app ()->user->getId () );
		
		Yii::import ( "ext.EAjaxUpload.qqFileUploader" );
		$folder = Yii::getPathOfAlias ( 'webroot' ) . '/images/artist/'; // folder for uploaded files
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
			$user->image = $fileName;
			$user->save ();
		}
		echo $return; // it's array
	}
	public function actionUpload() {
		Yii::import ( "ext.EAjaxUpload.qqFileUploader" );
		$folder = Yii::getPathOfAlias ( 'webroot' ) . '/images/albums/'; // folder for uploaded files
		$allowedExtensions = array (
				"jpg",
				"jpeg",
				"gif",
				"png" 
		); // array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 4 * 1024 * 1024; // maximum file size in bytes
		$uploader = new qqFileUploader ( $allowedExtensions, $sizeLimit );
		$result = $uploader->handleUpload ( $folder );
		$return = htmlspecialchars ( json_encode ( $result ), ENT_NOQUOTES );
		$fileSize = filesize ( $folder . $result ['filename'] ); // GETTING FILE SIZE
		$fileName = $result ['filename']; // GETTING FILE NAME
		
		echo $return; // it's array
	}
	public function actionGetAlbumImage() {
		if (isset ( $_POST ['imageName'] )) {
			$url = Yii::app ()->request->baseUrl . '/images/albums/' . $_POST ['imageName'];
			echo '<img src="' . $url . '" alt="" width="210" height="210" />';
			
			echo CHtml::tag ( 'div', array (
					'onClick' => CHtml::ajax ( array (
							'type' => 'POST',
							'url' => array (
									'artist/removeAlbumImage' 
							),
							'data' => array (
									'imgName' => $_POST ['imageName'] 
							),
							'success' => 'function(data) {
					$(".album-image-block").hide();
					$(".image-upload-hint").show();
					$(".album-image-thumnail img").attr("src","");
				}',
							'update' => '.album-image-block' 
					) ),
					'class' => 'album-image-delete' 
			), '', true );
		}
	}
	public function actionRemoveAlbumImage() {
		if (isset ( $_POST ['imgName'] )) {
			unlink ( 'images/albums/' . $_POST ['imgName'] );
			echo '';
		}
	}
	public function actionUploadTrack() {
		Yii::import ( "ext.EAjaxUpload.qqFileUploader" );
		$folder = Yii::getPathOfAlias ( 'webroot' ) . '/audio/'; // folder for uploaded files
		$allowedExtensions = array (
				"mp3" 
		); // array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 291 * 1024 * 1024; // maximum file size in bytes
		$uploader = new qqFileUploader ( $allowedExtensions, $sizeLimit );
		$result = $uploader->handleUpload ( $folder );
		$return = htmlspecialchars ( json_encode ( $result ), ENT_NOQUOTES );
		$fileSize = filesize ( $folder . $result ['filename'] ); // GETTING FILE SIZE
		$fileName = $result ['filename']; // GETTING FILE NAME
		
		echo $return; // it's array
	}
	public function actionAddTrackBlock() {
		Yii::app ()->clientScript->scriptMap ['*.js'] = false;
		Yii::app ()->clientScript->scriptMap ['*.css'] = false;
		
		if (isset ( Yii::app ()->session ['trackId'] )) {
			$trackId = Yii::app ()->session ['trackId'];
		} else {
			Yii::app ()->session ['trackId'] = 0;
			$trackId = Yii::app ()->session ['trackId'];
		}
		$trackFile = '';
		$track = new Tracks ();
		$track->price = "1.00";
		$track->downloadable = 1;
		$track->payMore = 1;
		if (isset ( $_POST ['trackFile'] )) {
			$trackFile = $_POST ['trackFile'];
		}
		
		$this->renderPartial ( 'trackForm', array (
				'trackFile' => $trackFile,
				'track' => $track,
				'trackId' => $trackId,
				'selected' => 'selected' 
		), false, true );
		Yii::app ()->session ['trackId'] = $trackId + 1;
		Yii::app ()->end ();
	}
	public function actionRemoveAlbumTrack() {
		if (isset ( $_POST ['trackFile'] )) {
			unlink ( 'audio/' . $_POST ['trackFile'] );
			echo '';
		}
	}
	public function actionRemoveTrackImage() {
		if (isset ( $_POST ['imgName'] )) {
			unlink ( 'images/tracks/' . $_POST ['imgName'] );
			echo '';
		}
	}
	
	/*
	 * public function actionRemoveBackgroundImage(){ if(isset($_POST['imgName'])){ unlink('images/background/'.$_POST['imgName']); echo ''; } }
	 */
	public function actionTrackArtUpload() {
		Yii::import ( "ext.EAjaxUpload.qqFileUploader" );
		$folder = Yii::getPathOfAlias ( 'webroot' ) . '/images/tracks/'; // folder for uploaded files
		$allowedExtensions = array (
				"jpg",
				"jpeg",
				"gif",
				"png" 
		); // array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 4 * 1024 * 1024; // maximum file size in bytes
		$uploader = new qqFileUploader ( $allowedExtensions, $sizeLimit );
		$result = $uploader->handleUpload ( $folder );
		$return = htmlspecialchars ( json_encode ( $result ), ENT_NOQUOTES );
		$fileSize = filesize ( $folder . $result ['filename'] ); // GETTING FILE SIZE
		$fileName = $result ['filename']; // GETTING FILE NAME
		
		echo $return; // it's array
	}
	public function actionGetHeaderImage() {
		if (isset ( $_POST ['imageName'] )) {
			$url = Yii::app ()->request->baseUrl . '/images/albumHeader/' . $_POST ['imageName'];
			echo '<img src="' . Yii::app ()->request->baseUrl . '/timthumb.php?src=' . $url . '&w=945&h=180&zc=1" alt="" />';
			
			echo CHtml::tag ( 'a', array (
					'onClick' => CHtml::ajax ( array (
							'type' => 'POST',
							'url' => array (
									'artist/removeAlbumHeader' 
							),
							'success' => 'function(data) {
						$("#customHeaderWrapper .bannercontainer").html("");
						$("#customHeaderWrapper .bannercontainer").hide();
						$("#customHeaderWrapper #customHeaderBlank").show();					
					}' 
					) ),
					'class' => 'removeAlbum' 
			), 'X', true );
		}
	}
	
	/*
	 * public function actionGetBackGroundImage(){ if(isset($_POST['imageName'])){ echo CHtml::tag('a',array( 'onClick'=>CHtml::ajax(array( 'type'=>'POST', 'url'=>array('artist/removeBackgroundImage'), 'data'=>array('imgName' =>$_POST['imageName'] ), 'success'=>'function(data) { $("body").css("background-image", "none"); $("#siteBackgrondImageDelete").html(""); $("#siteBackgrondImageDelete").hide(); $("#siteBackgrondImage").show(); }', ) ), ),'Delete',true ); } }
	 */
	public function actionGetArtistImage() {
		if (isset ( $_POST ['imageName'] )) {
			$url = Yii::app ()->request->baseUrl . '/images/artist/' . $_POST ['imageName'];
			echo '<img src="' . Yii::app ()->request->baseUrl . '/timthumb.php?src=' . $url . '&w=120&h=100&zc=1" alt="" />';
			
			echo CHtml::tag ( 'a', array (
					'onClick' => CHtml::ajax ( array (
							'type' => 'POST',
							'url' => array (
									'artist/removeArtistImage' 
							),
							'beforeSend' => 'function(){if(confirm("Are you sure you want to delete image?")) { return true; } else{ return false; }}',
							'success' => 'function(data) {
						$(".artist-image").html(""); 
						$(".artists-bio-pic.portrait").addClass("empty");    	
						$(".artist-upload-hint").show();
						$(".artist-image").hide();  					
					}' 
					) ),
					'class' => 'removeAlbum' 
			), 'X', true );
		}
	}
	public function actionGetTrackImage() {
		if (isset ( $_POST ['imageName'] )) {
			$url = Yii::app ()->request->baseUrl . '/images/tracks/' . $_POST ['imageName'];
			echo '<img src="' . $url . '" alt="" width="210" height="210" />';
			
			if (isset ( $_POST ['tag'] )) {
				echo CHtml::tag ( 'div', array (
						'onClick' => CHtml::ajax ( array (
								'type' => 'POST',
								'url' => array (
										'artist/removeTrackImage' 
								),
								'data' => array (
										'imgName' => $_POST ['imageName'] 
								),
								'success' => 'function(data) {
					$(".track-image-block").html("");
					$(".track-image-block").hide();
					$(".image-upload-hint").show();
					$("#Tracks_image").val("");
					$("#trackThumb img").attr("src","");
					$("#trackThumb img").hide();
					$("#trackThumb .blank").show();
										
				}' 
						) ),
						'class' => 'track-image-delete' 
				), '', true );
			} else {
				echo CHtml::tag ( 'div', array (
						'onClick' => CHtml::ajax ( array (
								'type' => 'POST',
								'url' => array (
										'artist/removeTrackImage' 
								),
								'data' => array (
										'imgName' => $_POST ['imageName'] 
								),
								'success' => 'function(data) {
					$("ol.tracks li.track.selected .right-panel .image-upload-hint").show();
					$("ol.tracks li.track.selected .right-panel .track-image-block").hide();					
				}',
								'update' => '.track-image-block' 
						) ),
						'class' => 'track-image-delete' 
				), '', true );
			}
		}
	}
	public function actionSaveArtistBio() {
		$user = User::model ()->findByPk ( Yii::app ()->user->getId () );
		if (isset ( $_POST ['artistDescription'] )) {
			$user->bio = $_POST ['artistDescription'];
			$user->save ();
			echo $_POST ['artistDescription'];
		}
	}
	public function actionAddtrack() {
		$user = User::model ()->findByPk ( Yii::app ()->user->getId () );
		$model = new Tracks ();
		$model->price = "1.00";
		$model->payMore = 1;
		
		if (isset ( $_POST ['Tracks'] )) {
			$model->attributes = $_POST ['Tracks'];
			$model->artistId = $user->artists->id;
			$model->slug = $this->getTrackSlug ( $model->name, 1 );
			$model->releaseDate = date ( "Y-m-d", strtotime ( $model->releaseDate ) );
			if ($model->save ()) {
				$this->redirect ( array (
						'artist/site',
						'domain' => $user->artists->url 
				) );
			}
		}
		
		$this->render ( 'addtrack', array (
				'model' => $model,
				'user' => $user 
		) );
	}
	public function getTrackSlug($slug, $tag) {
		$slug = strtolower ( trim ( preg_replace ( '/[^A-Za-z0-9-]+/', '-', $slug ) ) );
		
		if ($tag == 1) :
			$return = $slug;
		 else :
			$return = $slug . '-' . $tag;
		endif;
		if (Tracks::model ()->findByAttributes ( array (
				'slug' => $return 
		) )) {
			$tag = $tag + 1;
			$return = $this->getTrackSlug ( $slug, $tag );
		}
		return $return;
	}
	public function actionDeleteTrack() {
		$user = User::model ()->findByPk ( Yii::app ()->user->getId () );
		
		if (! isset ( $_GET ['domain'], $_GET ['album'], $_GET ['track'] ))
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if (Artist::model ()->findByAttributes ( array (
				"url" => $_GET ['domain'] 
		) ))
			$artist = Artist::model ()->findByAttributes ( array (
					"url" => $_GET ['domain'] 
			) );
		else
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if ($user->id != $artist->user->id)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if (Tracks::model ()->findByAttributes ( array (
				'artistId' => $artist->id,
				'slug' => $_GET ['track'] 
		) )) {
			Tracks::model ()->DeleteAllByAttributes ( array (
					'artistId' => $artist->id,
					'slug' => $_GET ['track'] 
			) );
			$this->redirect ( array (
					'artist/site',
					'domain' => $_GET ['domain'] 
			) );
		}
	}
	public function actionEmbedAlbum() {
		
		Yii::app ()->clientScript->registerCssFile ( Yii::app ()->baseUrl . '/css/edittrack.css' );
		
		if (isset ( $_GET ['album'] )) {
			$model = Albums::model ()->findByAttributes ( array (
					'slug' => $_GET ['album'] 
			) );
		} else
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if (empty ( $model ))
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		$this->renderPartial ( 'embed-album', array (
				'model' => $model 
		), false, true );
	}
	public function actionEmbeddedPlayer() {
		if (isset ( $_GET ['album'] )) {
			$model = Albums::model ()->findByAttributes ( array (
					'slug' => $_GET ['album'] 
			) );
		} else
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		if (empty ( $model ))
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		
		$this->renderPartial ( 'embedded-player', array (
				'model' => $model 
		), false, true );
	}
	
}
