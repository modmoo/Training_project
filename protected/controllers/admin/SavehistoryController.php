<?php
class SavehistoryController extends Controller{
public $layout='//layouts/column2';
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}
public function accessRules()
{
return array(
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('1'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}
  
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}
public function actionAdmin(){
$model=new CourseRegister('listcoursregister');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['CourseRegister']))
$model->attributes=$_GET['CourseRegister'];
$this->render('admin',array(
'model'=>$model,
));
}
 
public function loadModel($id)
{
$model=CourseRegister::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}
 
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='course-register-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
