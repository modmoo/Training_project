<?php

class WebUser extends CWebUser {

    protected $_model;

    function isAdmin() {
        $user = $this->getState("roles");
        if ($user)
            return $user == LevelLookUp::ADMIN;
        return false;
    }

    function getrole() {
        return $this->getState("roles");
    }

    function isMEMBER() {
        $role = $this->getState("roles");
        if ($role)
            return $role == LevelLookUp::MEMBER;
        return false;
    }

    function isCOMPANY() {
        $role = $this->getState("roles");
        if ($role)
            return $role == LevelLookUp::COMPANY;
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
