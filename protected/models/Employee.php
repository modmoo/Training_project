<?php
class Employee extends CActiveRecord {
    private $salt = "#$(%(*#*@#@)#)$*&%*+@_$(@!##)";
    public $old_password;
    public $new_password;
    public $repeat_password;
    
    public function tableName() {
        return 'employee';
    }
    public function rules() {
        return array(
            array('firstname', 'required'),
            array('at_counter, company_id', 'numerical', 'integerOnly' => true),
            array('idemployee, username', 'length', 'max' => 45),
            array('usertype, active', 'length', 'max' => 2),
            array('firstname, lastname, password, sex, image, tel, iddept, startdate, birtthday, degree, address, email, at_lastvisit', 'safe'),
            array('id,idemployee, firstname, lastname, username, password, sex, image, tel, iddept, startdate, birtthday, degree, address, email, usertype, active, at_lastvisit, at_counter, company_id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'checkCourses' => array(self::HAS_MANY, 'CheckCourse', 'employee_id'),
            'courseRegisters' => array(self::HAS_MANY, 'CourseRegister', 'employee_id'),
            'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
            'depart' => array(self::BELONGS_TO, 'Department', 'iddept'),
            'trainingHistories' => array(self::HAS_MANY, 'TrainingHistory', 'employee_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'idemployee' => 'รหัสพนักงาน',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'username' => 'ชื่อผู้ใช้',
            'password' => 'รหัสผ่าน',
            'sex' => 'เพศ',
            'image' => 'รูป',
            'tel' => 'เบอร์',
            'iddept' => 'แผนก',
            'startdate' => 'วันเริ่มงาน',
            'birtthday' => 'วัน-เดือน-ปีเกิด',
            'degree' => 'วุฒิการศึกษา',
            'address' => 'ที่อยู่',
            'email' => 'E-mail พนักงาน',
            'usertype' => 'ประเภทผู้ใช้งาน',
            'active' => 'สถานะ',
            'at_lastvisit' => 'เข้าใช้ล่าสุดเมื่อ',
            'at_counter' => 'จำนวนการเข้าใช้งาน',
            'company_id' => 'บริษัท',
        );
    }

    public function validatePassword($password) {
        //return $this->password;
        return $this->hashPassword($password, $this->salt) === $this->password;
    }

    public function hashPassword($password, $salt) {
        return md5($salt . $password);
    }
    public static function MyhashPassword($password) {
        return md5('#$(%(*#*@#@)#)$*&%*+@_$(@!##)'.$password);
    }

    public function changactive() {
        $this->isNewRecord = false;
        $this->saveAttributes(array('active' => 1));
        $this->isNewRecord = true;
    }

    public function checkactive() {
        if ($this->active == 1) {
            return true;
        }
        return FALSE;
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('idemployee', $this->idemployee, true);
        $criteria->compare('firstname', $this->firstname, true);
        $criteria->compare('lastname', $this->lastname, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('sex', $this->sex, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('iddept', $this->iddept);
        $criteria->compare('startdate', $this->startdate, true);
        $criteria->compare('birtthday', $this->birtthday, true);
        $criteria->compare('degree', $this->degree, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('usertype', $this->usertype, true);
        $criteria->compare('active', $this->active, true);
        $criteria->compare('at_lastvisit', $this->at_lastvisit, true);
        $criteria->compare('at_counter', $this->at_counter);
        $criteria->compare('company_id', $this->company_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchdepartments($id) {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('idemployee', $this->idemployee, true);
        $criteria->compare('firstname', $this->firstname, true);
        $criteria->compare('lastname', $this->lastname, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('sex', $this->sex, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('iddept',$id);
        $criteria->compare('startdate', $this->startdate, true);
        $criteria->compare('birtthday', $this->birtthday, true);
        $criteria->compare('degree', $this->degree, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('usertype', $this->usertype, true);
        $criteria->compare('active', $this->active, true);
        $criteria->compare('at_lastvisit', $this->at_lastvisit, true);
        $criteria->compare('at_counter', $this->at_counter);
        $criteria->compare('company_id', $this->company_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
public function gettypeusers(){
       if($this->usertype==1){
          return 'ADMINISTRATOR';
      }else if($this->usertype==2){
         return 'LEADER';
      }else if($this->usertype==3){
        return 'EMPLOYEE'; 
      }else if($this->usertype==4){
        return 'TRAINER'; 
      }
      return 'error';
} 
/*
    protected function afterSave() {
        if ($this->isNewRecord) {
            $this->isNewRecord = false;
           // $dateId ='EM'.$this->iddept.'-'.sprintf("%05d",$this->id);
          //  $this->saveAttributes(array('username' => $dateId));
          //  $this->saveAttributes(array('idemployee' => $dateId));
          // $this->saveAttributes(array('password' =>  $this->hashPassword($dateId, $this->salt)));
            $this->isNewRecord = true;
        }
    } 
    public function beforeSave(){
          if ($this->scenario == 'insert' || $this->scenario == 'changePassword'){
           $this->password =$this->hashPassword($this->password,$this->salt); 
          }
        return parent::beforeSave();
    }  */
  
 protected function beforeSave() {
    // $this->scenario == 'insert' ||   
     if ($this->scenario == 'changePassword')
          //  $this->username=$this->username;
            $this->password = $this->hashPassword($this->password,"#$(%(*#*@#@)#)$*&%*+@_$(@!##)");
        return parent::beforeSave();
 }
  
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
