<?php

/**
 * This is the model class for table "training_history".
 *
 * The followings are the available columns in table 'training_history':
 * @property integer $id
 * @property string $cu_id
 * @property string $name
 * @property string $image
 * @property string $start
 * @property string $dayend
 * @property string $dayopencoure
 * @property string $dayclose
 * @property integer $time
 * @property string $location
 * @property string $typelocation
 * @property string $type
 * @property string $discription
 * @property integer $num_max
 * @property double $price
 * @property string $trainer
 * @property string $categorycourse
 * @property integer $employee_id
 *
 * The followings are the available model relations:
 * @property Employee $employee
 */
class TrainingHistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'training_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id', 'required'),
			array('time, num_max, employee_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('cu_id', 'length', 'max'=>45),
			array('typelocation, type', 'length', 'max'=>2),
			array('name, image, start, dayend, dayopencoure, dayclose, location, discription, trainer, categorycourse', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cu_id, name, image, start, dayend, dayopencoure, dayclose, time, location, typelocation, type, discription, num_max, price, trainer, categorycourse, employee_id', 'safe', 'on'=>'search'),
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
			'employee' => array(self::BELONGS_TO, 'Employee', 'employee_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'auto',
			'cu_id' => 'รหัส คอร์ด',
			'name' => 'ชื่อ course',
			'image' => 'รูป',
			'start' => 'วันแรก',
			'dayend' => 'วันสุดท้าย',
			'dayopencoure' => 'วันที่เปิดคอร์ด',
			'dayclose' => 'วันที่ปิดคอร์ด',
			'time' => 'เวลาที่ใช้ในการเก็บต่อวัน',
			'location' => 'สถานที่',
			'typelocation' => 'สถานที่/ภายใน/ภายนอก',
			'type' => 'ประเภท course it จิตวิท ',
			'discription' => 'รายละเอียด',
			'num_max' => 'จำนวนผู้อบรม',
			'price' => 'ราคา คอร์ด',
			'trainer' => 'ชื่อวิทยากร',
			'categorycourse' => 'ประเภท course it จิตวิท ',
			'employee_id' => 'รหัสพนักงาน',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('cu_id',$this->cu_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('dayend',$this->dayend,true);
		$criteria->compare('dayopencoure',$this->dayopencoure,true);
		$criteria->compare('dayclose',$this->dayclose,true);
		$criteria->compare('time',$this->time);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('typelocation',$this->typelocation,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('discription',$this->discription,true);
		$criteria->compare('num_max',$this->num_max);
		$criteria->compare('price',$this->price);
		$criteria->compare('trainer',$this->trainer,true);
		$criteria->compare('categorycourse',$this->categorycourse,true);
		$criteria->compare('employee_id',$this->employee_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrainingHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
