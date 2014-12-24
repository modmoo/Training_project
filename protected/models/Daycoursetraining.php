<?php
class Daycoursetraining extends CActiveRecord{
    public $daynow;
    const STATUS_check = 'ไม่';
    const STATUS_uncheck = 'ไม่มา';
    public function tableName()
	{
		return 'daycoursetraining';
	}
	public function rules()
	{
		return array(
			//array('idcourse', 'length', 'max'=>45),
			array('day, timestart, timeend, detail', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idcourse, day, timestart, timeend, detail', 'safe', 'on'=>'search'),
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
			'idcourse' => 'รหัสคอร์ส',
			'day' => 'วันที',
			'timestart' => 'เวลาเริ่มเรียน',
			'timeend' => 'เวลาเลิก',
			'detail' => 'รายละเอียดการสอน',
		);
	}
	public function search($id){
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('idcourse',$id);
		$criteria->compare('day',$this->day,true);
		$criteria->compare('timestart',$this->timestart,true);
		$criteria->compare('timeend',$this->timeend,true);
		$criteria->compare('detail',$this->detail,true);
                $criteria->order='day ASC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
public static function issquestionnow($id){ // 
        $mysql2="SELECT MAX(rday.day)as maxday FROM daycoursetraining rday LEFT JOIN course_register cr ON rday.idcourse=cr.course_id WHERE cr.employee_id='".Yii::app()->user->getuser_id()."' AND cr.course_id='".$id."' ORDER BY rday.day DESC";//
        $dbCommand = Yii::app()->db->createCommand($mysql2);
        $data2 = $dbCommand->queryRow();  
        return   $data2;//count($model)>0;     
   }    
public static function iscompletecourse($idcourse){
//  ค้นหา   
$daynow= date('Y-m-d');      
$sql='SELECT * FROM daycoursetraining,(SELECT MAX(day)as mymax FROM daycoursetraining WHERE idcourse="'.$idcourse.'") as m  WHERE now()>m.mymax AND idcourse="'.$idcourse.'"';    
$dbCommand = Yii::app()->db->createCommand($sql);
$data=$dbCommand->query();// echo $sql;exit();
 return count($data)>0;     
 }
public static function isexpirecourse($idcourse){
//  ค้นหา   
$daynow= date('Y-m-d');      
$sql='SELECT dayclose FROM course WHERE dayclose>="'.$daynow.'" AND cu_id="'.$idcourse.'";';    
$dbCommand = Yii::app()->db->createCommand($sql);
$data=$dbCommand->query();
 return count($data)>0;     
 }
public static function getlastcourse($idcourse){  
$daynow= date('Y-m-d');      
$sql='SELECT MAX(day)as max FROM daycoursetraining WHERE idcourse="'.$idcourse.'";';    
$dbCommand = Yii::app()->db->createCommand($sql);
$data=$dbCommand->queryRow();
//var_dump();exit();
    if(count($data)>0){
     return $data['max'];  
    }
 return 'error';     
 } 
public static function ischeckname($idcourse){ // return true ถ้าสามารถเช็คชื่อได้ 
$daynow= date('Y-m-d');        
$sql='SELECT day FROM daycoursetraining WHERE idcourse ="'.$idcourse.'" AND day="'.$daynow.'";';    
$dbCommand = Yii::app()->db->createCommand($sql);
$data=$dbCommand->query();
return count($data)>0;    
    }
    
  public static function numday($id){//  return จำนวนวัน อบรม
        $mysql2='SELECT count(*)as day FROM daycoursetraining WHERE idcourse="'.$id.'"';//
        $dbCommand = Yii::app()->db->createCommand($mysql2);
        $data2 = $dbCommand->queryRow();
         $num="error";
        if(count($data2)>0){
         $num=$data2['day'];  
        }
        return $num;//count($model)>0;     
   }      
   public function getdaynow() {
       return $this->daynow=date('Y-m-d');   
   } 
   public static function getdayallcourse($idcourse){
       $arr=array(); 
       $criteria = new CDbCriteria ();
        $criteria->select = array(
            '*'
        );
       //$criteria->condition = 'active=:active';
        $criteria->condition = 'idcourse=:id';
        $criteria->order='day ASC';
        $criteria->params = array(
            ':id' => $idcourse
        );
       $mylist=self::model()->model()->findAll($criteria);
       foreach ($mylist as $value) {
           array_push($arr,$value->day);
       }
       return implode(",",$arr); 
   }        
   public static function getdayallcoursemy($idcourse){
       $arr=array(); 
       $criteria = new CDbCriteria ();
        $criteria->select = array(
            '*'
        );
       //$criteria->condition = 'active=:active';
        $criteria->condition = 'idcourse=:id';
        $criteria->order='day ASC';
        $criteria->params = array(
            ':id' => $idcourse
        );
       return self::model()->model()->findAll($criteria);
        
   }        
   
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
}
