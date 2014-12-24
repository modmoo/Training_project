<?php
 
class Contactus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contactus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, to, email, detail', 'required'),
			array('to', 'length', 'max'=>205),
			array('email', 'length', 'max'=>200),
			array('id, name, to, email, detail', 'safe', 'on'=>'search'),
		);
	}
 
	public function relations()
	{
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
			'name' => 'ชื่อผู้ติดต่อ',
			'to' => 'เบอร์โทร',
			'email' => 'อีเมล',
			'detail' => 'รายละเอียดการติดต่อ',
		);
	}
 
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('to',$this->to,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('detail',$this->detail,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
