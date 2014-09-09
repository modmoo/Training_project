<?php

/**
 * This is the model class for table "department".
 *
 * The followings are the available columns in table 'department':
 * @property integer $id
 * @property string $iddepartment
 * @property string $name
 */
class Department extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'department';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iddepartment', 'length', 'max'=>45),
			array('name', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, iddepartment, name', 'safe', 'on'=>'search'),
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
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
