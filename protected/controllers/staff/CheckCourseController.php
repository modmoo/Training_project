<?php
class CheckCourseController extends Controller {
    public $layout = '//layouts/mainstaf';
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'listcourseapproval', 'create', 'update', 'index', 'view'),
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
        /*
        var_dump($this->ischeckday($_GET['day'],$_GET['id'])); exit();
$mysql="SELECT em.*, cr.approval
FROM course_register cr,employee em,check_course ck
WHERE ck.employee_id=em.idemployee AND cr.course_id= cr.course_id AND cr.approval=1 AND ck.day='".$_GET['day']."' AND cr.course_id='".$_GET['id']."'";
     //   $sql = "SELECT * FROM table WHERE colname = '" . $_POST['data'] . "'";
        $dbCommand = Yii::app()->db->createCommand($mysql);
        $data = $dbCommand->queryAll();
        */  
        /*
         $data = Yii::app()->db->createCommand()
            ->select('em.*, cr.approval')
            ->from('course_register cr')
            ->leftJoin('employee em','cr.employee_id=em.idemployee')
            ->leftJoin('check_course ck','cr.course_id= cr.course_id')    
            ->where('cr.approval=:approval AND ck.employee_id=em.idemployee AND ck.day!=:day AND cr.course_id=:course_id', array(':approval'=>1,':day'=>$_GET['day'],':course_id'=>$_GET['id']))
          //  ->group('j.id')      
          //  ->order('j.start')
         //   ->offset(4)        
             ->limit(20)     
            ->queryAll();
         */
      //var_dump($data);exit(); //check_course ตารางว่างมันไม่ออก งง
        
       
        $criteria=new CDbCriteria;
        $criteria->with = array(
            'employee' => array('alias'=> 't1', 'together' => true, ),
            'employee.depart' => array('alias'=> 't2', 'together' => true, ),
          //  'checkcourse' => array('alias'=> 't3', 'together' => true, ),
        );
        $criteria->condition = "t.approval=:approval";
        $criteria->addCondition('t.course_id=:id', 'AND');
       // $criteria->addCondition('t3.day=:day', 'AND');
        $criteria->params = array(':approval' =>1, ':id' => $id);
        $criteria->order = 't2.id DESC';
        $criteria->limit = 20;
       
        //$criteria->together = true;
   // $criteria->together = true;
   // $UserProduct = UserProduct::model()->find($criteria); 
       // $criteria->limit = 20;
        //$count = CourseRegister::model()->count($criteria);
        //pagination
       // $pages = new CPagination($count);
        //$pages->setPageSize(Yii::app()->params['pagessize']);
       // $pages->applyLimit($criteria);
       $modelcourse= CourseRegister::model()->findAll($criteria); 
         //var_dump($modelcourse[0]->employee->firstname);exit();
       // var_dump($modelcourse); exit();
        if(isset($_POST['submitform'])){
           $idcourse=$_GET['id'];
           $daycheck=$_GET['day'];
           $myid=$_POST['radiobutton'];
           $score = $_POST['score'];
           $mymyischeck=0;
           if(isset($_POST['myischeck'])){
            $mymyischeck=1;    
           }
           foreach ($myid as $key => $value) {
           $extrat = explode('/', $value);// echo $extrat[1];exit(); 
           $myscore = $this->getinput($score, $extrat[1]);
             $coursemodel=new CheckCourse('insert');
             $coursemodel->check=$extrat[0];
             $coursemodel->day=$daycheck;
             $coursemodel->score=$myscore;
             $coursemodel->iscore=$mymyischeck;
             $coursemodel->course_id=$idcourse;
             $coursemodel->employee_id=$extrat[1];
             if($coursemodel->save()){
                 
            } 
           }
        }
        
        
        $this->render('index',array('modelcourse'=>$modelcourse,'model'=>$model));
    }
public  function ischeckday($day,$id) {
$mysql="SELECT cr.approval
FROM course_register cr,check_course ck
WHERE cr.course_id= cr.course_id AND cr.approval=1 AND ck.day='".$day."' AND cr.course_id='".$id."'";
     //   $sql = "SELECT * FROM table WHERE colname = '" . $_POST['data'] . "'";
        $dbCommand = Yii::app()->db->createCommand($mysql);
        $data = $dbCommand->queryAll();
        return count($data);
 }
    
    
    public function getinput($datain, $id) {
        foreach ($datain as $key => $value) {
            $idtext = array_keys($datain[$key]);
            $invalue = array_values($datain[$key]);
            //print_r($invalue);
            if ($id == $idtext[0]) {
                return $invalue[0];
            }
        }
    }
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
       /* $model = new CourseRegister('listcourseapproval');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['CourseRegister']))
         $model->attributes = $_GET['CourseRegister'];
        */
       if(Coursestaf::isstaff(Yii::app()->user->getuser_id())){  
        $data = Yii::app()->db->createCommand()
                ->select('c.*')
                ->from('coursestaf csff')
                ->leftJoin('course c','c.cu_id=csff.idcourse')
                ->leftJoin('employee e','csff.emid = e.idemployee')
                ->where('csff.emid=:idemployee', array(':idemployee'=>Yii::app()->user->getuser_id()))
               // ->group('r.course_id')      
               // ->order('p.dayclose ASC')
                // ->offset(4)        
                //  ->limit(10)     
                ->queryAll(); 
          // Yii::log($msg);
         //  var_dump($data);exit();
           $this->render('listcourseapproval', array(
            'model' =>$data,
        ));
     }else{
         $this->redirect(array('newcourse/index'));
     }     
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
