<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
	public $userrole;
	public function __construct($username, $password, $userrole)
	{
	    $this->username = $username;
	    $this->password = $password;
    	$this->userrole = $userrole;
	}
    public function authenticate()
    {
		if($this->userrole != "user")
		{
			$record=Adminusers::model()->findByAttributes(array('UserName'=>$this->username,'Status'=>'1'));
			if($record===null)
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			else if($record->Password!=md5($this->password))
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			else
			{
				$this->_id=$record->UserId;
				$this->errorCode=self::ERROR_NONE;
			}
		}
		else
		{
			$record=User::model()->findByAttributes(array('name'=>$this->username));
			if($record===null)
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			else if($record->password!=base64_encode(base64_encode(($this->password))))
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			else
			{
				$this->_id=$record->id;
				$this->errorCode=self::ERROR_NONE;
			}
		}
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}