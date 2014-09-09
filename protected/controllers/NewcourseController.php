<?php

class NewcourseController extends Controller {

    public $layout = '//layouts/main_front';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('1'), //admin
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        /* 	$emid="";
          $modelnews=null;
          $modelhistory=null;
          $criteria = new CDbCriteria();
          $criteria->condition = 'employee_id=:id';
          $criteria->params = array(':id'=>$emid);
          $criteria->order = "start DESC";
          $modelhold = Course::model()->findAll($criteria);
          $this->render('index',array('model'=>$model,'modelhistory'=>$modelhistory)); */
        $this->render('index');
    }

}
