<?php
class Course extends CActiveRecord {    
    public function tableName() {
        return 'course';
    }
    public function rules() {
        return array(
            array('name,num_max,dayopencoure,dayclose,categorycourse', 'required'),
            array('start', 'type','type' =>'date',
                    'message' => '{attribute}: is not a date!', 
                    'dateFormat' => 'yyyy-MM-dd'),
         //   array('time, num_max, supprier_id', 'numerical', 'integerOnly' => true),
          //  array('price', 'numerical'),
            array('cu_id', 'length', 'max' => 45),
            array('typelocation, active', 'length', 'max' => 2),
            array('name, image, start, dayend, dayopencoure, dayclose, location, discription, trainer, categorycourse', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, cu_id, name, image, start, dayend, dayopencoure, dayclose, time, location, typelocation, discription, num_max, price, trainer, active, categorycourse, supprier_id', 'safe', 'on' => 'search'),
        );
    }
    public function relations() {
        return array(
            'checkCourses' => array(self::HAS_MANY, 'CheckCourse', 'course_id'),
            'supprier' => array(self::BELONGS_TO, 'Supprier', 'supprier_id'),
            'courseRegisters' => array(self::HAS_MANY, 'CourseRegister', 'course_id'),
            'files' => array(self::HAS_MANY, 'Files', 'course_id'),
        );
    }
    public function attributeLabels() {
        return array(
            'id' => 'auto',
            'cu_id' => 'รหัสหลักสูตร',
            'name' => 'ชื่อหลักสูตร',
            'image' => 'รูป',
            'start' => 'วันแรก',
            'dayend' => 'วันสุดท้าย',
            'dayopencoure' => 'วันที่เปิดรับสมัครหลักสูตร',
            'dayclose' => 'วันที่ปิดรับสมัครหลักสูตร',
            'time' => 'เวลาที่ใช้ในการเก็บต่อวัน',
            'location' => 'สถานที่อบรม',
            'typelocation' => 'สถานที่/ภายใน/ภายนอก',
            'discription' => 'รายละเอียดหลักสูตร',
            'num_max' => 'จำนวนผู้อบรม',
            'price' => 'ราคาหลักสูตร',
            'trainer' => 'ชื่อวิทยากร',
            'active' => 'สถานะ',
            'categorycourse' => 'ประเภทหลักสูตร',
            'supprier_id' => 'รหัส บริษัทรับจัดอบรม',
        );
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('cu_id', $this->cu_id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('start', $this->start, true);
        $criteria->compare('dayend', $this->dayend, true);
        $criteria->compare('dayopencoure', $this->dayopencoure, true);
        $criteria->compare('dayclose', $this->dayclose, true);
        $criteria->compare('time', $this->time);
        $criteria->compare('location', $this->location, true);
        $criteria->compare('typelocation', $this->typelocation, true);
        $criteria->compare('discription', $this->discription, true);
        $criteria->compare('num_max', $this->num_max);
        $criteria->compare('price', $this->price);
        $criteria->compare('trainer', $this->trainer, true);
        $criteria->compare('active', $this->active, true);
        $criteria->compare('categorycourse', $this->categorycourse, true);
        $criteria->compare('supprier_id', $this->supprier_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public function  checkclose($id) {   
        $model=$this->model()->findAllByPk($id); 
         return $model; 
   }  
    public static function isexpirecourse($idcourse){
    //  ค้นหา   
    $daynow= date('Y-m-d');      
    $sql='SELECT dayclose FROM course WHERE dayclose>=now() AND cu_id="'.$idcourse.'";';    
    $dbCommand = Yii::app()->db->createCommand($sql);
    $data=$dbCommand->query();
     return count($data)>0;     
     }
    public static function getsupprier_id($id){
      $criteria = new CDbCriteria ();
        $criteria->select = array(
            '*'
        );
       //$criteria->condition = 'active=:active';
        $criteria->condition = 'cu_id=:id';
        $criteria->params = array(
            ':id' => $id
        );
        // $criteria->params = array(':category'=>1);
       // $criteria->order = 'start DESC '; // uncomment to order the list
      //  $criteria->limit =4;
       $mylist= self::model()->model()->find($criteria);
       return  $mylist->supprier_id;
   }     
    public static function getnamecourse($id){
      $criteria = new CDbCriteria ();
        $criteria->select = array(
            '*'
        );
       //$criteria->condition = 'active=:active';
        $criteria->condition = 'cu_id=:id';
        $criteria->params = array(
            ':id' => $id
        );
        // $criteria->params = array(':category'=>1);
       // $criteria->order = 'start DESC '; // uncomment to order the list
      //  $criteria->limit =4;
       $mylist= self::model()->model()->find($criteria);
       return  $mylist->name;
   }   
   /*
    protected function afterSave() {
        if ($this->isNewRecord) {
            $this->isNewRecord = false;
            $dateId ='CU'.$this->categorycourse.'-'.date("Y") . date("m") . date("d") . sprintf("%04d", $this->id);
           // $this->saveAttributes(array('cu_id' => $dateId));
            $this->saveAttributes(array('name' => $dateId));
            $this->isNewRecord = true;
        }
    }
 
   public function beforeSave(){ 
       //var_dump($this->isNewRecord);exit();
        if ($this->isNewRecord) {
            //$this->isNewRecord = false;
            $dateId ='CU'.$this->categorycourse.'-'.date("Y") . date("m") . date("d") . sprintf("%04d",++$this->id);
            $this->cu_id=$dateId;
           // $this->saveAttributes(array('cu_id' => $dateId));
          //  $this->saveAttributes(array('name' => $dateId));
           // $this->isNewRecord = true;
        }
}   
 */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
