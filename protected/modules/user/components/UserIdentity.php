<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$username=strtolower($this->username); // 将用户名转换为小写
		
		$emailValidator = new CEmailValidator();	// email验证器
		if($emailValidator->validateValue($username)) // 如果用户名是email
			$user = User::model()->find('LOWER(email)=?',array($username));	// 根据email查找用户
		else
			$user = User::model()->find('LOWER(name)=?',array($username));	// 根据name查找用户
		
		if($user===null)	// 如果用户为空
			$this->errorCode=self::ERROR_USERNAME_INVALID;	// 返回用户名称错误
		elseif(! $user->validatePassword($this->password)) 	// 如果密码验证失败
			$this->errorCode=self::ERROR_PASSWORD_INVALID;	// 返回密码错误
		else{		// 通过验证
			$user->setDefaultState();
			
			$user->login_count++;											// 登录次数+1
			$user->last_login_time = time();								// 登录时间
			$user->last_login_ip = Yii::app()->request->userHostAddress;	// 登录ip
			$user->save();

			if($user->redirect)												// 如果设置自动跳转, 登录后自动跳转
				Yii::app()->request->redirect($user->redirect);
				
			$this->errorCode=self::ERROR_NONE;
		}

		return !$this->errorCode;
	}
	
	
}