<?php

class EmployeeController extends Controller {
    public $layout = '//layouts/column2';
    public function filters() {
        return array(
            'accessControl', 
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin','getuserinfo','infosavehistory','SaveSuhistory', 'Exportpdf','delete','index','savehistory','view','create','actsavehistory','update','Ajaxupdate'),
                'users' => array('1','2'),
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
  public function actiongetuserinfo() {
        $this->renderPartial('infousers', array('model' => Employee::model()->findByPk($_POST['id']),
        ));
    }
    public function actionCreate() {
        $model = new Employee; 
// $this->performAjaxValidation($model);
        if (isset($_POST['Employee'])) {
            $startdate=$_POST['startdate'];
            $birtthday=$_POST['hiddenbirtthday'];        
            $model->attributes = $_POST['Employee'];
            $mycat=$model->iddept;
                $maxOrderNumber = Yii::app()->db->createCommand()
                 ->select('max(id) as max')
                 ->from('employee')
                 ->queryScalar(); 
                $myid='EM'.$mycat.'-'.'0000'.++$maxOrderNumber;
             //  echo $myid;exit();
            $targetFolder = Yii::app()->basePath . '/../images/uploads/employee/';
            $folder = date("Y_m_d");
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            if ($uploadedFile != null) {
                $rnd = md5(rand(0, 9999));
                $fileName = "{$rnd}-{$uploadedFile}";
                $model->image = $fileName;
            }
            // var_dump($uploadedFile);exit();
            $model->startdate=$startdate;//$_POST['startdate'];
            $model->birtthday=$birtthday;
            //var_dump($_POST['birtthday']);exit();
           //s var_dump($model->startdate);var_dump($model->birtthday); exit();
            $model->idemployee=$myid;
            $model->username=$myid;
            $model->password=Employee::MyhashPassword($myid);
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
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $oldimg = $model->image;
        $model->setScenario('update');
       // $this->performAjaxValidation($model);
        if (isset($_POST['Employee'])) {
            $startdate=$_POST['startdate'];
            $birtthday=$_POST['hiddenbirtthday'];   
            $model->attributes = $_POST['Employee'];
            $targetFolder = Yii::getPathOfAlias('webroot') . '/images/uploads/course/'; 
            $targetpath = Yii::getPathOfAlias('webroot') . '/images/uploads/employee';
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            $folder = date("Y_m_d");
            if ($uploadedFile != null) {
                $rnd = md5(rand(0, 9999));
                $fileName = "{$rnd}-{$uploadedFile}";
                $model->image = $fileName;
                $targetFile = $targetFolder . "/" . $fileName;
            } else {
                $model->image = $oldimg;
                $targetFile = $targetFolder . "/" . $oldimg;
            }
            $model->startdate=$startdate;//$_POST['startdate'];
            $model->birtthday=$birtthday;
            if ($model->save()) {
                if ($uploadedFile != null) {
                    if (file_exists($targetpath . "/" . $oldimg)) {
                        @unlink($targetpath . "/" . $oldimg);
                    }
                    $uploadedFile->saveAs($targetFile);
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
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $model = $this->loadModel($id);
            $targetFolder = Yii::getPathOfAlias('webroot') . '/images/uploads/employee';
            if ($model->delete()) {
                if (file_exists($targetFolder . "/" . $model->image)) {
                    @unlink($targetFolder . "/" . $model->image);
                }
            }
// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Employee');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Employee('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Employee'])){
            $model->attributes = $_GET['Employee'];
        }
        $this->render('admin', array(
            'model' => $model,
        ));
    }
    public function actionsavehistory() {
       // $model = new CheckCourse('searchsavehistory');
        $model = new CourseRegister('searchsavehistory');
        //var_dump($model->searchsavehistory());exit();
        $this->render('savehistory', array(
            'model' => $model,
        ));
    }
    public function actionactsavehistory() {
      $i=0;
      if(isset($_POST['score'])){
       $scoreAll =$_POST['score'];
       $statusAll =$_POST['status'];
       $useridAll =$_POST['userid'];      
       $course_idAll =$_POST['course_id'];
         if (count($useridAll) > 0) {  
           $course= Course::model()->findByPk($course_idAll);  
            $newt=new TrainingHistory();
            $newt->cu_id=$course->cu_id;
            $newt->name=$course->name;
            $newt->image=$course->image;  
            $newt->dayopencoure=$course->dayopencoure; 
            $newt->dayclose=$course->dayclose;  
            $newt->time=$course->time; 
            $newt->location=$course->location;  
            $newt->typelocation=$course->typelocation; 
            $newt->discription=$course->discription;   
            $newt->num_max=$course->num_max;  
            $newt->price=$course->price;  
            $newt->trainer=$course->trainer;  
            $newt->categorycourse=$course->categorycourse;  
            $newt->employee_id=$course->supprier_id; 
            //$newt->save()
             if($newt->save()){
              foreach ($useridAll as $key => $autoId) {
               $i++;
               if(isset($_POST['question'])){ 
                 $criteria = new CDbCriteria();
                 $criteria->select = 'id';
                 $criteria->condition = 'course_id=:course_id AND employee_id=:employee_id';
                 $criteria->params = array(':course_id'=>$course_idAll, ':employee_id'=>$autoId);
                 $mycourse = CourseRegister::model()->find($criteria);   
                 $mycourse->setquestioninapproval('กรุณาทำแบบประเมินด้วยค่ะ');
               }else{
                 $criteria = new CDbCriteria;
                 $criteria->condition = 'course_id=:course_id AND employee_id=:employee_id';
                 $criteria->params = array(':course_id'=>$course_idAll, ':employee_id'=>$autoId);
                 $mydelete=CourseRegister::model()->find($criteria);
                 $mydelete->delete();
                 } 
                 $mysatus=array_values($statusAll);
                // var_dump($mysatus[$key]);exit();
                  $huser=new TrainingUsershistory('insert');
                   $huser->employee_id=$autoId; 
                   $huser->resulttraining=$mysatus[$key]; 
                   $huser->score=$scoreAll[$i-1]; 
                   $huser->cu_id=$course_idAll;   
                   $huser->save();  
                }    
             }      
           }    
        }
    }
 
    public function actionSaveSuhistory($id) {
            if(isset($_POST['sp_id'])){
            $huser=new TrainingUsershistory('insert');
            $huser->employee_id=$autoId; 
            $huser->resulttraining=$autoId; 
            $huser->score=$autoId; 
            $huser->usertype=$autoId; 
            $huser->cu_id=$autoId;     
             }
            $sql='SELECT tu.resulttraining,tu.score,th.name,em.*,';  
            $sql.='(SELECT MAX(day) as daym FROM daycoursetraining as da WHERE da.idcourse=tu.cu_id) dmax';
            $sql.=' FROM training_usershistory as tu LEFT JOIN training_history as th ON tu.cu_id=th.cu_id';
            $sql.=' LEFT JOIN employee as em ON tu.employee_id=em.idemployee';
            $sql.=' WHERE tu.cu_id="'.$id.'"';
            $sql.=' ORDER BY dmax DESC'; 
        $dbCommand = Yii::app()->db->createCommand($sql);
        $data=$dbCommand->queryAll(); 
            $this->render('SaveSuhistory', array(
            'model' => $data,
        ));
}
    public function actioninfosavehistory($id){
        $sql='SELECT * FROM course WHERE cu_id="'.$id.'";';    
        $dbCommand = Yii::app()->db->createCommand($sql);
        $data=$dbCommand->queryRow();
            $this->render('infosavehistory', array(
            'model' => $data,
        ));  
    }
    public function actionAjaxupdate() { 
        $targetpath = Yii::getPathOfAlias('webroot') . '/images/uploads/employee';
        $autoIdAll = $_POST['idemployee'];
        if (count($autoIdAll) > 0) {
            foreach ($autoIdAll as $autoId) {
              //  $dbc = new CDbCriteria();
              //  $dbc->condition = 'img_nw_id = :img_nw_id';
              //  $dbc->params = array(':img_nw_id' => $autoId);
              //  Images::model()->deleteAll($dbc);
                $post = Employee::model()->findByPk($autoId);
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
public function actionExportpdf() { 
 if(isset($_GET['id'])){
$html2pdf = Yii::app()->ePdf->HTML2PDF('P', 'A4', 'fr');
$html2pdf->pdf->SetDisplayMode('fullpage');
//$html2pdf->writeHTML('<page style="font-family:freeserif;width:100%;">นี้คือข้อความภาษาไทย</page>'); 
//$html2pdf->Output('mydoc.pdf');
 //var_dump($this->renderPartial('reports'));
 $data='<page style="font-family:freeserif;text-align:center; width:100%;">'.$this->renderPartial('reports', array(), true).'</page>';
// $html2pdf->WriteHTML($this->renderPartial('reports', array(), true));
 $html2pdf->WriteHTML($data);
 $html2pdf->Output();  
 }
   $this->render('reports');
    }
     
    public function loadModel($id) {
        $model = Employee::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'employee-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
