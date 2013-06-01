<?php

/**
 * SignUpForm class.
 * SignUpForm is the data structure for keeping
 * user signup form data. It is used by the 'signup' action of 'SiteController'.
 */
class SignUpForm extends CFormModel
{
	public $username;
	public $email;
	public $password;
	public $passwordRepeat;	
	public $rememberMe;

	CONST minLengthUserName = 1;
	CONST maxLengthUserName = 32;
	CONST minLengthPassword = 1;	
	
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and email and password are required
			array('username, email, password, passwordRepeat', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			// 用户名应在6-32之间
			if(mb_strlen($this->username) < self::minLengthUserName || mb_strlen($this->username) > self::maxLengthUserName)
				$this->addError('username','username length should >= ' . self::minLengthUserName . ' and <= ' . self::maxLengthUserName);
			
			// 用户名重复
			if(User::ifAttributeExist('name', $this->username))
				$this->addError('username','username has exist.');

			// 判断邮箱格式
			$v =new CEmailValidator();
			if(! $v->validateValue($this->email)) 
				$this->addError('email','Incorrect Email.');
			
			// email重复
			if(User::ifAttributeExist('email', $this->email)) 
				$this->addError('email','email has exist.');
			
			// 密码长度应该大于6
			if(strlen($this->password) < self::minLengthPassword) 
				$this->addError('password','password length should >= ' . self::minLengthPassword);

			// 密码重复应该于密码一致
			if($this->password != $this->passwordRepeat) 
				$this->addError('passwordRepeat','passwordRepeat should = password');
		}
	}

}
