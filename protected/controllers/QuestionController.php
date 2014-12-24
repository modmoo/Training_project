<?php

class QuestionController extends Controller {
    public $layout = '//layouts/main_front'; //layout_main_admin
    public function filters() {
        return array(
            'accessControl',
        );
    }
    public function accessRules() {
        return array(
            array('allow',
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
         if(!CourseRegister::checuserregisters($id,Yii::app()->user->getuser_id())){
            echo '<script type="text/javascript">';
            echo 'alert("ไม่พบข้อมูลค่ะ !")';
            echo '</script>';    
            $this->redirect(array('newcourse/index'));
         }
        
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
                 $criteria = new CDbCriteria;
                 $criteria->condition = 'course_id=:course_id AND employee_id=:employee_id';
                 $criteria->params = array(':course_id'=>$id, ':employee_id'=>Yii::app()->user->getuser_id());
                 $mydelete=CourseRegister::model()->find($criteria);
           if( $mydelete->delete()){
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
            if($modelans->save()){
            $criteria2 = new CDbCriteria;
            $criteria2->condition = 'approval=1 AND course_id=:course_id AND employee_id=:employee_id';
            $criteria2->params = array(':course_id'=>$id, ':employee_id'=> Yii::app()->user->getuser_id());
            CourseRegister::model()->delete($criteria2);   
             }
            }
           $this->redirect(array('newcourse/index')); 
           }
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
