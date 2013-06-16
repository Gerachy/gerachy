<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property string $redirect
 * @property string $login_count
 * @property string $last_login_ip
 * @property string $last_login_time
 * @property string $create_ip
 * @property string $create_time
 * @property string $modify_time
 * @property integer $status
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('id, login_count, last_login_time, create_time, modify_time', 'length', 'max'=>10),
			array('name, salt', 'length', 'max'=>32),
			array('email, redirect', 'length', 'max'=>255),
			array('password', 'length', 'max'=>40),
			array('last_login_ip, create_ip', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, password, salt, redirect, login_count, last_login_ip, last_login_time, create_ip, create_time, modify_time, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'salt' => 'Salt',
			'redirect' => 'Redirect',
			'login_count' => 'Login Count',
			'last_login_ip' => 'Last Login Ip',
			'last_login_time' => 'Last Login Time',
			'create_ip' => 'Create Ip',
			'create_time' => 'Create Time',
			'modify_time' => 'Modify Time',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('redirect',$this->redirect,true);
		$criteria->compare('login_count',$this->login_count,true);
		$criteria->compare('last_login_ip',$this->last_login_ip,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('create_ip',$this->create_ip,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('modify_time',$this->modify_time,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected $_password = null;
	public function afterFind() {
		$this->_password = $this->password;

	}
	
	public function beforeSave() {
	    if ($this->isNewRecord){	// 如果是新建用户
			$this->create_ip = Yii::app()->request->userHostAddress;			
			$this->create_time = time();		
	    }
		// 注册和修改密码时前后密码不一致,说明是新密码或者修改密码,则变更salt和密码
		if($this->_password != $this->password){
			$this->salt = $this->getSalt();
			$this->password = $this->hashPassword($this->password, $this->salt);
		}
		$this->last_login_ip = Yii::app()->request->userHostAddress;
		$this->last_login_time = time();
		$this->login_count = 1;			
	    return parent::beforeSave();
	}

	/*	计算Salt	*/
	public function getSalt()
	{
		// $str = '';
		// $str = $str . $this->getChineseCharacter();
		// $str = $str . $this->getChineseCharacter();
		// $str = $str . $this->getChineseCharacter();
		// $str = $str . $this->getChineseCharacter();
		// $str = $str . $this->getChineseCharacter();
		// $str = $str . $this->getChineseCharacter();
		// return $str;
		return rand(0,99);
	}

	/*	计算随机中文字符	*/
	public function getChineseCharacter()
	{
		$unidec = rand(19968, 40869);
		$unichr = '&#' . $unidec . ';';
		$zhcnchr = mb_convert_encoding($unichr, "UTF-8", "HTML-ENTITIES");
		return $zhcnchr;
	}	
	
	/*	验证密码	*/
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt) === $this->password;
	}

	/*	返回hash密码	*/
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}
	
	public static function ifAttributeExist($attribute,$value)
	{
		return self::model()->find($attribute .' = :value',array(':value' => $value,));
	}	
}