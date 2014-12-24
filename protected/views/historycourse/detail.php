<?php
//var_dump($model);
//var_dump(TrainingUsershistory::getuserbycourse($model->cu_id));
?>

<?php
//var_dump($model);
?>
<?php
$isoldregister = FALSE;
$isexpirecourse = FALSE;
$dayall = "ไม่พบ";
$daynumss = "ไม่พบ";
$this->pageTitle = 'รายละเอียดหลักสูตรการอบรม';
$courseid = "";
if (isset($_GET['id'])) {
    //$isexpirecourse=employee::isexpireemployee($_GET['id']);
    $courseid = $_GET['id'];
    //$isoldregister = employee::model()->employee($_GET['id'],Yii::app()->user->getuser_id()); //$courseid,$user  
    $dayall = Daycoursetraining::getdayallcourse($courseid);
    $exdata = explode(',', $dayall);
    $daynumss = count($exdata);
}
//var_dump(Course::model()->checkclose(14));  //Yii::app()->user->id
//var_dump(CourseRegister::model()->checuserregister(15,1));*/
 //var_dump($model['employee_id']);exit();
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
                                    <img src="<?= Yii::app()->baseUrl; ?>/images/uploads/course/<?= $model["image"] ?>">
                                </div>
                                <div id='profile'>
                                    <div class="h_profiles"><h4 style="padding:5px 15px 3px 20px; background:#428bca; border-radius:5px; margin-button:5px; margin-top:5px; color:#ffffff;">
                                            <span class="glyphicon glyphicon-play">&nbsp;</span>รายละเอียดการเข้าอบรม</h4></div>
                                    <div style="margin-left:5px;">
                                        <div class="row clearfix">
                                            <div class="col-xs-6 column">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <b>รหัสพนักงาน :</b> 
                                                            </td>
                                                            <td>&nbsp;<?= Yii::app()->user->getuser_id(); ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>ผลการอบรม:</b>  
                                                            </td>
                                                            <td>&nbsp;<?=TrainingUsershistory::getstatusleaningnew($model['cu_id'],Yii::app()->user->getuser_id()); ?>
															</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>ผลคะแนน:</b>  
                                                            </td>
                                                            <td>&nbsp;<?=TrainingUsershistory::getscorebyuser($model['cu_id'],Yii::app()->user->getuser_id()); ?>&nbsp;คะแนน</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b> รหัสหลักสูตร:</b> 
                                                            </td>
                                                            <td>&nbsp;<?= $model['cu_id'] ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>  หัวข้อในการอบรม : </b>  	
                                                            </td>
                                                            <td>&nbsp;<?= $model["name"] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>ประเภท :</b> 
                                                            </td>
                                                            <td>&nbsp;<?= Categorycourse::getlabelTypescourse($model['categorycourse']) ?></td>
                                                        </tr>
                                                        
                                                        
                                                        <tr>
                                                            <td>
                                                                <b>ผู้รับผิดชอบการบรม :</b>
                                                            </td>
                                                            <td>&nbsp; <?php
                                                              if(isset($model['trainer'])){
																echo Supprier::getlabelsupprier($model['employee_id']);  
															  }else{
																echo $model['trainer'];  
															  }
															   ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>เปิดรับสมัครตั้งแต่:</b>
                                                            </td>
                                                            <td> &nbsp;<?= $model['dayopencoure'] ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>ถึงวันที่ : </b>
                                                            </td>
                                                            <td>&nbsp;<?= $model['dayclose'] ?> </td>
                                                        </tr>	
                                                        <tr>
                                                            <td>
                                                                <b>วันที่ทำการอบรม : </b> 
                                                            </td>
                                                            <td>&nbsp;<?= $dayall ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>จำนวนวัน :</b>
                                                            </td>
                                                            <td> &nbsp;<?= $daynumss ?>&nbsp; วัน</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>รับสมัครจำนวน :</b>
                                                            </td>
                                                            <td><?= $model['num_max'] ?> &nbsp; คน</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!------------------------->

                                            <div class="col-xs-6 column">
                                                <div style="width:450px; height:auto; overflow:auto;">

                                                    <div>
                                                        <h4 style="background:#F7F7F7; height:35px; padding-top: 10px; padding-left: 10px;"> รายละเอียดหลักสูตร</h4>
                                                    </div>

                                                </div>

                                                <div style="width:450px; height:400px; overflow:auto;">
                                                    <div class="">

                                                        <h5 style="padding-left: 15px;text-indent: 30px; text-transform:capitalize;line-height:25px; "><p align="justify"><?= $model['discription'] ?></p>

                                                        </h5>           
                                                    </div>
                                                </div>
                                            </div>	

                                        </div>

                                    </div>

                                </div>
                                <div style="clear:both;"></div>		  
                            </div> 

                            

                            <div class="form-group">
                                <div class="text-center">

                                </div>
                            </div>


                        </div>
                    </div>                            
                </div> 
            </div>
        </div>                            
    </div>  
</div>   
<?php
//close the connection
//mysql_close($dbhandle);
?>