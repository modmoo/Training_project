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
                'actions' => array('index','listcourse'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() { 
        $this->render('index', array('hotcourse' => $this->getlinkhot()));
    }
    public function actionListcourse() {
      $this->render('listcourse', array(
            'modelhistory' => $this->getlinkall()));  
     }
    public function getlinkall() {
       // $Criteria = new CDbCriteria();
       // $Criteria->condition = "active=1";
       // $Criteria->limit = 100;
       // $Criteria->offset = 3;
       // $Criteria->order = "start DESC";
        
     //   $data=CourseRegister::model()->with('course')->findAll();
           $data = Yii::app()->db->createCommand()
            ->select('j.*, p.approval')
            ->from('course j')
            ->leftJoin('course_register p','j.id = p.course_id')
            ->where('j.active=:active', array(':active'=>1))
            ->group('j.id')      
            ->order('j.dayopencoure DESC')
          //  ->offset(9)        
            ->limit(100)     
            ->queryAll();
            return  $data;
       // return Course::model()->findAll($Criteria);
    }

    public function getlinkhot() {
        /*
        $criteria = new CDbCriteria ();
        $criteria->select = array(
            '*'
        );
        $criteria->condition = 'active=:active';
        // $criteria->condition = 'category_news_cn_id=:category';
        $criteria->params = array(
            ':active' => 1
        );
        // $criteria->params = array(':category'=>1);
        $criteria->order = 'start DESC '; // uncomment to order the list
        $criteria->limit = 3;
        return Course::model()->findAll($criteria);
            */
            $data = Yii::app()->db->createCommand()
            ->select('j.*, p.approval')
            ->from('course j')
            ->leftJoin('course_register p','j.id = p.course_id')
            ->where('j.active=:active', array(':active'=>1))
            ->group('j.id')      
            ->order('j.dayopencoure DESC')
            ->limit(7)     
            ->queryAll();
            return  $data;
           }
          
  
}
