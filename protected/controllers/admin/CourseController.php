<?php
class CourseController extends Controller {
    public $layout = '//layouts/column2';
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index','Requestuser','view', 'admin', 'delete', 'create', 'getSupprier', 'update','Ajaxupdate'),
                'users' => array('1'), // 
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
public function actionError(){
     exit();
}
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    public function actionCreate(){
        $model = new Course;
        $id_staf="";     
        $this->performAjaxValidation($model);
        if (isset($_POST['Course'])) {
            $model->attributes = $_POST['Course'];
            $mycat=$model->categorycourse;
                $maxOrderNumber = Yii::app()->db->createCommand()
                 ->select('max(id) as max')
                 ->from('course')
                 ->queryScalar(); 
                $myid='CU'.$mycat.'-'.date("Y") . date("m") . date("d") . sprintf("%04d",++$maxOrderNumber);
            //$targetFolder = Yii::getPathOfAlias('webroot') . '/images/uploads/course/'; 
            $targetFolder = Yii::app()->basePath . '/../images/uploads/course/';
            $folder = date("Y_m_d");
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            if ($uploadedFile != null) {
                $rnd = md5(rand(0, 9999));
                $fileName = "{$rnd}-{$uploadedFile}";
                $model->image = $fileName;
            }
	     if (isset($_POST['isupprier_id'])) {
                $model->supprier_id = $_POST['isupprier_id'];
            }
            if(isset($_POST['id_staf'])){
              $id_staf=$_POST['id_staf'];  
            }
            $day=$_POST['day'];
            $timestart=$_POST['timestart'];
            $timeend=$_POST['timeend'];
            $detailTraining=$_POST['detailTraining'];
            $model->cu_id=$myid;
            $model->time=$_POST['timetotal'];
            $model->price=$_POST['pricecourse'];
            if ($model->save()) {
                if (!file_exists($targetFolder)) {
                    mkdir($targetFolder);
                    //  mkdir($targetFolder . $folder . '/' . "_thumbs");
                    chmod($targetFolder . $folder . "", 0777);
                    //    chmod($targetFolder . $folder . '/' . "_thumbs", 0777);
                    $targetFile = $targetFolder . "/" . $fileName; // $_FILES['Filedata']['name']
                    $uploadedFile->saveAs($targetFile);
                } else {
                    if ($uploadedFile != null) {
                        $targetFile = $targetFolder . "/" . $fileName; // $_FILES['Filedata']['name']
                        $uploadedFile->saveAs($targetFile);
                    }
                }
                foreach ($day as $key => $value) {
                   $newday=new Daycoursetraining();
                   $newday->idcourse=$myid;
                   $newday->day=$value;
                   $newday->timestart=$timestart[$key];
                   $newday->timeend=$timeend[$key];
                   $newday->detail=$detailTraining[$key];
                   $newday->save();
                }
                if($id_staf!=""){
               foreach ($id_staf as $key2 => $value2) {
                  $newstaf=new Coursestaf();
                  $newstaf->emid=$value2;
                  $newstaf->idcourse=$myid;
                  $newstaf->save();
                }     
              }
                echo '<script language="javascript">';
                echo "alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');";
                echo '</script>';
                Msg::success( 'บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
             $this->redirect(array('admin'));
            }else{
                Msg::error( $model->getErrors());
              Yii::app()->user->setFlash("error", "ไม่สามารถบันทึกข้อมูลได้ค่ะ");    
            }
        }
 
        $this->render('create', array(
            'model' => $model, 
            'supprier' => $this->supprier(),
            'employee'=>$this->employee(),
            'cost'=>$this->getcostcourse()
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $oldimg = $model->image;
        $id_staf="";
        $model->setScenario('update');
        $this->performAjaxValidation($model);
        if (isset($_POST['Course'])) {
            $model->attributes = $_POST['Course'];
            if (isset($_POST['isupprier_id'])) {
                $model->supprier_id = $_POST['isupprier_id'];
            }
            $targetFolder = Yii::app()->basePath . '/../images/uploads/course/';
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            $folder = date("Y_m_d");
            if ($uploadedFile != null) {
                $rnd = md5(rand(0, 9999));
                $fileName = "{$rnd}-{$uploadedFile}";
                $model->image = $fileName;
                $targetFile = $targetFolder . "/" . $fileName;
            } else {
                $model->image = $oldimg;
                 $targetFile = $targetFolder . "/" .$oldimg;
            }
	     if (isset($_POST['isupprier_id'])) {
                $model->supprier_id = $_POST['isupprier_id'];
            }
            if(isset($_POST['id_staf'])){
              $id_staf=$_POST['id_staf'];  
            }
            $day=$_POST['day'];
            $timestart=$_POST['timestart'];
            $timeend=$_POST['timeend'];
            $detailTraining=$_POST['detailTraining'];
            $model->time=$_POST['timetotal'];
            $model->price=$_POST['pricecourse'];
            if ($model->save()) {
                if ($uploadedFile != null) {
                    $targetpath = Yii::getPathOfAlias('webroot') . 'images/uploads/course';
                    if (file_exists($targetpath . "/" . $oldimg)) {
                        unlink($targetpath . "/" . $oldimg);
                    }
                    $uploadedFile->saveAs($targetFile);
                }
                Daycoursetraining::model()->deleteAll("idcourse='".$_GET['id']. "'");
                Coursestaf::model()->deleteAll("idcourse='".$_GET['id']. "'");
                foreach ($day as $key => $value) {
                   $newday=new Daycoursetraining();
                   $newday->idcourse=$_GET['id'];
                   $newday->day=$value;
                   $newday->timestart=$timestart[$key];
                   $newday->timeend=$timeend[$key];
                   $newday->detail=$detailTraining[$key];
                   $newday->save();
                }
                if($id_staf!=""){
                 foreach ($id_staf as $key2 => $value2) {
                  $newstaf=new Coursestaf();
                  $newstaf->emid=$value2;
                  $newstaf->idcourse=$_GET['id'];
                  $newstaf->save();
                }  
                }
                echo '<script language="javascript">';
                echo "alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');";
                echo '</script>';
                Msg::success( 'บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
                $this->redirect(array('admin'));
            }else{
              Msg::error( $model->getErrors());
              Yii::app()->user->setFlash("error", "ไม่สามารถบันทึกข้อมูลได้ค่ะ");        
            }
        }
        $this->render('update', array(
            'model' => $model, 
            'supprier' => $this->supprier(),
            'employee'=>$this->employee(),
            'cost'=>$this->getcostcourse()
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            $model = $this->loadModel($id);
            $targetFolder = Yii::getPathOfAlias('webroot') . 'images/uploads/course';
            if ($model->delete()) {
                if (file_exists($targetFolder."/".$model->image)) {
                    @unlink($targetFolder."/".$model->image);
                }
            }

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Course');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
  public function actionRequestuser($id) {
        $model=new Requestuser();
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'requestuser-form') {
          echo CActiveForm::validate($model);
         Yii::app()->end();
        }
         if (isset($_POST['Requestuser'])) {
          $model->attributes = $_POST['Requestuser'];
          $model->idcourse=$_POST['idcourse'];
           if($model->save()){
             $model->unsetAttributes();    
              Yii::app()->user->setFlash( 'success', 'คำร้องถูกส่งไปเรียบร้อยแล้วค่ะ !' );   
             $this->redirect(array('admin')); 
           }else{
           Yii::app()->user->setFlash( 'success', 'การส่งคำร้องล้มเหลว!' );      
           }
         }
        $this->render('Requestuser',array('model'=>$model));
    }  
    public function actionAdmin() {
        $model = new Course('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Course']))
            $model->attributes = $_GET['Course'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actiongetSupprier() {
        $this->renderPartial('infoSupprier', array('modelSupprier' => Supprier::model()->getsupprier($_POST['id']),
        ));
    }
    public function getcostcourse() {
        return Costcourse::model()->findAll();
    }
    public function supprier() {
        $model = new Supprier('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Supprier']))
            $model->attributes = $_GET['Supprier'];
        return $model;
    }
    public function employee() {
        $model = new Employee('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Employee']))
            $model->attributes = $_GET['Employee'];
       return $model;
    }
    public function loadModel($id) {
        $model = Course::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    public function actionAjaxupdate() { 
        $targetpath = Yii::getPathOfAlias('webroot'). 'images/uploads/course';
        $autoIdAll = $_POST['cu_id'];
        if (count($autoIdAll) > 0) {
            foreach ($autoIdAll as $autoId) {
              //  $dbc = new CDbCriteria();
              //  $dbc->condition = 'img_nw_id = :img_nw_id';
              //  $dbc->params = array(':img_nw_id' => $autoId);
              //  Images::model()->deleteAll($dbc);
                $post = Course::model()->findByPk($autoId);
                if ($post->delete()) {
                   if (file_exists($targetpath . "/" . $post->image)) {
                    @unlink($targetpath . "/" . $post->image);
                } 
                    echo 'ok';
                } else {
                    throw new Exception("Sorry", 500);
                }
            }
        }
    }           
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'course-form') {
           // var_dump($_POST);exit();
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
