<?php

/**
 * This is the model class for table "accounts_voucher_detail".
 *
 * The followings are the available columns in table 'accounts_voucher_detail':
 * @property string $id
 * @property string $category
 * @property string $date_time
 * @property string $fare
 * @property string $create_time
 * @property string $modify_time
 * @property integer $status
 */
class AccountsVoucherDetail extends KActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccountsVoucherDetail the static model class
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
		return 'accounts_voucher_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category, date_time, fare, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('category', 'length', 'max'=>64),
			array('date_time, fare, create_time, modify_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category, date_time, fare, create_time, modify_time, status', 'safe', 'on'=>'search'),
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
			'category' => 'Category',
			'date_time' => 'Date Time',
			'fare' => 'Fare',
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
		$criteria->compare('category',$this->category,true);
		$criteria->compare('date_time',$this->date_time,true);
		$criteria->compare('fare',$this->fare,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('modify_time',$this->modify_time,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}