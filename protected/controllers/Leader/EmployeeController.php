<?php

class EmployeeController extends Controller {
    public $layout = '//layouts/column2';
    public function filters() {
        return array(
            'accessControl', 
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete','index','savehistory','view','create', 'update','Ajaxupdate'),
                'users' => array('1','2'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        $model = new Employee;
// $this->performAjaxValidation($model);
        if (isset($_POST['Employee'])) {
            $startdate=$_POST['startdate'];
            $birtthday=$_POST['hiddenbirtthday'];        
            $model->attributes = $_POST['Employee'];
            $mycat=$model->iddept;
                $maxOrderNumber = Yii::app()->db->createCommand()
                 ->select('max(id) as max')
                 ->from('course')
                 ->queryScalar(); 
                $myid='CU'.$mycat.'-'. sprintf("%04d",++$maxOrderNumber);
                
            $targetFolder = Yii::app()->basePath . '/../images/uploads/employee/';
            $folder = date("Y_m_d");
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            if ($uploadedFile != null) {
                $rnd = md5(rand(0, 9999));
                $fileName = "{$rnd}-{$uploadedFile}";
                $model->image = $fileName;
            }
            // var_dump($uploadedFile);exit();
            $model->startdate=$startdate;//$_POST['startdate'];
            $model->birtthday=$birtthday;
            //var_dump($_POST['birtthday']);exit();
           //s var_dump($model->startdate);var_dump($model->birtthday); exit();
            $model->idemployee=$myid;
            if ($model->save()) {
                if (!file_exists($targetFolder)) {
                    mkdir($targetFolder);
                    //  mkdir($targetFolder . $folder . '/' . "_thumbs");
                    chmod($targetFolder . $folder . "", 0777);
                    //    chmod($targetFolder . $folder . '/' . "_thumbs", 0777);
                    $targetFile = $targetFolder . "/" . $fileName; // $_FILES['Filedata']['name']
                    $uploadedFile->saveAs($targetFile);
                } else {
                    if ($uploadedFile != null) {
                        $targetFile = $targetFolder . "/" . $fileName; // $_FILES['Filedata']['name']
                        $uploadedFile->saveAs($targetFile);
                    }
                }
               $this->redirect(array('admin'));
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $oldimg = $model->image;
        $model->setScenario('update');
       // $this->performAjaxValidation($model);
        if (isset($_POST['Employee'])) {
            $startdate=$_POST['startdate'];
            $birtthday=$_POST['hiddenbirtthday'];   
            $model->attributes = $_POST['Employee'];
            $targetFolder = Yii::getPathOfAlias('webroot') . '/images/uploads/course/'; 
            $targetpath = Yii::getPathOfAlias('webroot') . '/images/uploads/employee';
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            $folder = date("Y_m_d");
            if ($uploadedFile != null) {
                $rnd = md5(rand(0, 9999));
                $fileName = "{$rnd}-{$uploadedFile}";
                $model->image = $fileName;
                $targetFile = $targetFolder . "/" . $fileName;
            } else {
                $model->image = $oldimg;
                $targetFile = $targetFolder . "/" . $oldimg;
            }
            $model->startdate=$startdate;//$_POST['startdate'];
            $model->birtthday=$birtthday;
            if ($model->save()) {
                if ($uploadedFile != null) {
                    if (file_exists($targetpath . "/" . $oldimg)) {
                        @unlink($targetpath . "/" . $oldimg);
                    }
                    $uploadedFile->saveAs($targetFile);
                }
                $this->redirect(array('admin'));
            }
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $model = $this->loadModel($id);
            $targetFolder = Yii::getPathOfAlias('webroot') . '/images/uploads/employee';
            if ($model->delete()) {
                if (file_exists($targetFolder . "/" . $model->image)) {
                    @unlink($targetFolder . "/" . $model->image);
                }
            }
// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Employee');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Employee('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Employee'])){
            $model->attributes = $_GET['Employee'];
        }
        $this->render('admin', array(
            'model' => $model,
        ));
    }
    public function actionsavehistory() {
        $model = new CheckCourse('searchsavehistory');
        //var_dump($model->searchsavehistory());exit();
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['CheckCourse'])){
            $model->attributes = $_GET['CheckCourse'];
        }
        $this->render('savehistory', array(
            'model' => $model,
        ));
    }
    
    public function actionAjaxupdate() { 
        $targetpath = Yii::getPathOfAlias('webroot') . '/images/uploads/employee';
        $autoIdAll = $_POST['idemployee'];
        if (count($autoIdAll) > 0) {
            foreach ($autoIdAll as $autoId) {
              //  $dbc = new CDbCriteria();
              //  $dbc->condition = 'img_nw_id = :img_nw_id';
              //  $dbc->params = array(':img_nw_id' => $autoId);
              //  Images::model()->deleteAll($dbc);
                $post = Employee::model()->findByPk($autoId);
                if ($post->delete()) {
                   if (file_exists($targetpath . "/" . $post->image)) {
                    @unlink($targetpath . "/" . $post->image);
                } 
                    echo 'ok';
                } else {
                    throw new Exception("Sorry", 500);
                }
            }
        }
    }
    public function loadModel($id) {
        $model = Employee::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'employee-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
