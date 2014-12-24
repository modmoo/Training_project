<?php
class CourseRegister extends CActiveRecord {
    public $coursename;
    public $daynow;
    public function tableName() {
        return 'course_register';
    }
    public function rules() {
        return array(
            array('course_id, employee_id', 'required'),
          //  array('course_id, employee_id', 'numerical', 'integerOnly' => true),
            array('idcourse', 'length', 'max' => 45),
            array('approval', 'length', 'max' => 2),
            array('time, note', 'safe'),
            array('id, idcourse, time, coursename,approval, note, course_id, employee_id', 'safe', 'on' => 'search','on' => 'listcourseapproval'),
        );
    }
    public function relations() {
        return array(
            'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
            'checkcourse' => array(self::BELONGS_TO, 'CheckCourse', 'course_id'),
            'employee' => array(self::BELONGS_TO, 'Employee', 'employee_id'),
        );
    }
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'idcourse' => 'รหัสการสมัคร',
            'time' => 'เวลาสมัคร',
            'approval' => 'อนุมัติ / ไม่อนุมัติ',
            'note' => 'หมายเหตุ',
            'course_id' => 'รหัสหลักสูตร',
            'employee_id' => 'รหัสพนักงาน',
        );
    }
    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('idcourse', $this->idcourse, true);
        $criteria->compare('time', $this->time, true);
        $criteria->compare('approval', $this->approval, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('course_id', $this->course_id);
        $criteria->compare('employee_id', $this->employee_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
 public function listcourseapproval(){
  $criteria=new CDbCriteria;
  $criteria->together = true;
  $criteria->with= array('course');
  $criteria->compare('id',$this->id,true);
  $criteria->compare('approval',1);
  $criteria->compare('note', $this->note, true);
  $criteria->compare('idcourse',$this->idcourse,true);
  $criteria->compare('time',$this->time,true);
  $criteria->compare('course_id',$this->course_id,true);
  $criteria->compare('Address',$this->employee_id,true);
  $criteria->addSearchCondition('course.coursename',$this->coursename);
  $criteria->group='course_id';
  return new CActiveDataProvider($this, array(
    'criteria'=>$criteria,
  ));
 } 
 
  public function listcoursregister(){
  $criteria=new CDbCriteria;
  $criteria->together = true;
  $criteria->with= array('course');
  $criteria->compare('id',$this->id,true);
  $criteria->compare('approval',1);
  $criteria->compare('note', $this->note, true);
  $criteria->compare('idcourse',$this->idcourse);
  $criteria->compare('time',$this->time,true);
  $criteria->compare('course_id',$this->course_id,true);
  $criteria->compare('Address',$this->employee_id,true);
  $criteria->addSearchCondition('course.coursename',$this->coursename);
  $criteria->group='course_id';
  return new CActiveDataProvider($this, array(
    'criteria'=>$criteria,
  ));
 } 
    public function searchsavehistory($idcourse) {
       // $criteria = new CDbCriteria;
         // $criteria->with = array(
         //   'employee' => array('alias' => 't1', 'together' => true,),
          //  'employee.depart' => array('alias' => 't2', 'together' => true,),
       // );
 $criteria=new CDbCriteria;
  $criteria->together = true;
  //$criteria->with= array('employee','xCity','User');
  $criteria->with= array('employee');
  $criteria->addSearchCondition('course_id',$idcourse);
  $criteria->group = 'employee_id';
/*
  $criteria->compare('Id',$this->Id,true);
  $criteria->compare('Restaurant.Name',$this->Name,true);
  $criteria->addSearchCondition('xCountry.Name',$this->Country);
  $criteria->addSearchCondition('xCity.Name',$this->City);
  $criteria->compare('Zip',$this->Zip,true);
  $criteria->compare('Address',$this->Address,true);
  $criteria->compare('Description',$this->Description,true);
  $criteria->compare('Restaurant.Active',$this->Active,true);
  $criteria->addSearchCondition('User.Username',$this->Owner);
  $criteria->compare('Lat',$this->Lat);
  $criteria->compare('Lon',$this->Lon);
  */
  return new CActiveDataProvider($this, array(
    'criteria'=>$criteria,
    'pagination'=>false,  
  ));
 
    }
 
 
  public function  checkmax($id) {
        $criteria = new CDbCriteria ();
        $criteria->condition = 'course_id=:cu_id';
        $criteria->addCondition('approval=:approval', 'AND');
        $criteria->params = array(
            ':cu_id' =>$id,':approval'=>1
        );
        $model=CourseRegister::model()->findAll($criteria);     
        return count($model);
}  
  public static function  checkmaxapprovel($id) {
        $criteria = new CDbCriteria ();
        $criteria->condition = 'course_id=:cu_id';
        $criteria->addCondition('approval=:approval', 'AND');
        $criteria->params = array(
            ':cu_id' =>$id,':approval'=>1
        );
        $model=CourseRegister::model()->findAll($criteria);     
        return count($model);
} 
  public static function  checkmaxcalcel($id) {
        $criteria = new CDbCriteria ();
        $criteria->condition = 'course_id=:cu_id';
        $criteria->addCondition('approval=:approval', 'AND');
        $criteria->params = array(
            ':cu_id' =>$id,':approval'=>2
        );
        $model=CourseRegister::model()->findAll($criteria);     
        return count($model);
} 
  public static function  checkmax2($id) { // นับทั้งหมดคนที่ยังไม่อณุมัติด้วย
        $criteria = new CDbCriteria ();
        $criteria->condition = 'course_id=:cu_id';
      //  $criteria->addCondition('approval=:approval', 'AND');
         $criteria->params = array(
            ':cu_id' =>$id//,':approval'=>1
        );
        $model=  self::model()->findAll($criteria);     
        return count($model);
}   
  public function  checuserregister($courseid,$user) {
        $criteria = new CDbCriteria ();
        $criteria->condition = 'course_id=:course AND employee_id=:user';
        $criteria->params = array(
            ':course' =>$courseid,'user'=>$user
        );
        $model=CourseRegister::model()->findAll($criteria);     
        return count($model)>0;// return true ถ้าลงทะเีบยนไปแล้ว
   }   
  public static function  checuserregisters($courseid,$user) {
        $criteria = new CDbCriteria ();
        $criteria->condition = 'course_id=:course AND employee_id=:user';
        $criteria->params = array(
            ':course' =>$courseid,'user'=>$user
        );
        $model=self::model()->findAll($criteria);     
        return count($model)>0;// return true ถ้าลงทะเีบยนไปแล้ว
   }   
   
   
   public function getstatus() {
         if($this->approval==NUll){
             return "Pending";    
         }
         return "Approved";
   }
   public static function getstatus2($status) {
         if($status==2){
             return "ไม่อณุมัติ";    
         }else if($status==1){
            return "อณุมัติแล้ว";    
         }else if($status==0){
            return "กำลังดำเนินการ";    
         }else if($status==3){
           return "กรุณาทำแบบประเมิน";       
         }
         return "ไม่รู้จัก";
   }
   public function changapproval($ck,$comments) {
        $this->isNewRecord = false;
        if($ck==0){
          $this->saveAttributes(array('approval' =>2));//ไมอณุมัติ   
          $this->saveAttributes(array('note' => $comments));   
        }else{
           $this->saveAttributes(array('approval' => 1));   
           $this->saveAttributes(array('note' => $comments));   
        }
        $this->isNewRecord = true;
  }
   public function setquestioninapproval($comments) {
        $this->isNewRecord = false;
          $this->saveAttributes(array('approval' =>3));//ให้ทำประเมิน  
          $this->saveAttributes(array('note' => $comments));   
        $this->isNewRecord = true;
  }
    protected function beforeSave() {
       if ($this->isNewRecord)
        $this->time = new CDbExpression('NOW()'); 
        return parent::beforeSave();
    }
   public function getdaynow() {
       return $this->daynow=date('Y-m-d');   
   } 
    
    
    
    
    protected function afterSave() {
        if ($this->isNewRecord) {
            $this->isNewRecord = false;
            $dateId = 'CR' . date("Y") . date("m") . date("d") . sprintf("%04d", $this->id);
            $this->saveAttributes(array('idcourse' => $dateId));
          //  $this->saveAttributes(array('time' =>new CDbExpression('NOW()'));
            $this->isNewRecord = true;
        }
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
