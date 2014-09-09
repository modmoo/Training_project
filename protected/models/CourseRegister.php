<?php

/**
 * This is the model class for table "course_register".
 *
 * The followings are the available columns in table 'course_register':
 * @property integer $id
 * @property string $idcourse
 * @property string $time
 * @property string $approval
 * @property string $note
 * @property integer $course_id
 * @property integer $employee_id
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Employee $employee
 */
class CourseRegister extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'course_register';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, employee_id', 'required'),
			array('course_id, employee_id', 'numerical', 'integerOnly'=>true),
			array('idcourse', 'length', 'max'=>45),
			array('approval', 'length', 'max'=>2),
			array('time, note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idcourse, time, approval, note, course_id, employee_id', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'employee' => array(self::BELONGS_TO, 'Employee', 'employee_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idcourse' => 'รหัสการสมัคร',
			'time' => 'เวลาสมัคร',
			'approval' => 'อณมัติ / ไม่อณุมัติ',
			'note' => 'หมายเหตุ',
			'course_id' => 'รหัส course',
			'employee_id' => 'รหัสพนักงาน',
		);
	}
 
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('idcourse',$this->idcourse,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('approval',$this->approval,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('employee_id',$this->employee_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
protected function afterSave() {         
                            if($this->isNewRecord)
                             {
                                    $this->isNewRecord = false;
                                    $dateId = 'CR'.date("Y").date("m").date("d").sprintf("%04d",$this->id);
                                    $this->saveAttributes(array('idcourse'=>$dateId));
                                    $this->isNewRecord = true;   
                            }
                    }
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
