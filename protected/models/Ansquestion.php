<?php
class Ansquestion extends CActiveRecord
{
	public function tableName()
	{
		return 'ansquestion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('ans_qvalue, idgroup, idside, idcourse, idemployee', 'numerical', 'integerOnly'=>true),
			array('times', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ans_qvalue, idgroup, idside, idcourse, idemployee, times', 'safe', 'on'=>'search'),
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
			'ans_qvalue' => 'ระดับที่เลือก',
			'idgroup' => 'ประเมินวิทยากร/ความรู้',
			'idside' => 'ด้านที่ประเมิน',
			'idcourse' => 'รหัสคอร์ส',
			'idemployee' => 'รหัสผู้ประเมิน',
			'times' => 'วันที่ประเมิน',
		);
	}
 
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ans_qvalue',$this->ans_qvalue);
		$criteria->compare('idgroup',$this->idgroup);
		$criteria->compare('idside',$this->idside);
		$criteria->compare('idcourse',$this->idcourse);
		$criteria->compare('idemployee',$this->idemployee);
		$criteria->compare('times',$this->times,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	} 
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
