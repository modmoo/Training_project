<?php

class ContactusController extends Controller{
        public $layout = '//layouts/main_front'; //layout_main_admin
	public function actionIndex(){
    $model=new Contactus();
	 //$this->performAjaxValidation($model);
		 if(isset($_POST['Contactus'])){
		  $model->attributes = $_POST['Contactus'];	
           if($model->validate()){
              if($model->save()){
               Yii::app()->user->setFlash( 'success', 'บันทึกข้อมูลเรียบร้อยแล้ว!' );  
               $model->unsetAttributes();
              }else{
              Yii::app()->user->setFlash( 'success', 'ไม่สามารถบันทึกข้อมูลได้!' );  
              $model->addErrors($model->getErrors());  
              }  
           }
		  }
		$this->render('index',array(
             'model'=>$model    
	 ));
	}
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usercontactus-form') {
           // var_dump($_POST);exit();
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}