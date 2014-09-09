<?php

class UserIdentity extends CUserIdentity {

    private $id;

    public function authenticate() {
        $pass = $this->hashPassword($this->password);
        $context = Yii::app()->db;
        $query = 'SELECT username,image,firstname,usertype,lastname FROM employee,type_user WHERE';
        $query.=' username="' . $this->username . '"';
        $query.=' AND active=1';
        $query.=' AND password="' . $pass . '"';
        $query.=' OR password=NULL AND usertype=idtype';
        $data = $context->createCommand($query)->query();
        $data->bindColumn(1, $this->username);
        $data->bindColumn(2, $pass);

        foreach ($data as $row) {
            Yii::app()->session['user'] = $row['usertype'];
            $this->errorCode = self::ERROR_NONE;
            return !$this->errorCode;
        }
    }

    public function hashPassword($password) {
        $salt = "#$(%(*#*@#@)#)$*&%*+@_$(@!##)";
        return md5($salt . $password);
    }

    public function updatedata() {
        $date = date("Y-m-d H:i:s");
        User::model()->updateByPk(array($this->_id), array('lastvisit' => $date));
        User::model()->updateCounters(array('count_visit' => +1), 'user_id=:id', array(':id' => $this->_id));
    }

}
