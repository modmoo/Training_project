<?php
 
class Supprier extends CActiveRecord {

    public function tableName() {
        return 'supprier';
    }

    public function rules() {
        return array(
            array('idsuppier', 'length', 'max' => 45),
            array('name, image,tel, email, address, contact', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id,idsuppier, name, tel, email, address, contact', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'courses' => array(self::HAS_MANY, 'Course', 'supprier_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'idsuppier' => 'รหัส supprier',
            'name' => 'ชื่อบริษัท/หน่วยงาน',
            'image' => 'รูป',
            'tel' => 'เบอร์โทร',
            'email' => 'อีเมลล์',
            'address' => 'ที่อยู่',
            'contact' => 'ผู้ที่ประสานงาน',
        );
    }

    public function getsupprier($id) {
        return $this->model()->findByPk($id);
    }
    public static function getlabelsupprier($id) {
     $criteria = new CDbCriteria ();
        $criteria->select = array(
            '*'
        );
        $criteria->condition = 'id=:id';
        $criteria->params = array(
            ':id' => $id
        );
       $mylist= self::model()->model()->find($criteria);
       if($mylist!=NULL){
       return  $mylist->name;    
       }
       return "ไม่พบข้อมูล"; 
   }
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('idsuppier', $this->idsuppier, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('image', $this->image);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('contact', $this->contact, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    protected function afterSave() {
        if ($this->isNewRecord) {
            $this->isNewRecord = false;
            $dateId = 'SPE' . date("Y") . date("m") . date("d") . sprintf("%02d", $this->id);
            $this->saveAttributes(array('idsuppier' => $dateId));
            $this->isNewRecord = true;
        }
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
