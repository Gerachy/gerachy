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
	public $notice;

	CONST minLengthUserName = 1;
	CONST maxLengthUserName = 32;
	CONST minLengthPassword = 1;	
	CONST maxLengthPassword = 32;
	
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
			array('username, email, password, passwordRepeat', 'authenticate'),
			array('username', 'authenticateOnSignUp',	'on'=>'signUp'),
			array('username', 'authenticateOnEdit', 	'on'=>'edit'),
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
	 * 验证的内容
	 */
	public function authenticate($attribute,$params)
	{
		$this->isUserNameLengthIllegal();
		$this->isUserName();
		$this->isEmail();			
		$this->isPasswordLengthIllegal();
		$this->isPasswordRepeatIsWrong();
	}
	
	/**
	 * 注册时验证的内容
	 */
	public function authenticateOnSignUp($attribute,$params)
	{
		if(!$this->hasErrors())	{
			$this->isUserName();
			$this->isUserNameExist();
			$this->isEmailExist();
		}
	}

	/**
	 * 编辑时验证的内容
	 */	
	public function authenticateOnEdit($attribute,$params)
	{
		if(! $this->hasErrors())	{
			$this->isUserNameExistByOthers();	// 用户名已存在,但不为自己
			$this->isEmailExistByOthers();		// Email已存在,但不为自己
			if(! $this->hasErrors()) {
				$user = User::model()->findByPk(Yii::app()->user->id);
				$user->name = $this->username;
				$user->email = $this->email;
				$user->password = $this->password;	
				$user->setDefaultState();	// 更新用户当前资料				
				if($user->save())
					$this->addError('notice','saved');
				else
					$this->addError('notice','saving failed');
			}
		}
	}
	
	// 用户名应在6-32之间
	public function isUserNameLengthIllegal()
	{
		if(mb_strlen($this->username) < self::minLengthUserName || mb_strlen($this->username) > self::maxLengthUserName)
			$this->addError('username','username length should >= ' . self::minLengthUserName . ' and <= ' . self::maxLengthUserName);	
	}	

	// 判断用户名格式, 是否包含非法字符
	// 允许范围 : 汉字,日文,韩文,数字,字母,下划线
	public function isUserName()
	{
		if(! Regex::isUserName($this->username))
			$this->addError('username','illegal characters in username.');	
	}
	
	// 用户名已存在
	public function isUserNameExist()
	{
		if(User::ifAttributeExist('name', $this->username))
			$this->addError('username','username has exist.');	
	}

	// 用户名已存在,但不为自己
	public function isUserNameExistByOthers()
	{
		if(User::ifAttributeExist('name', $this->username) && $this->username != Yii::app()->user->name)
			$this->addError('username','username has exist.');	
	}
	
	// 判断邮箱格式
	public function isEmail()
	{
		$v =new CEmailValidator();
		if(! $v->validateValue($this->email)) 
			$this->addError('email','Incorrect Email.');
	}
	
	// Email已存在
	public function isEmailExist()
	{	
		if(User::ifAttributeExist('email', $this->email)) 
			$this->addError('email','email has exist.');
	}

	// Email已存在,但不为自己
	public function isEmailExistByOthers()
	{	
		if(User::ifAttributeExist('email', $this->email) && $this->email != Yii::app()->user->email) 
			$this->addError('email','email has exist.');
	}
	
	// 密码长度应该大于6
	public function isPasswordLengthIllegal()
	{	
		if(strlen($this->password) < self::minLengthPassword  || strlen($this->password) > self::maxLengthPassword) 
			$this->addError('password','password length should >= ' . self::minLengthPassword . ' and <= ' . self::maxLengthPassword);
	}
	
	// 密码重复应该于密码一致
	public function isPasswordRepeatIsWrong()
	{	
		if($this->password != $this->passwordRepeat) 
			$this->addError('passwordRepeat','passwordRepeat should = password');
	}	
}
