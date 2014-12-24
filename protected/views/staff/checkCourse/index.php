<?php
$myday="";
if(isset($_GET['day'])){
$myday=$_GET['day'];    
}
$regisnum=CourseRegister::model()->checkmax($_GET['id']);
?>
<script type="text/javascript">
$(document).ready(function(){
$("#myischeck").click(function(){
       // if($("#agree").attr('checked')){
      //      $("#saveForm").fadeIn();
      //  }
    //alert($(this).val());
    });
});
//isscore
</script>
<div class="row">
    <div class="col-xs-12">
        <div id='mainbox_profile'>
            <div id='proimg'>
                <img src="<?= Yii::app()->baseUrl; ?>/images/uploads/course/<?= $model->image; ?>">
            </div>
            <div id='profile'>
                <div class="h_profiles"><h3></h3><br>ตรวจสอบรายชื่อผู้เข้าอบรม</br></div>
                <div style="margin-left:5px;">
                    <div class="row clearfix">
                        <div class="col-xs-12 column">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td width="300">
                                            รหัสหลักสูตร: &nbsp;<?= $model->cu_id ?>
                                        </td>
                                        <td>
                                           ชื่อรหัสหลักสูตร :&nbsp;<?= $model->name ?>	
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                         อบรม : วันที่ :&nbsp;<?=$myday; ?>
                                        </td>
                                        <td>
                                            จำนวนผู้เข้าอบรม :&nbsp;<?=$regisnum; ?>&nbsp;คน
                                        </td>
                                        <td></td>
                                    </tr>

                                <td></td>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div style="clear:both;"></div>		  
        </div> 
        <div id="my_box_trainning_history">
        <form method="post" enctype="multipart/form-data">  
            <div class="panel panel-default" style="padding:2px;">
                <div class="panel-heading">รายชื่อผู้เข้าอบรม  </div>
                <div class="panel-body">
                    <input type="hidden" name="submitform" value="1">
                    <div class="row">
                <div class="col-xs-1">
                    <!--   <h6>แผนก : การตลาด</h6> -->
                </div>
                <div class="col-xs-11">
                    <div class="list-group">    
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr height="50" style="background:#428BCA;color:#fff; padding-top:2px;padding-bottom:2px; height:50px;">
                                    <th align="center">รูปภาพ</th>
                                    <th align="center" >รหัส</th>
                                    <th align="center" >ชื่อ</th>
                                    <th align="center" >นามสกุล</th>
                                    <th align="center" > เข้าอบรม</th>
                                    <th align="center" >ไม่เข้าอบรม</th>
                                    <th align="center" > คะแนน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                             //   CheckCourse::ischeckday($day, $id);
                             //var_dump(CheckCourse::ischeckday($_GET['day'],$_GET['id'])); exit();       
                               if(CheckCourse::ischeckday($_GET['day'],$_GET['id'])){
                                $num=0;
                                foreach ($modelcourse as $key => $value) {
                                    $num++;
                                   // var_dump($value);exit();
                                    ?>   
                                    <tr  style="height:100px">
                                        <td width="10%"><img class="img-rounded" src="<?= Yii::app()->baseUrl; ?>/images/uploads/employee/<?= $value->employee->image;?>" style="width:100px;height:100px"></td>
                                        <td width="130" align="center"><?=$value->employee->idemployee ?></td>
                                        <td width="120" align="center" > <?=$value->employee->firstname ?></td>
                                        <td width="120" align="center" > <?=$value->employee->lastname ?></td>
                                        <td width="100"  align="center" ><input type="radio" checked name="radiobutton[<?= $num ?>]" value="1/<?=$value->employee->idemployee?>"></td>
                                        <td width="120" align="center" ><input type="radio" name="radiobutton[<?= $num ?>]" value="0/<?=$value->employee->idemployee ?>"></td>
                                        <td width="100" align="center" ><input type="text" class="isscore" name="score[<?= $num ?>][<?=$value->employee->idemployee?>]" size="4">&nbsp;คะแนน</td>
                                    </tr>
                                    <?php
                                }
                                ?> 
                                <tr>
                                    <td colspan="7"width="100"> รวม :&nbsp; <?=$num?> &nbsp;คน</td>
                                </tr>   
                              <!--  <tr>
                                    <td> Upload Image </td>
                                    <td colspan="6"><input id="input-23" type="file" name="myfiles"></td>
                                </tr> -->
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>      
                    </div>
                  </div>
              </div>  
               <?php
               if(CheckCourse::ischeckday($_GET['day'],$_GET['id'])){
                 if($regisnum>0){
                       ?>
                    <div class="row">
                        <div class="col-xs-2"></div>
                        <div class="col-xs-10"><div style="text-align: center;"><button type="submit"  class="btn btn-primary">บันทึก</button></div></div>
                         <div class="col-xs-2"></div>
                    </div>
                   <?php
                }
               
                 }
                 ?>       
        </div>	
    </div>
  </form>   