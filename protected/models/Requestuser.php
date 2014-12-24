<?php

/**
 * This is the model class for table "requestuser".
 *
 * The followings are the available columns in table 'requestuser':
 * @property integer $id
 * @property string $todapt
 * @property integer $num
 * @property string $idcourse
 * @property string $note
 */
class Requestuser extends CActiveRecord
{
	public function tableName()
	{
		return 'requestuser';
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                      //  array('idcourse', 'unique'),
                        array('todapt,num', 'required'),
			array('num', 'numerical', 'integerOnly'=>true),
			array('todapt', 'length', 'max'=>45),
			array('idcourse', 'length', 'max'=>100),
			array('note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, todapt, num, idcourse, note', 'safe', 'on'=>'search'),
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
			'todapt' => 'แผนก',
			'num' => 'จำนวน/คน',
			'idcourse' => 'รหัสคอร์ส',
			'note' => 'หมายเหตุ',
		);
	}
 
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('todapt',$this->todapt,true);
		$criteria->compare('num',$this->num);
		$criteria->compare('idcourse',$this->idcourse,true);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
