<?php
class Department extends CActiveRecord
{
	public function tableName()
	{
		return 'department';
	}
	public function rules()
	{
		return array(
			array('name', 'required'),
			array('name', 'safe'),
			array('id, iddepartment, name', 'safe', 'on'=>'search'),
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
			'iddepartment' => 'รหัสแผนก',
			'name' => 'ชื่อแผนก',
		);
	}
 
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('iddepartment',$this->iddepartment,true);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
                    protected function afterSave() {         
                            if($this->isNewRecord)
                             {
                                    $this->isNewRecord = false;
                                    $dateId = 'DM'.date("Y").date("m").date("d").sprintf("%03d",$this->id);
                                    $this->saveAttributes(array('iddepartment'=>$dateId));
                                    $this->isNewRecord = true;   
                            }
                    }
   public static function getdepartmanets(){
      return self::model()->model()->findAll();
      // return CHtml::listData($mylist, 'id', 'name');
   }             
    public static function getlabeldepartmanets($id){
      $criteria = new CDbCriteria ();
        $criteria->select = array(
            '*'
        );
       //$criteria->condition = 'active=:active';
        $criteria->condition = 'id=:id';
        $criteria->params = array(
            ':id' => $id
        );
        // $criteria->params = array(':category'=>1);
       // $criteria->order = 'start DESC '; // uncomment to order the list
      //  $criteria->limit =4;
       $mylist= self::model()->model()->find($criteria);
	   if(count($mylist)>0){
		return  $mylist->name;    
	   }
       return  "ไม่พบข้อมูล";
   }                
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
