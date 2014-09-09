<?php

class MainController extends Controller {
    public $layout = '//layouts/main_front'; //layout_main_admin
    public function actionIndex() {
        $massages=null;
        $modelLoginForm=new LoginForm();
        $modelRegister=new RegisterFormindex();
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form') {
            echo CActiveForm::validate($modelRegister);
            Yii::app()->end();
        } 
        // validate attributes:
        if (isset($_POST['RegisterFormindex'])) {
            if ($modelRegister->validate()) {  
                $modelRegister->attributes = $_POST['RegisterFormindex'];
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
        $model = Course::model()->findAll();
        $this->render('index', array('course' => $model,'modelRegister'=>$modelRegister,'modelLoginForm'=>$modelLoginForm,'msg'=>$massages));
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

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
