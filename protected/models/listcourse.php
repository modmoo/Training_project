<?php
class listcourse extends CActiveRecord {
	public function tableName(){
	 return 'course_register';
	}
	public function relations(){
		return array(
		 'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
		 'employee' => array(self::BELONGS_TO, 'Employee', 'employee_id'),
		);
	}
        
}
