<?php
class LoginForm extends CFormModel {
    public $username;
    public $password;
    public $idemployee;
    public $rememberMe;
    private $_identity;

    public function rules() {
        return array(
            // username and password are required
            array('username,password', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'rememberMe' => 'Remember me next time',
            'idemployee' => 'กรุณากรอกรหัสพนักงาน',
            'username' => 'กรุณากรอกชื่อผู้ใช้งาน',
            'password' => 'กรุณากรอกรหัสผ่าน',
        );
    }
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            if (!$this->_identity->authenticate())
                $this->addError('password', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง !.');
        }
    }
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
}
