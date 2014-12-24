<?php
class Coursestaf extends CActiveRecord{
	public function tableName()
	{
		return 'coursestaf';
	}
	public function rules()
	{
		return array(
			array('emid, idcourse', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, emid, idcourse', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
                'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
                'employee' => array(self::BELONGS_TO, 'Employee', 'employee_id'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'emid' => 'id พนักงาน',
			'idcourse' => 'id คอร์ส',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('emid',$this->emid,true);
		$criteria->compare('idcourse',$this->idcourse,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public static function isstaff($pk) {
          $criteria = new CDbCriteria ();
          $criteria->condition = 'emid=:emid';
          $criteria->params = array(
            ':emid' =>  Yii::app()->user->getuser_id()
         );
        $model=self::model()->findAll($criteria);     
        return count($model)>0;     
        } 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
