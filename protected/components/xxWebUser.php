<?php

class WebUser extends CWebUser {

    public $action;

    public function checkAccess($operation, $params = array()) {
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }
        $role = $this->getState("profile");

        switch ($role) {
            case 3:
                $this->action = 'supperadmin';
                break;
            case 2:
                $this->action = 'admin';
                break;
            case 1:
                $this->action = 'user';
                break;
        }
        /*
          if($role === 'supperadmin'){
          return false;
          }else if($role === 'admin') {
          return true; // admin role has access to everything
          }else if($role === 'user'){
          return false;
          }else{
          return false;
          }
         */
        //return $this->action;
        // allow access if the operation request is the current user's role
        return ($operation === $this->action);
    }

}

?>