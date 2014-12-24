<?php
class Company extends CActiveRecord {
    public function tableName() {
        return 'company';
    }
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name,tel,email,address,discription', 'required'),
            array('name, tel, email, address, fax, discription, department', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, companyid, name, tel, email, address, fax, discription, department', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'employees' => array(self::HAS_MANY, 'Employee', 'company_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'companyid' => 'รหัสบริษัท',
            'name' => 'ชื่อบริษัท',
            'tel' => 'เบอร์โทร',
            'email' => 'E-mail',
            'address' => 'ที่อยู่',
            'fax' => 'แฟกซ์',
            'discription' => 'อธิบายบริษัท',
            'department' => 'แผนก',
        );
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('companyid', $this->companyid, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('discription', $this->discription, true);
        $criteria->compare('department', $this->department, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    protected function afterSave() {
        if ($this->isNewRecord) {
            $this->isNewRecord = false;
            $dateId = 'CM'.sprintf("%04d", $this->id);
            $this->saveAttributes(array('companyid' => $dateId));
            $this->isNewRecord = true;
        }
    }
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
