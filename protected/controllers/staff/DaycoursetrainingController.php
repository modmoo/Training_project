<?php
class DaycoursetrainingController extends Controller {
    public $layout = '//layouts/mainstaf';
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'create', 'update'),
                'users' => array('@'),
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
        $model = new Daycoursetraining;
// $this->performAjaxValidation($model);
        if (isset($_POST['Daycoursetraining'])) {
            $model->attributes = $_POST['Daycoursetraining'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
// $this->performAjaxValidation($model);
        if (isset($_POST['Daycoursetraining'])) {
            $model->attributes = $_POST['Daycoursetraining'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        $dataProvider = new CActiveDataProvider('Daycoursetraining');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    public function actionAdmin() {
        $model = new Daycoursetraining('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Daycoursetraining']))
            $model->attributes = $_GET['Daycoursetraining'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Daycoursetraining::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'daycoursetraining-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
 
}
