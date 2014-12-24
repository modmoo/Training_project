<?php
$this->setPageTitle('ประวัติการทำงาน');
//var_dump($modelchange->getAttributeLabel('olduser'));
?>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">

                <!--- div profiles--->
                <div id='mainbox_profile'>
                    <div id='proimg'>
                        <img src="<?= Yii::app()->baseUrl; ?>/images/uploads/employee/<?= $model->image; ?>">
                    </div> 
                    <div id='profile'>
                        <div class="h_profiles"><h4 style="padding:5px 15px 3px 20px; background:#428bca; border-radius:5px; margin-button:5px; margin-top:5px; color:#ffffff;">
                                <span class="glyphicon glyphicon-play">&nbsp;</span>ข้อมูลส่วนตัว</h4></div>
                        <div style="margin-left:5px;">
                            <div class="row clearfix">
                                <div class="col-xs-12 column">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="200">
                                                    <b> รหัสพนักงาน : </b>&nbsp;
                                                </td>
                                                <td>
<?= $model->idemployee ?>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>ชื่อ-นามสกุล :</b>&nbsp;
                                                </td>
                                                <td>
<?= $model->firstname ?>&nbsp;  &nbsp;<?= $model->lastname ?>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="200">
                                                    <b> แผนก :</b>&nbsp; 
                                                </td>
                                                <td>
                                              <?=dataweb::getlabeldepartmanets($model->iddept)?>
                                                </td>
                                                <td></td>
                                            </tr>						
                                            <tr>
                                                <td> <b>ที่อยู่ :</b> &nbsp;</td>
                                                <td width="200" colspan="2">
<?= $model->address ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <b>เบอร์โทรศัพท์:</b> &nbsp;</td>
                                                <td width="200" colspan="2">
<?= $model->tel ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b> อีเมล์: </b>&nbsp;</td>
                                                <td width="200" colspan="2">
<?= $model->email ?>
                                                </td>
                                            </tr>		
                                            <tr>
                                                <td> <b>วันที่เริ่มทำงาน:</b> &nbsp;</td>
                                                <td width="200" colspan="2">
<?= $model->startdate ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <b>ระยะเวลาทำงาน: </b>&nbsp;</td>
                                                <td width="200" colspan="2">
                                                    <?php
                                                    //   $count = count($modelhistory);
                                                    //  $datayear = $modelhistory[$count - 1];
                                                    $year = explode('-', $model->startdate);
                                                    ?>

                                                    &nbsp;<?= calyear($model->startdate); ?> 
                                                </td>
                                            </tr>				

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div style="clear:both;"></div>		  
                </div> 

                <div id="box_tabs"style="margin-top:5px;">
                    <?php
                 
                    $this->widget(
                            'booster.widgets.TbTabs', array(
                        'type' => 'tabs', // 'tabs' or 'pills'
                        'tabs' => array(
                            array(
                                'label' => 'สถานะหลักสูตรที่สมัคร',
                                'content' => $this->renderPartial('course_status', array('modelcourseregis' => $modelcourseregis), true),
                                'active' => TRUE
                            ),
                            array(
                                'label' => 'ประวัติการเข้ารับการอบรม',
                                'content' => $this->renderPartial('profiles', array('modelhistory' => $modelhistory), true),
                                'active' => false
                            ),
                            array(
                                'label' => 'วันที่ต้องอบรม',
                                'content' => $this->renderPartial('course_day', array('modelcourseregis' => $modelcourseregis), true),
                                'active' => false
                            )
                        ),
                            )
                    );
                    ?>             
                </div>	  
            </div>
        </div><!-- end .row -->
        <p class="pull-right"><a href="#">Back to top</a></p>
    </div>
</div>

<?php

function calyear($year) {
    //$birthday = "1982-06-10";      //รูปแบบการเก็บค่าข้อมูลวันเกิด
    $today = date("Y-m-d");   //จุดต้องเปลี่ยน


    list($byear, $bmonth, $bday) = explode("-", $year);       //จุดต้องเปลี่ยน
    list($tyear, $tmonth, $tday) = explode("-", $today);                //จุดต้องเปลี่ยน

    $mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear);
    $mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear);
    $mage = ($mnow - $mbirthday);

    $u_y = date("Y", $mage) - 1970;
    $u_m = date("m", $mage) - 1;
    $u_d = date("d", $mage) - 1;

    return $u_y . '&nbsp;ปี&nbsp;' . $u_m . '&nbsp; เดือน&nbsp;' . $u_d . '&nbsp;วัน';
}
?>