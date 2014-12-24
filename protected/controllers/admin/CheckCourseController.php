<?php

class CheckCourseController extends Controller {

    public $layout = '//layouts/column2';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'listcourseapproval', 'create', 'update', 'index', 'view'),
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
        $model = new CheckCourse;

        if (isset($_POST['CheckCourse'])) {
            $model->attributes = $_POST['CheckCourse'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);


        if (isset($_POST['CheckCourse'])) {
            $model->attributes = $_POST['CheckCourse'];
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

    public function actionIndex($id) {
        $model=  Course::model()->findByPk($id);
        $criteria = new CDbCriteria;
        $criteria->with = array('employee'=>array(
              'alias' => 'e',   
            ),
            'employee.depart' => array(
                'alias' => 'v',
            // 'joinType'=>'INNER JOIN'
            )
        );
        $criteria->together = true; // ADDED THIS
        $criteria->select = array('id');
        $criteria->condition = "t.approval=:approval";
        $criteria->addCondition('course_id=:id', 'AND');
        $criteria->params = array(':approval' =>1, ':id' => $id);
        $criteria->order = 'v.id DESC';
       // $criteria->limit = 20;
        //$count = CourseRegister::model()->count($criteria);
        //pagination
       // $pages = new CPagination($count);
        //$pages->setPageSize(Yii::app()->params['pagessize']);
       // $pages->applyLimit($criteria);
        $modelcourse= CourseRegister::model()->findAll($criteria);
         //var_dump($modelcourse[0]->employee->firstname);exit();
        // var_dump($modelcourse); 
        $this->render('index',array('modelcourse'=>$modelcourse,'model'=>$model));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new CheckCourse('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['CheckCourse']))
            $model->attributes = $_GET['CheckCourse'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionlistcourseapproval() {
        $model = new CourseRegister('listcourseapproval');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['CourseRegister']))
         $model->attributes = $_GET['CourseRegister'];
        $this->render('listcourseapproval', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = CheckCourse::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'check-course-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
