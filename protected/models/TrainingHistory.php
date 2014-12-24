<?php
 
class TrainingHistory extends CActiveRecord{
	public function tableName()
	{
		return 'training_history';
	}
	public function rules(){
		return array(
		 	array('cu_id','unique'),
		//	array('time, num_max, employee_id', 'numerical', 'integerOnly'=>true),
		//	array('price', 'numerical'),
		//	array('cu_id', 'length', 'max'=>45),
		//	array('typelocation', 'length', 'max'=>2),
			array('name, image,dayopencoure, dayclose, location, discription, trainer, categorycourse', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cu_id, name, image,dayopencoure, dayclose, time, location, typelocation, discription, num_max, price, trainer, categorycourse, employee_id', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'employee' => array(self::BELONGS_TO, 'Employee', 'employee_id'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'auto',
			'cu_id' => 'รหัส คอร์ด',
			'name' => 'ชื่อ course',
			'image' => 'รูป',
			'dayopencoure' => 'วันที่เปิดคอร์ด',
			'dayclose' => 'วันที่ปิดคอร์ด',
			'time' => 'เวลาที่ใช้ในการเก็บต่อวัน',
			'location' => 'สถานที่',
			'typelocation' => 'สถานที่/ภายใน/ภายนอก',
			'discription' => 'รายละเอียด',
			'num_max' => 'จำนวนผู้อบรม',
			'price' => 'ราคา คอร์ด',
			'trainer' => 'ชื่อวิทยากร',
			'categorycourse' => 'ประเภท course it จิตวิท ',
			'employee_id' => 'รหัสพนักงานคน trainer',
		);
	}
 
	public function search()
	{
 
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('cu_id',$this->cu_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('dayopencoure',$this->dayopencoure,true);
		$criteria->compare('dayclose',$this->dayclose,true);
		$criteria->compare('time',$this->time);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('typelocation',$this->typelocation,true);
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
public static function issaveSup($idcourse){ // return true ถ้าสามารถบันทึกผู้สอนได้ 
$daynow= date('Y-m-d');        
$sql='SELECT cu_id FROM training_history WHERE cu_id="'.$idcourse.'";';    
$dbCommand = Yii::app()->db->createCommand($sql);
$data=$dbCommand->queryAll();
return count($data)>0;    
}

        
        
        
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
