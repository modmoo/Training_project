<?php
class RegisterFormindex extends CFormModel {
    public $username;
    public $password;
    public $idemployee;
    public $rememberMe;
    private $_identity;

    public function rules() {
        return array(
            // username and password are required
            array('username, ,idemployee,password', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
             array('idemployee','authenone'),//'authenticate'
        );
    }
 
    public function attributeLabels() {
        return array(
            'rememberMe' => 'Remember me next time',
            'idemployee' => 'กรุณากรอกรหัสพนักงาน',
            'username' => 'กรุณากรอกชื่อผู้ใช้งาน',
            'password' => 'กรุณากรอกรหัสผ่าน',
        );
    }

    public function authenone($attribute, $params) {
        if (!$this->hasErrors()) {
        $user = Employee::model()->find('idemployee=?',array($this->idemployee));
        if ($user === null) {
           // $this->errorCode = self::ERROR_USERNAME_INVALID;
              $this->addError('idemployee', 'ไม่พบข้อมูลพนักงาน .');
        } else if ($user->checkactive()) {
            //$this->errorCode = self::ERROR_PASSWORD_INVALID;
             $this->addError('idemployee','คุณได้ลงทะเบียนไปแล้วกรุณาติดต่อ HR.');
          }  
        }
    }
 /*
    public function getPassword($password) {
        
    }

    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else
            return false;
    }
  */
}
