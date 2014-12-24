<?php

class WebUser extends CWebUser {

    protected $_model;

    function isAdmin() {
        $user = $this->getState("roles");
        if ($user)
            return $user == LevelLookUp::ADMINISTRATOR;
        return false;
    }
    function getdepartments() {
        return $this->getState("departments");
    }
    function getrole() {
        return $this->getState("roles");
    }

    function isLEADER() {
        $role = $this->getState("roles");
        if ($role)
            return $role == LevelLookUp::LEADER;
        return false;
    }

    function isEMPLOYEE() {
        $role = $this->getState("roles");
        if ($role)
            return $role == LevelLookUp::EMPLOYEE;
        return false;
    }

    function isGUESTS() {
        $role = $this->getState("roles");
        if ($role)
            return $role == LevelLookUp::GUESTS;
        return false;
    }

    function getusername() {
        $role = $this->getState("roles");
        if ($role)
            return $this->getState("user_name");
        return false;
    }

    function getuser_id() {
        $role = $this->getState("roles");
        if ($role)
            return $this->getState("user_id");
        return false;
    }

    function getlname() {
        $role = $this->getState("roles");
        if ($role)
            return $this->getState("user_lname");
        return false;
    }

}
