<?php

class Result_of_register_detailController extends Controller
{
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index'),
                'users' => array('1','2'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
	public function actionIndex($id)
        {  $modelcourse;$data="";
            if(isset($_GET['id'])){
             $ids=$_GET['id'];
             $modelcourse=  Course::model()->findByPk($ids);
            $sql='SELECT j.approval,j.note, p.name,em.*,';
            $sql.='(SELECT name FROM department as da WHERE da.id=em.iddept) dname';        
            $sql.=' FROM course_register as j LEFT JOIN employee em ON j.employee_id=em.idemployee LEFT JOIN course as p ON j.course_id = p.cu_id  WHERE p.active=1 AND j.course_id="'.$id.'" ORDER BY dname ASC'; 
            $dbCommand = Yii::app()->db->createCommand($sql);
            $data=$dbCommand->queryAll();  
            // var_dump($data);exit();
              }
	    $this->render('index',array('datacourse'=>$modelcourse,'data'=>$data));
                
	}
 
}