<?php
class TrainingUsershistory extends CActiveRecord
{
	public function tableName()
	{
		return 'training_usershistory';
	}
	public function rules()
	{
		return array(
			array('employee_id', 'required'),
			array('score', 'numerical'),
			array('employee_id, cu_id', 'length', 'max'=>45),
			array('resulttraining', 'safe'),
			array('employee_id, resulttraining, score,usertype, cu_id', 'safe', 'on'=>'search'),
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
			'employee_id' => 'Employee',
			'resulttraining' => 'Resulttraining',
			'score' => 'Score',
                        'usertype'=>'usertype',
			'cu_id' => 'Cu',
		);
	}
 
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('resulttraining',$this->resulttraining,true);
		$criteria->compare('score',$this->score);
                $criteria->compare('scoreusertype',$this->usertype);
		$criteria->compare('cu_id',$this->cu_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
public static function ischeck($idcourse){ // return true ถ้าสามารถบันทึกผู้สอนได้ 
$daynow= date('Y-m-d');        
$sql='SELECT cu_id FROM training_usershistory WHERE cu_id="'.$idcourse.'";';    
$dbCommand = Yii::app()->db->createCommand($sql);
$data=$dbCommand->queryAll();
return count($data)>0;    
}
public static function getscorebyuser($idcourse,$userid){ // return true ถ้าสามารถบันทึกผู้สอนได้        
$sql='SELECT sum(score) as score FROM training_usershistory WHERE employee_id="'.$userid.'" AND cu_id="'.$idcourse.'";';    
$dbCommand = Yii::app()->db->createCommand($sql);
$data=$dbCommand->queryRow();
    if(count($data)>0){
     return $data['score'];  
    }
 return 'error'; 
}
public static function getstatusleaningnew($idcourse,$userid) {
$sql='SELECT resulttraining FROM training_usershistory WHERE employee_id="'.$userid.'" AND cu_id="'.$idcourse.'";';    
$dbCommand = Yii::app()->db->createCommand($sql);
$data=$dbCommand->queryRow();
    if(count($data)>0){
     if($data['resulttraining']==1){
        return 'ผ่าน';  
    }else if($data['resulttraining']==2){
     return 'ไม่ผ่าน';     
    }
    } 
    return 'ไม่รู้จัก';     
}
public static function getstatusleaning($param) {
    if($param==1){
        return 'ผ่าน';  
    }else if($param==2){
     return 'ไม่ผ่าน';     
    }
    return 'ไม่รู้จัก';     
}
public static function getuserbycourse($idcourse){ // หาผู้เรียนทั้งหมด
            $sql='SELECT tu.resulttraining,tu.score,th.*,';  
            $sql.='(SELECT MAX(day) as daym FROM daycoursetraining as da WHERE da.idcourse=tu.cu_id) dmax';
            $sql.=',(SELECT MIN(day) as daymin FROM daycoursetraining as da WHERE da.idcourse=tu.cu_id) dmin';
            $sql.=' FROM training_usershistory as tu LEFT JOIN training_history as th ON tu.cu_id=th.cu_id';
            $sql.=' WHERE tu.cu_id="'.$idcourse.'"';
            $sql.=' ORDER BY dmax DESC'; 
            $dbCommand = Yii::app()->db->createCommand($sql);
            $data=$dbCommand->queryAll();  
            return $data;    
}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
