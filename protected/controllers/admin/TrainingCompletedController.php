<?php

class TrainingCompletedController extends Controller {
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('coursedetail', 'files', 'index'),
                'users' => array('1'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    public function actionIndex() {
      $modelhistory=NULL;
       if(isset($_GET['year'])){
            $sql='SELECT tu.resulttraining,tu.score,th.*, year(da.day)as myyear,(SELECT MAX(day) as daym FROM daycoursetraining as da WHERE da.idcourse=tu.cu_id) dmax FROM training_usershistory as tu LEFT JOIN training_history as th ON tu.cu_id=th.cu_id  LEFT JOIN daycoursetraining da ON tu.cu_id=da.idcourse  WHERE  year(da.day)="'.$_GET['year'].'" GROUP BY cu_id ORDER BY year(da.day) DESC';
            $dbCommand = Yii::app()->db->createCommand($sql);
            $modelhistory=$dbCommand->queryAll();    
          }
        $this->render('index',array('modelhistory'=>$modelhistory));
    }

    public function actioncoursedetail() {
        $this->render('coursedetail');
    }

    public function actionfiles() {
        $this->render('files');
    }

}
