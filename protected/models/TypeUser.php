<?php
 
class TypeUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'type_user';
	}
 
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idtype', 'length', 'max'=>45),
			array('typename', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idtype, typename', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idtype' => 'รหัสปะเภท user',
			'typename' => 'ชื่อประเภทผู้ใช้งาน',
		);
	}

 
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('idtype',$this->idtype,true);
		$criteria->compare('typename',$this->typename,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
                      protected function afterSave() {         
                            if($this->isNewRecord)
                             {
                                    $this->isNewRecord = false;
                                    $dateId ='1'.sprintf("%03d",$this->id);
                                    $this->saveAttributes(array('idtype'=>$dateId));
                                    $this->isNewRecord = true;   
                            }
                    }
    public static function getlabelusertype($id){
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
       return  $mylist->typename;
   }                    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
