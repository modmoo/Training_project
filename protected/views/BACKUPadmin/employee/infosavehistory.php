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
                                            <span class="glyphicon glyphicon-play">&nbsp;</span>รายละเอียดหลักสูตรการอบรม</h4></div>
                                    <div style="margin-left:5px;">
                                        <div class="row clearfix">
                                            <div class="col-xs-6 column">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <b> รหัสหลักสูตร:</b> &nbsp;<?= $model['cu_id'] ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>  หัวข้อในการอบรม : </b>&nbsp;<?= $model["name"] ?>  	
                                                            </td>   
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>ประเภท :</b>&nbsp;<?= Categorycourse::getlabelTypescourse($model['categorycourse']) ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>

                                                                <b>บริษัทผู้จัดการอบรม :</b>&nbsp;<?= Supprier::getlabelsupprier($model['supprier_id']) ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>ผู้รับผิดชอบการบรม :</b>&nbsp; <?= $model['trainer'] ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>เปิดรับสมัครตั้งแต่:</b> &nbsp;<?= $model['dayopencoure'] ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>ถึงวันที่ : </b>&nbsp;<?= $model['dayclose'] ?> 
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
                                                                <b>รับสมัครจำนวน :</b> &nbsp;<?= $model['num_max'] ?> คน
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>


                                                            </td>
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