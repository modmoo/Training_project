<?php

class QuestionController extends Controller {
    //public $layout = '//layouts/main_front'; //layout_main_admin
    public function filters() {
        return array(
            'accessControl', 
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('Index'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionIndex($id) {
        //echo date('Y-m-d');
        if (isset($_POST['frm_questions'])) {
            $ans1 = $_POST['ans1']; //1
            $ans2 = $_POST['ans2']; //2
            $ans3=$_POST['ans3'];//3
            $ans4=$_POST['ans4'];//4
            $ans5=$_POST['ans5'];//5
            $ans6=$_POST['ans6'];//6
             $this->insertdata($ans1, $id);
             $this->insertdata($ans2, $id);
             $this->insertdata($ans3, $id);
             $this->insertdata($ans4, $id);
             $this->insertdata($ans5, $id);
             $this->insertdata($ans6, $id);
            /*
    foreach ($ans1 as $keyans => $valueans) {
            $arraydata = explode('-', $valueans);
            $ansscore = $arraydata[0];
            $ansgroup = $arraydata[1]; // วิทยากร/ความรู้
            $ansside = $arraydata[2]; //ด้านๆไป
            echo $ansside;
            $modelans = new Ansquestion('insert');
            $modelans->ans_qvalue = $ansscore;
            $modelans->idgroup = $ansgroup;
            $modelans->idside = $ansside;
            $modelans->idcourse = $id;
            $modelans->idemployee = Yii::app()->user->getuser_id();
            $modelans->save();
        }*/
        }
        $criteria = new CDbCriteria;
        $criteria->with = array(
            'depart' => array('alias' => 't1', 'together' => true,),
           // 'webboard' => array('alias' => 't2', 'together' => true,),
        );
        $criteria->select = array('*');
        $criteria->condition = "t.active=:active";
        $criteria->addCondition('t.idemployee=:id', 'AND');
        $criteria->params = array(':active' => 1, ':id' =>Yii::app()->user->getuser_id());
       // $criteria->order = 't.time DESC ';
        $em=  Employee::model()->find($criteria);
        $modelcourse=  Course::model()->findByPk($id); 
        $this->render('index',array('course'=>$modelcourse,'employee'=>$em));
    }

    private function insertdata($ans, $idcourse) {
        $course = $idcourse;
        foreach ($ans as $keyans => $valueans) {
            $arraydata = explode('-', $valueans);
            $ansscore = $arraydata[0];
            $ansgroup = $arraydata[1]; // วิทยากร/ความรู้
            $ansside = $arraydata[2]; //ด้านๆไป
            $modelans = new Ansquestion('insert');
            $modelans->ans_qvalue = $ansscore;
            $modelans->idgroup = $ansgroup;
            $modelans->idside = $ansside;
            $modelans->idcourse = $course;
            $modelans->idemployee = Yii::app()->user->getuser_id();
            $modelans->times =date('Y-m-d');
            $modelans->save(); 
        }
    }

}
