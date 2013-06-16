<?php

class ForgetPasswordForm extends CFormModel
{
	public $username;
	public $usernameType;	// 'username'为name或者email
	public $notice;

	public function rules()
	{
		return array(
			array('username', 'required'),
			array('username', 'authenticate'),
		);
	}

	/**
	 * 验证的内容
	 */
	public function authenticate($attribute,$params)
	{
		$v = new CEmailValidator();
		if(! $v->validateValue($this->username)) 
			$this->ifUserNameUnExist();
		else
			$this->ifEmailUnExist();
		
		if(! $this->hasErrors()) {

			if(User::resetPassword($this->usernameType,$this->username))	// 如果已经发送邮件	
				Yii::app()->user->setFlash('ForgetPassword',true);			// 设定一个flash提示
		}
	}

	// 用户名不存在
	public function ifUserNameUnExist()
	{
		if(! User::ifAttributeExist('name', $this->username))
			$this->addError('username','username has unexist.');
		else
			$this->usernameType = 'name';
	}
	
	// Email不存在
	public function ifEmailUnExist()
	{	
		if(! User::ifAttributeExist('email', $this->username)) 
			$this->addError('username','email has unexist.');
		else
			$this->usernameType = 'email';	
	}

}
