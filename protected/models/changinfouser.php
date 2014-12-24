<?php

class changinfouser extends CFormModel {
    public $oldpassword;
    public $newpassword;
    public $renewpassword;
    private $salt = "#$(%(*#*@#@)#)$*&%*+@_$(@!##)";
    public function rules() {
        return array(
            // username and password are required
            array('oldpassword,newpassword,renewpassword', 'required'),
            array('newpassword, renewpassword', 'length', 'min' => 5, 'max' => 128 ),
            array('old_password', 'findPasswords'),
             array('newpassword', 'compare', 'compareAttribute'=>'renewpassword'),
            //array('password', 'required', 'on' => 'insert, changePassword'),
                // password needs to be authenticated
                //   array('idemployee', 'validateChange'), //'authenticate'
        );
    }

    public function attributeLabels() {
        return array(
            'newuser' => 'กรุณากรอกชื่อผู้ใช้งานใหม่',
            'oldpassword' => 'กรุณากรอกรหัสผ่านเก่า',
            'newpassword' => 'กรุณากรอกรหัสผ่านใหม่',
            'renewpassword' => 'กรุณากรอกรหัสผ่านซ้ำอีกครั้ง',
        );
    }
   public function findPasswords($attribute, $params)
    {//$this->oldpassword
        $user = Employee::model()->findByPk(Yii::app()->user->getuser_id());
        if ($user->password !=$user->validatePassword($this->oldpassword))
            $this->addError($attribute, 'รหัสผ่านเก่าไม่ถูกต้องค่ะ.');
    }
    /*
      public function validateChange($attribute, $params) {
      if (!$this->hasErrors()) {
      $user = Employee::model()->find('idemployee=?',array($this->newuser));
      if ($user === null) {
      // $this->errorCode = self::ERROR_USERNAME_INVALID;
      $this->addError('idemployee', 'ไม่พบข้อมูลพนักงาน .');
      } else if ($user->checkactive()) {
      //$this->errorCode = self::ERROR_PASSWORD_INVALID;
      $this->addError('idemployee','คุณได้ลงทะเบียนไปแล้วกรุณาติดต่อ HR.');
      }
      }
      } */
}
