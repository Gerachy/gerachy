<?php

/**
 * This is the model class for table "accounts_detail".
 *
 * The followings are the available columns in table 'accounts_detail':
 * @property string $id
 * @property string $accounts
 * @property string $year
 * @property string $month
 * @property string $day
 * @property integer $voucher1
 * @property integer $voucher2
 * @property integer $voucher
 * @property string $summary
 * @property string $debit
 * @property string $credit
  * @property string $create_time
 * @property string $modify_time
 * @property integer $status
 */
class AccountsDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccountsDetail the static model class
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
		return 'accounts_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('accounts, year, month, day, summary', 'required'),
			array('voucher1, voucher2, voucher, status', 'numerical', 'integerOnly'=>true),
			array('accounts, create_time, modify_time', 'length', 'max'=>10),
			array('year', 'length', 'max'=>4),
			array('month, day', 'length', 'max'=>2),
			array('summary', 'length', 'max'=>64),
			array('debit, credit', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, accounts, year, month, day, voucher1, voucher2, voucher, summary, debit, credit, create_time, modify_time, status', 'safe', 'on'=>'search'),
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
			'accounts' => '账户',
			'year' => '年',
			'month' => '月',
			'day' => '日',
			'voucher1' => '凭证号（不填）',
			'voucher2' => '凭证号（外部）',
			'voucher' => '凭证外部号（内部）',
			'summary' => '摘要',
			'debit' => '借方',
			'credit' => '贷方',
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
		$criteria->compare('accounts',$this->accounts,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('month',$this->month,true);
		$criteria->compare('day',$this->day,true);
		$criteria->compare('voucher1',$this->voucher1);
		$criteria->compare('voucher2',$this->voucher2);
		$criteria->compare('voucher',$this->voucher);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('debit',$this->debit,true);
		$criteria->compare('credit',$this->credit,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('modify_time',$this->modify_time,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * 小数千分位符号的删除
	 */
    public function beforeSave() {
        $this->debit = str_replace(',', '', $this->debit);
        $this->credit = str_replace(',', '', $this->credit);
   
        return parent::beforeSave();
    }	
}