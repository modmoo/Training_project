<?php

class ContactusController extends Controller
{
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
'actions'=>array('admin','delete','create','update','Ajaxupdate','View'),
'users'=>array('1'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

public function actionView($id){
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}
public function actionCreate()
{
$model=new Contactus;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Contactus']))
{
$model->attributes=$_POST['Contactus'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->render('create',array(
'model'=>$model,
));
}
 
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Contactus']))
{
$model->attributes=$_POST['Contactus'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->render('update',array(
'model'=>$model,
));
}
    public function actionAjaxupdate() { 
        $autoIdAll = $_POST['id'];
        if (count($autoIdAll) > 0) {
            foreach ($autoIdAll as $autoId) {
              //  $dbc = new CDbCriteria();
              //  $dbc->condition = 'img_nw_id = :img_nw_id';
              //  $dbc->params = array(':img_nw_id' => $autoId);
              //  Images::model()->deleteAll($dbc);
                $post = Contactus::model()->findByPk($autoId);
                if ($post->delete()) {
                    echo 'ok';
                } else {
                    throw new Exception("Sorry", 500);
                }
            }
        }
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

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('Contactus');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Contactus('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Contactus']))
$model->attributes=$_GET['Contactus'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Contactus::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='contactus-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
