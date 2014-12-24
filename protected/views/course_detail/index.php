<?php
$isoldregister = FALSE;
$isexpirecourse = FALSE;
$dayall="ไม่พบ";
$daynumss="ไม่พบ";
$this->pageTitle = 'ลงทะเบียน';
$courseid = "";
if (isset($_GET['id'])) {
    $isexpirecourse=  Course::isexpirecourse($_GET['id']);
    $courseid = $_GET['id'];
    $isoldregister = CourseRegister::model()->checuserregister($_GET['id'],Yii::app()->user->getuser_id()); //$courseid,$user  
    $dayall=Daycoursetraining::getdayallcourse($courseid);
    $exdata=explode(',',$dayall);
    $daynumss=count($exdata);
}
//var_dump($isexpirecourse);exit();
//var_dump(Course::model()->checkclose(14));  //Yii::app()->user->id
//var_dump(CourseRegister::model()->checuserregister(15,1));
?>
<?php
require_once Yii::app()->basePath . '/views/include/connectdb.php';
$result = mysql_query("SELECT name FROM categorycourse WHERE id={$model->categorycourse}");
$row = mysql_fetch_array($result);
?>
<div class="row">
    <div class="col-xs-12">
        <div id="main_boxslide">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">

                            <!--- div profiles--->
                            <div id='mainbox_profile'>
                                <div id='proimg'>
                                    <img src="<?= Yii::app()->baseUrl; ?>/images/uploads/course/<?= $model->image; ?>">
                                </div>
                                <div id='profile'>
                                    <div class="h_profiles"><h4 style="padding:5px 15px 3px 20px; background:#428bca; border-radius:5px; margin-button:5px; margin-top:5px; color:#ffffff;">
                                            <span class="glyphicon glyphicon-play">&nbsp;</span>รายละเอียดหลักสูตรการอบรม</h4></div>
                                    <div style="margin-left:5px;">
                                        <div class="row clearfix">
                                            <div class="col-xs-6 column">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <b> รหัสหลักสูตร:</b> &nbsp;<?= $model->cu_id ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>  หัวข้อในการอบรม : </b>&nbsp;<?= $model->name ?>  	
                                                            </td>   
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>ประเภท :</b>&nbsp;<?= $row['name'] ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                $mysup = "ไม่พบข้อมูล";
                                                                if ($sup != NULL) {
                                                                    $mysup = $sup->name;
                                                                }
                                                                ?>
                                                                <b>บริษัทผู้จัดการอบรม :</b>&nbsp;<?= $mysup ?> 
                                                            </td>
                                                        </tr>
                                                        
                                                        
                                                        <tr>
                                                            <td>
                                                                <b>เปิดรับสมัครตั้งแต่:</b> &nbsp;<?= $model->dayopencoure ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>ถึงวันที่ : </b>&nbsp;<?= $model->dayclose ?> 
                                                            </td>
                                                        </tr>	
                                                        <tr>
                                                            <td>
                                                                <b>วันที่ทำการอบรม : </b>&nbsp;<?= $dayall ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>จำนวนวัน :</b> &nbsp;<?= $daynumss ?>&nbsp; วัน
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>รับสมัครจำนวน :</b> &nbsp;<?= $model->num_max ?> คน
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                $numregis = 0;
                                                                $balance = "";
                                                                if (isset($_GET['id'])) {
                                                                  //  $numregis = CourseRegister::model()->checkmax($_GET['id']);
                                                                    if(!$isexpirecourse){
                                                                     $balance="ไม่มีข้อมูล";   
                                                                    }else{
                                                                   // $balance = $model->num_max - CourseRegister::checkmax2($_GET['id']);    
                                                                    }
																 $balance = $model->num_max - CourseRegister::checkmax2($_GET['id']);   	
                                                                } else {
                                                                    $balance = "ข้อมูลไม่ถูกต้อง";
                                                                }
                                                                ?>
                                                                <b>คงเหลือ :</b> &nbsp;<?= $balance; ?> คน
                                                            </td>
                                                        </tr>	
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!------------------------->

                                            <div class="col-xs-6 column">
                                                <div style="width:450px; height:400px; overflow:auto;">

              
                                                    <div class="">
                                                        <h4 style="background:#F7F7F7; height:35px; padding-top: 10px; padding-left: 10px;"> รายละเอียดหลักสูตร</h4>
                                                        <h5 style="padding-left: 15px;"><?= $model->discription ?>

                                                        </h5>           
                                                    </div>
                                                </div>
                                            </div>	

                                        </div>

                                    </div>

                                </div>
                                <div style="clear:both;"></div>		  
                            </div> 
                            <?php
                            $form = $this->beginWidget('CActiveForm', [
                                'id' => 'register-course',
                                'enableAjaxValidation' => FALSE,
                                'htmlOptions' => [
                                    'class' => 'form-horizontal',
                                    'role' => 'form',
                                    'style' => 'text-align:center; margin-top:10px;',
                                ],
                            ]);
                            ?> 
                            <?= $form->errorSummary($modelregiscourse, null, null, [ 'class' => 'alert alert-danger']); ?>
                            <?php if (Yii::app()->user->hasFlash('success')): ?>
                                <div class="alert alert-success">
                                    <?= Yii::app()->user->getFlash('success'); ?>
                                </div>
                            <?php endif; ?>
                            <?= $form->hiddenField($modelregiscourse, 'course_id', [ 'class' => 'form-control', 'value' => $courseid]); ?>
                            <?= $form->hiddenField($modelregiscourse, 'employee_id', [ 'class' => 'form-control', 'value' => Yii::app()->user->getuser_id()]); ?>
                            <div class="form-group">
                                <div class="text-center">
                                    <?php
                                   // var_dump($isexpirecourse);
                                    if (!$isoldregister && $isexpirecourse) {
                                        echo CHtml::submitButton('ลงทะเบียน', [ 'class' => 'btn btn-primary']);
                                    } else if($isexpirecourse && $isoldregister) {
                                        echo "<button type=\"button\" class=\"btn btn-success glyphicon glyphicon-ok\" disabled=\"disabled\"> คุณลงทะเบียนไปแล้วค่ะ</button>";
                                    }else if(!$isexpirecourse){
                                        echo "<button type=\"button\" class=\"btn btn-danger glyphicon glyphicon-remove\" disabled=\"disabled\"> หลักสูตรปิดไปแล้วค่ะ</button>";     
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php $this->endWidget();
                            ?>

                        </div>
                    </div>                            
                </div> 
            </div>
        </div>                            
    </div>  
</div>   
<?php
//close the connection
mysql_close($dbhandle);
?>