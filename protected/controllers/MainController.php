<?php

class MainController extends Controller {
    public $layout = '//layouts/main_front'; //layout_main_admin
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index','Login'),
                'users' => array('*'),
            ),   
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('Logout'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    public function actionIndex() {
        if(!Yii::app()->user->isGuest){
         $this->redirect(array('newcourse/index'));    
        }
        $massages=null;
        $modelLoginForm=new LoginForm();
        $modelRegister=new RegisterFormindex();
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form') {
            echo CActiveForm::validate($modelRegister);
            Yii::app()->end();
        } 
     
        if (isset($_POST['RegisterFormindex'])) { 
             $modelRegister->attributes = $_POST['RegisterFormindex'];
            if ($modelRegister->validate()) {  
                $newUser = new Employee();
                $newUser->attributes = $modelRegister->attributes;
                $account=Employee::model()->findByAttributes(array('idemployee'=>$modelRegister->idemployee));     
               // var_dump($account->changactive());
                $account->setIsNewRecord(false);
                $account->setScenario('update');
                $account ->active =1;
                if($account->save()){
                echo "<script type=\"text/javascript\">alert('User successfully registered !')</script>";   
                 Yii::app()->user->setFlash('success', 'User successfully registered !');
                 $account->isNewRecord = true;
                }else{
                  $modelRegister->addErrors($newUser->getErrors());  
                } 
            } 
        }
        if (isset($_POST['LoginForm'])) {  
            $modelLoginForm->attributes = $_POST['LoginForm'];
             if ($modelLoginForm->validate() && $modelLoginForm->login()){
                   if(Yii::app()->user->name==1){
                 /// $this->redirect(Yii::app()->user->returnUrl); 
                 $this->redirect(array('newcourse/index'));      
                 } else{
                // $this->redirect(Yii::app()->homeUrl); 
                $this->redirect(array('newcourse/index'));
              } 
            }else{
            $massages="ไม่พบผู้ใช้งานค่ะ !";  
            }   
        }
         //$model = Course::model()->findAll();    
        $this->render('index', array('course' =>  $this->gethotCourse(),'modelRegister'=>$modelRegister,'modelLoginForm'=>$modelLoginForm,'msg'=>$massages));
    }
    public function actionLogin() {
        $this->render('login');
    }
    public function actionRegister() {
        $modelLoginForm=new LoginForm();
        $modelRegister=new RegisterFormindex();
        // ajax validation:
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form') {
            echo CActiveForm::validate($modelRegister);
            Yii::app()->end();
        } 
        // validate attributes:
        if (isset($_POST['RegisterFormindex'])) {
            $modelRegister->attributes = $_POST['RegisterFormindex'];
            if ($modelRegister->validate()) {
                $newUser = new User('create');
                $newUser->attributes = $model->attributes;
                if ($newUser->save()) {
                    Yii::app()->user->setFlash('success', 'User successfully registered !');
                    $this->redirect(Yii::app()->user->returnUrl);
                } else
                    $modelRegister->addErrors($newUser->getErrors());
            }else{
            // print_r($model->errors);exit();    
            }
        }
        $course = Course::model()->findAll();
        $this->render('index', [ 'model' => $model,'course'=>$course]);
    }

    public function actionLogout() {
        $this->render('logout');
    }
 
    public function gethotCourse() {
        $criteria = new CDbCriteria ();
        $criteria->select = array(
            '*'
        );
        $criteria->condition = 'active=:active';
        // $criteria->condition = 'category_news_cn_id=:category';
        $criteria->params = array(
            ':active' => 1
        );
        // $criteria->params = array(':category'=>1);
        $criteria->order = 'start DESC '; // uncomment to order the list
        $criteria->limit =4;
        return Course::model()->findAll($criteria);
    } 
}
