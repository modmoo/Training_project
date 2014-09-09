<?php

/**
 * This is the model class for table "supprier".
 *
 * The followings are the available columns in table 'supprier':
 * @property integer $id
 * @property string $idsuppier
 * @property string $name
 * @property string $tel
 * @property string $email
 * @property string $address
 * @property string $contact
 *
 * The followings are the available model relations:
 * @property Course[] $courses
 */
class Supprier extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supprier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idsuppier', 'length', 'max'=>45),
			array('name, tel, email, address, contact', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idsuppier, name, tel, email, address, contact', 'safe', 'on'=>'search'),
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
			'courses' => array(self::HAS_MANY, 'Course', 'supprier_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idsuppier' => 'รหัส supprier',
			'name' => 'ชื่อบริษัท/หน่อวยงาน',
			'tel' => 'เบอร์โทร',
			'email' => 'อีเมลล์',
			'address' => 'ที่อยู่',
			'contact' => 'ผู้ที่ประสานงาน',
		);
	}
 
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('idsuppier',$this->idsuppier,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contact',$this->contact,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
                     protected function afterSave() {         
                            if($this->isNewRecord)
                             {
                                    $this->isNewRecord = false;
                                    $dateId = 'SPE'.date("Y").date("m").date("d").sprintf("%02d",$this->id);
                                    $this->saveAttributes(array('idsuppier'=>$dateId));
                                    $this->isNewRecord = true;   
                            }
                    }
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
