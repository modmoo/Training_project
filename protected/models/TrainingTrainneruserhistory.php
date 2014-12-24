<?php
 
class TrainingTrainneruserhistory extends CActiveRecord
{
	public function tableName()
	{
		return 'training_trainneruserhistory';
	}
	public function rules()
	{
		return array(
		//	array('score', 'numerical'),
		//	array('cu_id, employee_id', 'length', 'max'=>45),
			array('note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, score, cu_id, employee_id, note', 'safe', 'on'=>'search'),
		);
	}
 
	public function relations()
	{
		return array(
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'score' => 'Score',
			'cu_id' => 'Cu',
			'employee_id' => 'Employee',
			'note' => 'Note',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('score',$this->score);
		$criteria->compare('cu_id',$this->cu_id,true);
		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
 public static function ischeck($idcourse){ // return true ถ้าสามารถบันทึกผู้สอนได้ 
$daynow= date('Y-m-d');        
$sql='SELECT cu_id FROM training_trainneruserhistory WHERE cu_id="'.$idcourse.'";';    
$dbCommand = Yii::app()->db->createCommand($sql);
$data=$dbCommand->queryAll();
return count($data)>0;    
}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
