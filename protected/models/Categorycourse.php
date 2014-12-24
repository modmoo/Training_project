<?php
class Categorycourse extends CActiveRecord
{ 
	public function tableName()
	{
		return 'categorycourse';
	}
 
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
		);
	}
 
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}
 
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'ชื่อประเภท course',
		);
	}
    public static function getTypescourse() {
        return self::model()->model()->findAll();  
    }
   public static function getlabelTypescourse($id) {
     $criteria = new CDbCriteria ();
        $criteria->select = array(
            '*'
        );
        $criteria->condition = 'id=:id';
        $criteria->params = array(
            ':id' => $id
        );
       $mylist= self::model()->model()->find($criteria);
       return  $mylist->name;
   }
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
