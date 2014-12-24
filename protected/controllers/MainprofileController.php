<?php
class MainprofileController extends Controller {
    public $layout = '//layouts/main_front'; //layout_main_admin
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('Logout','Login'),
                'users' => array('*'),
            ),   
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index','changepassword'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    public function actionIndex() {
        $this->pageTitle = 'ประวัติการทำงาน';
        $modelhistory=NULL;
        $model=NUll;
        $modelcourseregis=NULL;
        $modelcourse=NULL;
        $modelchange = new changinfouser();
        if (Yii::app()->user->getuser_id()) {
            $id =Yii::app()->user->getuser_id();
           // $model = Employee::model()->findByAttributes(array('id' => $id));
            $model=  Employee::model()->findByPk($id);
            $modelhistory = null;
            $sql='SELECT tu.resulttraining,tu.score,th.*,';  
            $sql.='(SELECT MAX(day) as daym FROM daycoursetraining as da WHERE da.idcourse=tu.cu_id) dmax';
            $sql.=' FROM training_usershistory as tu LEFT JOIN training_history as th ON tu.cu_id=th.cu_id';
            $sql.=' WHERE tu.employee_id="'.$id.'"';
            $sql.=' ORDER BY dmax DESC'; 
            $dbCommand = Yii::app()->db->createCommand($sql);
            $modelhistory=$dbCommand->queryAll();
            
            $sqlx='SELECT 	tr1.cu_id,cu1.name,da1.day,da1.timestart';
            $sqlx.=' FROM training_usershistory tr1';
            $sqlx.=' INNER JOIN daycoursetraining da1';
            $sqlx.=' ON tr1.cu_id = da1.idcourse';
            $sqlx.=' INNER JOIN course cu1';
            $sqlx.=' ON tr1.cu_id = cu1.cu_id';
            $sqlx.=' WHERE da1.day >= CURRENT_DATE()';
            $sqlx.=' AND tr1.employee_id="'.$id.'"';
            $sqlx.=' ORDER BY da1.day ASC';
            $dbComx = Yii::app()->db->createCommand($sqlx);
            $modelcourse=$dbComx->queryAll();
            
           //var_dump($modelhistory);exit(); 
         $criteria2 = new CDbCriteria;
         $criteria2->with = array(
            'employee' => array('alias' => 't1', 'together' => true,),
            'course' => array('alias' => 't2', 'together' => true,),
        );
        $criteria2->select = array('*');
        $criteria2->condition = "t2.active=:active";
        $criteria2->addCondition('t.employee_id=:id', 'AND');
        $criteria2->params = array(':active' => 1, ':id' =>Yii::app()->user->getuser_id());
        $criteria2->order = 't.time DESC '; 
        $modelcourseregis=  CourseRegister::model()->findAll($criteria2);
        } else {
            $model = new Employee;
            $modelhistory = new TrainingHistory();
        }
        if(isset($_POST['changinfouser'])){
            $modelchange->attributes =$_POST['changinfouser'];
            if($modelchange->validate()){
                
          }
        }
       //var_dump($model->image);exit();
        $this->render('index', array('model' => $model,
            'modelhistory' => $modelhistory,
            'modelchange' => $modelchange,
            'modelcourseregis'=>$modelcourseregis,
            'modelcourse'=>$modelcourse
        ));
    }
    public function actionchangepassword() {
         $modelchange = new changinfouser();
         $model = Employee::model()->findByPk(Yii::app()->user->getuser_id());
           if(isset($_POST['changinfouser'])){
            $modelchange->attributes =$_POST['changinfouser'];
            if($modelchange->validate()){
             $model->setScenario('changePassword');   
             $model->password=$modelchange->newpassword;
             $model->password=$modelchange->newpassword;
              if($model->save()){
               Yii::app()->user->setFlash('success', 'บันทึกข้อมูลเรียบร้อยแล้วค่ะ !');
               $modelchange->unsetAttributes();
            }else{
              Yii::app()->user->setFlash('success', 'กรุณาลองใหม่อีกครั้งค่ะ !');   
            }
          }
         }
         $model = Employee::model()->findByPk(Yii::app()->user->getuser_id());
        $this->render('changepassword',array('model'=>$model,
                                              'modelchange'=>$modelchange));
    }
}
