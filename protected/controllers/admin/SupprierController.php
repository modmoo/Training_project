<?php

class SupprierController extends Controller {

    public $layout = '//layouts/column2';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'index', 'view', 'create', 'update'),
                'users' => array('1'),
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
        $model = new Supprier;
// $this->performAjaxValidation($model);
        if (isset($_POST['Supprier'])) {
            $model->attributes = $_POST['Supprier'];
            $targetFolder = Yii::app()->basePath . '/../images/uploads/supprier/';
            $folder = date("Y_m_d");
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            if ($uploadedFile != null) {
                $rnd = md5(rand(0, 9999));
                $fileName = "{$rnd}-{$uploadedFile}";
                $model->image = $fileName;
            }
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
                 echo '<script language="javascript">';
                 echo "alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');";
                 echo '</script>';
                  Msg::success( 'บันทึกข้อมูลเรียบร้อยแล้วค่ะ');    
                $this->redirect(array('admin'));
            }else{
                Msg::error( $model->getErrors());
                Yii::app()->user->setFlash("error", "ไม่สามารถบันทึกข้อมูลได้ค่ะ");       
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
        if (isset($_POST['Supprier'])) {
            $model->attributes = $_POST['Supprier'];
            $targetFolder = Yii::app()->basePath . '/../images/uploads/supprier/';
            $folder = date("Y_m_d");
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            if ($uploadedFile != null) {
                $rnd = md5(rand(0, 9999));
                $fileName = "{$rnd}-{$uploadedFile}";
                $model->image = $fileName;
                 $targetFile = $targetFolder . "/" . $fileName; 
            }else {
                $model->image = $oldimg;
                $targetFile = $targetFolder . "/" . $oldimg;
            }
            if ($model->save()) {
                if ($uploadedFile != null) {
                    if (file_exists($targetFolder . "/" . $oldimg)) {
                        unlink($targetFolder . "/" . $oldimg);
                    }
                    $uploadedFile->saveAs($targetFile);
                }
                echo '<script language="javascript">';
                echo "alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');";
                echo '</script>';
                 Msg::success( 'บันทึกข้อมูลเรียบร้อยแล้วค่ะ');    
                $this->redirect(array('admin'));
            }else{
                  Msg::error( $model->getErrors());
                 Yii::app()->user->setFlash("error", "ไม่สามารถบันทึกข้อมูลได้ค่ะ");      
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Supprier');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Supprier('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Supprier']))
            $model->attributes = $_GET['Supprier'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Supprier::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
 
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'supprier-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
