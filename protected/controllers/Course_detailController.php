<?php
class Course_detailController extends Controller {
public $layout = '//layouts/main_front'; //layout_main_admin
public function filters() {
        return array(
            'accessControl',
        );
    }
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('Index'),
                'users' => array('@'), 
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }    
    public function actionIndex($id) {
        $ids="";
        $modelregiscourse=new CourseRegister();
         if(isset($_GET['id'])){
          $ids=$id;   
        }
        $model=null; 
        $criteria = new CDbCriteria ();
        $criteria->condition = 'cu_id=:cu_id';
        $criteria->params = array(
            ':cu_id' =>$ids
        ); 
       //$model=Course::model()->with(array('supprier'))->findAll();
       //$model=  Course::model()->find($criteria);
       if(isset($_POST['CourseRegister'])){
          $modelregiscourse->attributes = $_POST['CourseRegister'];
           if($modelregiscourse->course_id!=""){
             if($modelregiscourse->validate()){
              if($modelregiscourse->save()){
               Yii::app()->user->setFlash( 'success', 'Registration Course success!' );  
              }else{
              Yii::app()->user->setFlash( 'success', 'ไม่สามารถลงทะเบียนได้!' );  
              $modelregiscourse->addErrors($modelregiscourse->getErrors());  
              }   
             }
          }  
       }
       if($ids!=""){
       $model=  Course::model()->find($criteria);
       //var_dump($model);exit();
       $sup=$model->supprier;     
       }
     // var_dump($sup); exit();
       // $model=  Course::model()->findByAttributes(array('cu_id'=>$id));  
        $this->render('index',array('model'=>$model,'sup'=>$sup,'modelregiscourse'=>$modelregiscourse));
    }
    
}
