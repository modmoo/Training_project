<?php
class ApprovalController extends Controller {
    public $pageSize = 2;  // จำนวนต่อหน้า 
    public function filters() {
        return array(
            'accessControl',
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin','getuserinfo','Addusers','Requestusers','getusers','delete', 'create', 'update', 'index', 'view', 'Main'),
                'users' => array('2'), //admin
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
  public function actiongetuserinfo() {
        $this->renderPartial('infousers', array('model' => Employee::model()->findByPk($_POST['id']),
        ));
    }
    public function actionIndex() {
        //  
        //    var_dump(Yii::app()->user->name);
       //echo Yii::app ()->user->getdepartments();
       // exit();
        $data = Yii::app()->db->createCommand()
                ->select('r.time,r.approval,r.note,p.*')
                ->from('course p')
                ->Join('course_register r','r.course_id = p.cu_id')
                ->Join('employee e','.r.employee_id = e.idemployee')
               ->where('r.approval=0 AND p.active=:active AND iddept=:dapt', array(':active' => 1,':dapt'=>Yii::app ()->user->getdepartments()))
                ->group('r.course_id')      
                ->order('p.dayclose ASC')
                // ->offset(4)        
                //  ->limit(10)     
                ->queryAll();
       //var_dump($data); exit();  
        $this->render('index', array('data' => $data));
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
    public function actionMain($id) {
        $course = NULL;
        if (isset($_GET['id'])) {
            $ids = $_GET['id'];
            $course = Course::model()->findByPk($ids);
        }
        /*
          $condition='approval=1 AND course_id='.$ids;
          //get count
          $modelregis=CourseRegister::model()->with(array(
          'course'=>array('select'=>'id, name'),
          'employee'=>array('condition'=>$condition,'order'=>'t.time'),
          ))->findAll();
         */
        if (isset($_POST['radiobutton'])) {
            $check = $_POST['radiobutton'];
            $remark = $_POST['remark'];
//$output = array_map(create_function('$name', 'return "$name";'), $_POST['remark']);
//echo implode('<br>', $output);
            foreach ($check as $key => $value) {
                $extrat = explode('-', $value);
                $comments = $this->getinput($remark, $extrat[1]);
                // $modelload = CourseRegister::model()->findAllByAttributes(array('idcourse' =>$extrat[1]));
                $modelload = CourseRegister::model()->findByPk($extrat[1]);
                $modelload->changapproval($extrat[0], $comments);
            }
        }
        $criteria = new CDbCriteria;
        $criteria->with = array('course',
            'employee',
            'employee.depart' => array(
                'alias' => 'v',
            // 'joinType'=>'INNER JOIN'
            )
        );
        $criteria->together = true; // ADDED THIS
        $criteria->select = array('id');
        $criteria->condition = "t.approval=:approval";
        $criteria->addCondition('course_id=:id', 'AND');
        $criteria->addCondition('employee.iddept=:iddept', 'AND');
        $criteria->params = array(':approval' =>0, ':id' => $ids,':iddept'=>Yii::app()->user->getdepartments());
        $criteria->order = 'v.id DESC';
//$criteria->limit = 10;
        $count = CourseRegister::model()->count($criteria);
        //pagination
        $pages = new CPagination($count);
        $pages->setPageSize(Yii::app()->params['pagessize']);
        $pages->applyLimit($criteria);
        $CourseRegister = CourseRegister::model()->findAll($criteria);
        // var_dump($CourseRegister[1]->employee->depart->name);
        //var_dump($CourseRegister); exit();
        $this->render('main', array('course' => $course, 'pages' => $pages, 'modelregis' => $CourseRegister));
    }
    public function actiongetusers() {
        $this->renderPartial('infouser',array(
                                        'modeluser' =>  $this->getusers($_POST['id'],$_POST['cat']),
        ));
    }
public function actionRequestusers() {
        // var_dump(Yii::app ()->user->getdepartments());exit();
            $data = Yii::app()->db->createCommand()
                ->select('c.cu_id,c.name,rq.*')
                ->from('requestuser rq')
                ->Join('course c','rq.idcourse = c.cu_id')
               // ->Join('course_register r','r.course_id=rq.idcourse')
               //  ->Join('employee e')
               // ->where('r.approval=1 AND c.active=:active AND e.iddept=:dapt', array(':active' => 1,':dapt'=>Yii::app ()->user->getdepartments()))
               ->where('c.active=:active AND rq.todapt=:dapt',
                       array(':active' => 1,':dapt'=>Yii::app ()->user->getdepartments()))    
               // ->group('rq.course_id')      
                ->order('c.dayclose ASC')
                // ->offset(4)        
                //  ->limit(10)     
                ->queryAll();
         //var_dump($data); exit();
       $this->render('requestusers', array('data' => $data));
    }
    public function actionAddusers($id){
        $course = NULL;
        if (isset($_GET['id'])) {
            $ids = $_GET['id'];
            $course = Course::model()->findByPk($ids);
        }
        if($_POST){
            $myid=$_POST['radiobutton'];
            foreach ($myid as $key => $value) {
            $idem=explode('/',$value);   
            $modelregiscourse=new CourseRegister(); 
            $modelregiscourse->course_id=$idem[1];
            $modelregiscourse->employee_id=$idem[0];
            $modelregiscourse->approval=1;
            $modelregiscourse->save();
         }
        Requestuser::model()->deleteAll('todapt=:todapt AND idcourse=:idcourse', array(':todapt'=>Yii::app()->user->getdepartments(),':idcourse'=>$ids)); 
        echo '<script language="javascript">';
        echo 'alert("Registration Course success!")';
        echo '</script>'; 
        }
        $data = Yii::app()->db->createCommand()
                ->select('c.cu_id,c.name,rq.*')
                ->from('requestuser rq')
                ->Join('course c','rq.idcourse = c.cu_id')
               // ->Join('course_register r','r.course_id=rq.idcourse')
               //  ->Join('employee e')
               // ->where('r.approval=1 AND c.active=:active AND e.iddept=:dapt', array(':active' => 1,':dapt'=>Yii::app ()->user->getdepartments()))
               ->where('c.active=:active AND rq.todapt=:dapt AND rq.idcourse=:idcourse',
                       array(':active' => 1,':dapt'=>Yii::app ()->user->getdepartments(),
                           ':idcourse'=>$ids))    
               // ->group('rq.course_id')      
                ->order('c.dayclose ASC')
                // ->offset(4)        
                //  ->limit(10)     
                ->queryRow();
        
        $this->render('addusers', array('course' => $course,
                                         'requestcourse'=>$data,
                                         'employee'=>$this->employee(),));
    }
    
    public function getusers($id,$cat) {
            $criteria = new CDbCriteria();
            $criteria->condition='employee_id=:id';
            $criteria->addCondition('categorycourse=:categorycourse', 'AND');
            $criteria->params =array(':id'=>$id,':categorycourse'=>$cat);
            $criteria->order="start DESC"; 
        return TrainingHistory::model()->findAll($criteria);
    } 
    public function employee() {
          $model = new Employee('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Employee']))
            $model->attributes = $_GET['Employee'];
            $model->iddept=Yii::app ()->user->getdepartments();
       return $model;
    }
}
