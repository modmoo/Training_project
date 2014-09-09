<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
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
 * @property string $discription
 * @property integer $num_max
 * @property double $price
 * @property string $trainer
 * @property string $active
 * @property string $categorycourse
 * @property integer $supprier_id
 *
 * The followings are the available model relations:
 * @property CheckCourse[] $checkCourses
 * @property Supprier $supprier
 * @property CourseRegister[] $courseRegisters
 * @property Files[] $files
 */
class Course extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('time, num_max, supprier_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('cu_id', 'length', 'max'=>45),
			array('typelocation, active', 'length', 'max'=>2),
			array('name, image, start, dayend, dayopencoure, dayclose, location, discription, trainer, categorycourse', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cu_id, name, image, start, dayend, dayopencoure, dayclose, time, location, typelocation, discription, num_max, price, trainer, active, categorycourse, supprier_id', 'safe', 'on'=>'search'),
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
			'checkCourses' => array(self::HAS_MANY, 'CheckCourse', 'course_id'),
			'supprier' => array(self::BELONGS_TO, 'Supprier', 'supprier_id'),
			'courseRegisters' => array(self::HAS_MANY, 'CourseRegister', 'course_id'),
			'files' => array(self::HAS_MANY, 'Files', 'course_id'),
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
			'discription' => 'รายละเอียด',
			'num_max' => 'จำนวนผู้อบรม',
			'price' => 'ราคา คอร์ด',
			'trainer' => 'ชื่อวิทยากร',
			'active' => 'สถานะ',
			'categorycourse' => 'ประเภท course it จิตวิท ',
			'supprier_id' => 'รหัส supprier',
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
		$criteria->compare('discription',$this->discription,true);
		$criteria->compare('num_max',$this->num_max);
		$criteria->compare('price',$this->price);
		$criteria->compare('trainer',$this->trainer,true);
		$criteria->compare('active',$this->active,true);
		$criteria->compare('categorycourse',$this->categorycourse,true);
		$criteria->compare('supprier_id',$this->supprier_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
                    protected function afterSave() {         
                            if($this->isNewRecord)
                             {
                                    $this->isNewRecord = false;
                                    $dateId = 'CU'.date("Y").date("m").date("d").sprintf("%04d",$this->id);
                                    $this->saveAttributes(array('cu_id'=>$dateId));
                                    $this->isNewRecord = true;   
                            }
                    }
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
