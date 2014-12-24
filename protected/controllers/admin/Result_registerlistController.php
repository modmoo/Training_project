<?php

class Result_registerlistController extends Controller{
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index'),
                'users' => array('1'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
	public function actionIndex(){
            $sql='SELECT j.approval, p.*';  
         //   $sql.='(SELECT MAX(day) as daym FROM daycoursetraining as da WHERE da.idcourse=tu.cu_id) dmax';
          //  $sql.=',(SELECT MIN(day) as daymin FROM daycoursetraining as da WHERE da.idcourse=tu.cu_id) dmin';
            $sql.=' FROM course_register as j LEFT JOIN course as p ON j.course_id = p.cu_id';
            $sql.=' WHERE p.active=1';
            $sql.=' GROUP BY j.course_id ORDER BY j.time'; 
            $dbCommand = Yii::app()->db->createCommand($sql);
            $data=$dbCommand->queryAll();     
          
          //var_dump($data);exit();
            $this->render('index',array('data'=>$data));
	}
 
}