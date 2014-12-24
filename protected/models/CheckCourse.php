<?php
class CheckCourse extends CActiveRecord{
 
	public function tableName()
	{
		return 'check_course';
	}
 
	public function rules()
	{
 
		return array(
			//array('course_id, employee_id', 'required'),
			//array('course_id, employee_id', 'numerical', 'integerOnly'=>true),
			//array('check', 'length', 'max'=>2),
			array('day', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, check, day, course_id, employee_id', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'employee' => array(self::BELONGS_TO, 'Employee', 'employee_id'),
			'files' => array(self::HAS_MANY, 'Files', 'check_course_id'),
		);
	}

 
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'check' => 'มากับไม่มา',
			'day' => 'วันที่',
			'course_id' => 'รหัส course',
			'employee_id' => 'รหัส ผู้อบรม',
		);
	}
 
public function search(){
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('check',$this->check,true);
		$criteria->compare('day',$this->day,true);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('employee_id',$this->employee_id);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
 }

public static function getscoreByuser($courseid) {
$daynow= date('Y-m-d');      
$sql='SELECT sum(score)as score FROM check_course WHERE course_id="'.$courseid.'" AND employee_id="'.Yii::app()->user->getuser_id().'";';    
$dbCommand = Yii::app()->db->createCommand($sql);
 //var_dump($sql);
$data=$dbCommand->queryRow();
    if(count($data)>0){
     return $data['score'];  
    }
 return 'error';    
}

public static function getscoreByusernew($courseid,$userid) {
$daynow= date('Y-m-d');      
$sql='SELECT sum(score)as score FROM check_course WHERE course_id="'.$courseid.'" AND employee_id="'.$userid.'";';    
$dbCommand = Yii::app()->db->createCommand($sql);
 //var_dump($sql);
$data=$dbCommand->queryRow();
    if(count($data)>0){
     return $data['score'];  
    }
 return 'error';    
} 
 
public static function ischeckday($day,$id) {
$mysql="SELECT cr.approval
FROM course_register cr,check_course ck
WHERE cr.course_id= cr.course_id AND cr.approval=1 AND ck.day='".$day."' AND cr.course_id='".$id."'";
     //   $sql = "SELECT * FROM table WHERE colname = '" . $_POST['data'] . "'";
        $dbCommand = Yii::app()->db->createCommand($mysql);
        $data = $dbCommand->queryAll();
        return count($data)<=0;
 }
public static function model($className=__CLASS__){
return parent::model($className);
}
}
