<div class="row">
    <div class="col-xs-12">

        <!--- div profiles--->
        <div id='mainbox_profile'>
            <div id='proimg'>
                <img src="<?=Yii::app()->baseUrl;?>/images/uploads/course/<?=$datacourse->image;?>">
            </div>
            <div id='profile'>
                <div class="h_profiles"><h3>Result of Register Course</h3><br>ประกาศผลผู้มีสิทธิ์ในการเข้าอบรม</br></div>
                <div style="margin-left:5px;">
                    <div class="row clearfix">
                        <div class="col-xs-12 column">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td width="300">
                                            Course ID: &nbsp;<?=$datacourse->cu_id;?>
                                        </td>
                                        <td>
                                            Course Name :&nbsp;<?=$datacourse->name;?>	
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            เปิด Course เมื่อ :&nbsp;<?=$datacourse->dayopencoure;?>
                                        </td>
                                        <td>
                                            จำนวนผู้สมัคร :&nbsp;<?=CourseRegister::checkmax2($datacourse->cu_id);?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            จำนวนผู้มีสิทธิ์ในการเข้าอบรม :&nbsp:<?=CourseRegister::checkmaxapprovel($datacourse->cu_id)?> &nbsp;คน
                                        </td>
                                        <td>
                                            จำนวนผู้ไม่ผู้มีสิทธิ์ในการเข้าอบรม :&nbsp;<?=CourseRegister::checkmaxcalcel($datacourse->cu_id);?> &nbsp;คน
                                        </td>
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
            <div class="panel panel-default" style="padding:2px;">
                <div class="panel-heading">ผลการอนุมัติ</div>
                <div class="panel-body">
                    <?php
                    
                    ?>
                    <div class="row">
                     <!--   <div class="col-xs-2">  <h4>แผนก : บัญชี</h4> </div>  -->
                        <div class="col-xs-12">
                            <div class="list-group">
                                <table class="table table-striped">
                                    <thead>
                                        <tr height="50" style="background:#428BCA;color:#fff; padding-top:2px;padding-bottom:2px; height:50px;">
                                            <th>:: Employee ID::</th>
                                            <th>::First Name:: </th>
                                            <th>::Last Name::</th>
                                            <th> : : ผลการอนุมัติ : :</th>
                                            <th> : : หมายเหตุ : : </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data as $key => $value) {
                                        ?>
                                        <tr>
                                            <td width="100"><?=$value['idemployee']?></td>
                                            <td width="100"> <?=$value['firstname']?></td>
                                            <td width="100"><?=$value['lastname']?></td>
                                            <td width="100"><?=CourseRegister::getstatus2($value['approval'])?></td>
                                            <td width="100"><?=$value['note']?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          

            </div>
        </div>    
    </div>
</div>