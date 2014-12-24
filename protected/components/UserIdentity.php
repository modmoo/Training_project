<?php

class UserIdentity extends CUserIdentity {

    private $id;
    private $model;

    public function getId() {
        return $this->id;
    }

    public function getModel() {
        return $this->model;
    }

    public function authenticate() {
        $user = Employee::model()->find('LOWER(username)=?', array(strtolower($this->username)));
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if (!$user->validatePassword($this->password)) {
            // Yii::app()->session['user']=$user;	
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            //Yii::app()->session['user']=$user->validatePassword($this->password);
            $this->setState('roles', $user->usertype);
            $this->setState('user_id', $user->idemployee);
            $this->setState('user_name', $user->firstname);
            $this->setState('departments', $user->iddept);
            $this->setState('user_lname', $user->lastname);
            $this->id = $user->id; //username มากจาก CwebUser
            $this->username = $user->usertype; // set type user admin member guests ให้ด้วยว่าเป็น user ประเภทไหน เพื่อจะนำไปใช้ใน  filters accessRules

            $this->errorCode = self::ERROR_NONE;
            $date=date("Y-m-d H:i:s");
            Employee::model()->updateByPk(array($user->idemployee),array('at_lastvisit'=>$date,'at_counter'=>++$user->at_counter));
        }
        return !$this->errorCode;
    }

}

// Yii::app()->session['user']=$user->username;	
?>