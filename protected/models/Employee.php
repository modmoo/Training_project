<?php

/**
 * This is the model class for table "employee".
 *
 * The followings are the available columns in table 'employee':
 * @property integer $id
 * @property string $idemployee
 * @property string $firstname
 * @property string $lastname
 * @property string $username
 * @property string $password
 * @property string $sex
 * @property string $image
 * @property string $tel
 * @property string $department
 * @property string $startdate
 * @property string $birtthday
 * @property string $degree
 * @property string $address
 * @property string $email
 * @property string $usertype
 * @property string $active
 * @property string $at_lastvisit
 * @property integer $at_counter
 * @property integer $company_id
 *
 * The followings are the available model relations:
 * @property CheckCourse[] $checkCourses
 * @property CourseRegister[] $courseRegisters
 * @property Company $company
 * @property TrainingHistory[] $trainingHistories
 */
class Employee extends CActiveRecord {

    private $salt = "#$(%(*#*@#@)#)$*&%*+@_$(@!##)";

    public function tableName() {
        return 'employee';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idemployee,password,username', 'required'),
            array('at_counter, company_id', 'numerical', 'integerOnly' => true),
            array('idemployee, username', 'length', 'max' => 45),
            array('usertype, active', 'length', 'max' => 2),
            array('firstname, lastname, password, sex, image, tel, department, startdate, birtthday, degree, address, email, at_lastvisit', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, idemployee, firstname, lastname, username, password, sex, image, tel, department, startdate, birtthday, degree, address, email, usertype, active, at_lastvisit, at_counter, company_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'checkCourses' => array(self::HAS_MANY, 'CheckCourse', 'employee_id'),
            'courseRegisters' => array(self::HAS_MANY, 'CourseRegister', 'employee_id'),
            'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
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
            'department' => 'แผนก',
            'startdate' => 'วันเริ่มงาน',
            'birtthday' => 'วัน-เดือน-ปีเกิด',
            'degree' => 'วุฒิการศึกษา',
            'address' => 'ที่อยู่',
            'email' => 'E-mail พนักงาน',
            'usertype' => 'ประเภทผู้ใช้งาน',
            'active' => 'สถานะ',
            'at_lastvisit' => 'เข้าใช้ล่าสุดเมื่อ',
            'at_counter' => 'จำนวนการเข้าใช้งาน',
            'company_id' => 'รหัสบริษัท',
        );
    }

    public function validatePassword($password) {
        //return $this->password;
        return $this->hashPassword($password, $this->salt) === $this->password;
    }

    public function hashPassword($password, $salt) {
        return md5($salt . $password);
    }
    public function changactive() {
            $this->isNewRecord = false;
            $this->saveAttributes(array('active' =>1));
            $this->isNewRecord = true;
    }

    public function checkactive() {
        if ($this->active == 1) {
            return true;
        }
        return FALSE;
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

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
        $criteria->compare('department', $this->department, true);
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

    protected function afterSave() {
        if ($this->isNewRecord) {
            $this->isNewRecord = false;
            $dateId = 'EM' . date("Y") . date("m") . date("d") . sprintf("%05d", $this->id);
            $this->saveAttributes(array('username' => $dateId));
            $this->saveAttributes(array('idemployee' => $dateId));
            $this->isNewRecord = true;
        }
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
