<?php

/**
 * This is the model class for table "sys_user".
 *
 * The followings are the available columns in table 'sys_user':
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property integer $status
 */
class SysUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SysUser the static model class
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
		return 'sys_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password, salt', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name, salt', 'length', 'max'=>32),
			array('email', 'length', 'max'=>255),
			array('password', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, password, salt, status', 'safe', 'on'=>'search'),
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
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave() {
	    if ($this->isNewRecord){	// 如果是新建用户
			$this->salt = $this->getSalt();
			$this->password = $this->hashPassword($this->password, $this->salt);
			$this->create_time = $this->email_key_time = time();
			$this->create_ip = Yii::app()->request->userHostAddress;
	    }

	    return parent::beforeSave();
	}

	/*	计算Salt	*/
	public function getSalt()
	{
		$str = '';
		$str = $str . $this->getChineseCharacter();
		$str = $str . $this->getChineseCharacter();
		$str = $str . $this->getChineseCharacter();
		$str = $str . $this->getChineseCharacter();
		$str = $str . $this->getChineseCharacter();
		$str = $str . $this->getChineseCharacter();
		return $str;
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
}