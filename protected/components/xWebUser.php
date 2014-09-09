<?php

// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {

 private $model = null;
 
    public function getModel()
    {  $criteria=""; 
		   if(!isset($this->id)){
		     $this->model = new Employee;
			  $this->model =$this->id;
		   }
		 if($this->model === null){
			$criteria = new CDbCriteria;
            $criteria->condition ='ep_username="'.$this->id.'"';
		   $this->model= Employee::model()->findAll($criteria);
		 }
		/*
		$criteria="";  
        if(!isset($this->id)) $this->model = new Employee;
        if($this->model === null)
		//$criteria = new CDbCriteria;
		//$criteria->addCondition('ep_username=0099866865342');
		//$criteria->condition ='ep_username=0099866865342';
		//$criteria->addCondition("ep_password='9ef24d3de40b86c1e960448dd2525387'");
        //    $this->model = Employee::model()->findByPk($this->id);
		//$this->model= Employee::model()->findAll($criteria);
	//d2l($this->model->attributes,"rWebUser.getModel"); */
	return $this->model;
    }
 
    public function __get($name) {
        try {
            return parent::__get($name);
        } catch (CException $e) {
	    //d2l("going to model");
            $m = $this->getModel();
            if($m->__isset($name))
                return $m->{$name};
            else throw $e;
        }
    }
 
    public function __set($name, $value) {
        try {
            return parent::__set($name, $value);
        } catch (CException $e) {
            $m = $this->getModel();
            $m->{$name} = $value;
        }
    }
 
    public function __call($name, $parameters) {
        try {
            return parent::__call($name, $parameters);  
        } catch (CException $e) {
            $m = $this->getModel();
            return call_user_func_array(array($m,$name), $parameters);
        }
    }

// Return
public function getUsername_id(){
	$user=$this->getModel();
return $user;
}
// access it by Yii::app()->user->email
function getEmail(){
$user=$this->getModel();
return $user->ep_email;
}
function mypicture(){
	$user = $this->getModel();
	$res='';$res=$user->ep_image;
	return $res;
}
// access it by Yii::app()->user->created
function get_active(){
 $user=$this->getModel();
return $user->ep_active;
}
// access it by Yii::app()->user->lastvisit
function getLastvisit(){
$user=$this->getModel();
return $user->lastvisit;
}
// access it by Yii::app()->user->count
function getCount(){
$user = $this->loadUser(Yii::app()->user->id);
return $user->count_visit;
}
// access it by Yii::app()->user->usertype
function getUsertype(){
 $user=$this->getModel();
return $user->ep_user_type;
}
  // การใช้งานดูให้ีๆเดวจะตกม้าตาย
// Yii::app()->user->isGuest  ไม่มี (); นะ 
// Yii::app()->user->isAdmin()  มีวงเล็บนะ
// Yii::app()->user->isCustomer()
// Yii::app()->user->isAgent()
// Yii::app()->user->isEmployee()

  public function isSupperAdmin(){
	$user = $this->getModel();
	$res=false;
	if ($user!==null && $user->ep_user_type==0) $res=true;
	return $res;
    }
  public function isAdmin(){
	$user = $this->getModel();
	//$res=false;
	//if ($user!==null && $user->ep_user_type==1) $res=true;
	return $user;
    }
  public function isEmployee(){
	$user = $this->getModel();
	$res=false;
	if ($user!==null && $user->ep_user_type==2) $res=true;
	return $res;
    }
  public function isCustomer(){
	$user = $this->getModel();
	$res=false;
	if ($user!==null && $user->ep_user_type==3) $res=true;
	return $res;
    }
  public function isAgent(){
	$user = $this->getModel();
	$res=false;
	if ($user!==null && $user->ep_user_type==4) $res=true;
	return $res;
    }
    public function logout($destroySession= true){
        Yii::app()->getSession()->remove('model');
        parent::logout();
    }
   protected function afterLogout(){
  
  }

}
?>