<?php
class loginController extends Controller {
    public $layout = '//layouts/layout_login_admin'; //layout_main_admin

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionIndex() {

        $model = new LoginForm;
        $puser = "";
        $salt = '@#I%OI#$UI%@P%#JJ@#_@#FJFDK';
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            //$puser=$model->password;
            // $model->password=md5($salt.$puser);

            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }
    public function actionLogin() {  // Yii::app()->session->destroy();
        $model = new LoginForm;
        $puser = "";
        $salt = '@#I%OI#$UI%@P%#JJ@#_@#FJFDK';
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            //$puser=$model->password;
            // $model->password=md5($salt.$puser);
            if ($model->validate() && $model->login()){
                 if(Yii::app()->user->name==1){
                  $this->redirect(Yii::app()->user->returnUrl);   
                 } else{
                // $this->redirect(Yii::app()->homeUrl); 
                $this->redirect(array('newcourse/index'));
                 }
                //  $this->redirect(Yii::app()->user->returnUrl);
            }   
        }
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {        
        //var_dump(Yii::app()->user->username);exit();
         if(Yii::app()->user->name==1){
        Yii::app()->user->logout();
         $this->redirect(Yii::app()->user->returnUrl);
        }else{
        Yii::app()->user->logout();    
        $this->redirect(Yii::app()->homeUrl);  
        }  

        //$this->redirect(Yii::app()->homeUrl);
    }

}
