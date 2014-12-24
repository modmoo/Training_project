<?php
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/js/jquery.bootstrap.wizard.min.js');
?>
<style type="text/css">
    .skin-blue .navbar {
        background-color: #3c8dbc;
    }
    .skin-blue .navbar .nav a {
        color: rgba(255, 255, 255, 0.8);
    }
    .nav.nav-pills > li > a {
        border-top: 3px solid transparent;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
        color: #444;
    }
    /* NAV PILLS */
    .nav.nav-pills > li > a {
        border-top: 3px solid transparent;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
        color: #444;
    }
    .nav.nav-pills > li > a > .fa,
    .nav.nav-pills > li > a > .glyphicon,
    .nav.nav-pills > li > a > .ion {
        margin-right: 5px;
    }
    .nav.nav-pills > li.active > a,
    .nav.nav-pills > li.active > a:hover {
        background-color: #f6f6f6;
        border-top-color: #3c8dbc;
        color: #444;
    }
    .nav.nav-pills > li.active > a {
        font-weight: 600;
    }
    .nav.nav-pills > li > a:hover {
        background-color: #f6f6f6;
    }
    .nav.nav-pills.nav-stacked > li > a {
        border-top: 0;
        border-left: 3px solid transparent;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
        color: #444;
    }
    .nav.nav-pills.nav-stacked > li.active > a,
    .nav.nav-pills.nav-stacked > li.active > a:hover {
        background-color: #f6f6f6;
        border-left-color: #3c8dbc;
        color: #444;
    }
    .nav.nav-pills.nav-stacked > li.header {
        border-bottom: 1px solid #ddd;
        color: #777;
        margin-bottom: 10px;
        padding: 5px 10px;
        text-transform: uppercase;
    }    
</style>
<div class="row skin-blue">
    <div class="col-xs-12">
        <div id="main_boxslide">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <!--- div profiles--->
                            <div id='mainbox_profile'>
                                <div style="border-left:none;">
                                    <div style="margin-left:5px;margin-right:5px;">
                                        <div class="row clearfix">
                                            <div class="col-xs-12 column">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <?php
                                                        $listans1 = array(
                                                            'มีความรู้และเชี่ยวชาญในวิชาที่สอนอย่างแท้จริง',
                                                            'มีประสบการณ์ในวิชาที่สอน อธิบายเพิ่มเติมได้ ',
                                                            'สอดแทรกแนวคิดในการประยุกต์ใช้ปฏิบัติได้ ',
                                                            'ตอบคำถามผู้เข้ารับการฝึกอบรมได้ชัดเจน ตรงประเด็น'
                                                        );
                                                        $listans2 = array(
                                                            'มีทักษะในการจูงใจผู้เข้าอบรม เข้าสู่บทเรียน',
                                                            'มีวิธีการถ่ายทอดเนื้อหาให้เป็นที่น่าสนใจ',
                                                            'จัดลำดับความสัมพันธ์ของเนื้อหา เช่น จากง่ายไปยาก',
                                                            'เปิดโอกาสให้ผู้เข้ารับการฝึกอบรมได้ถาม หรือแสดงความคิดเห็น หรืออภิปรายแลกเปลี่ยนความคิดเห็น',
                                                            'สอนเนื้อหาตรงตามหลักสูตร มีการสรุปสาระสำคัญในแต่ละหัวข้อ',
                                                            'ใช้ระยะเวลาเหมาะสมกับเนื้อหาและรักษาเวลาได้ดี ',
                                                            'ใช้โสตทัศนูปกรณ์ได้ดี'
                                                        );
                                                        $listans3 = array(
                                                            'การแต่งกาย และบุคลิกภาพโดยรวม',
                                                            'ความรู้ ความสามารถ และประสบการณ์ของวิทยากร ',
                                                            'ความสามารถในการถ่ายทอดความรู้',
                                                            'การจัดลำดับเนื้อหาวิชาเชื่อมโยงกันเหมาะสม และเป็นปัจจุบัน',
                                                            'เทคนิคการนำเสนอ และสื่อการสอนน่าสนใจ',
                                                            'เอกสารประกอบคำบรรยาย',
                                                            'การใช้โสตทัศนูปกรณ์อย่างเหมาะสม',
                                                            'การสร้างบรรยากาศในการเรียนการสอน ',
                                                            'การตอบคำถามชัดเจนตรงประเด็น',
                                                            'การรักษาเวลา'
                                                        );
                                                        $listans4 = array(
                                                            'ความรอบรู้ ในเนื้อหาของวิทยากร',
                                                            'ความสามารถในการถ่ายทอดความรู้',
                                                            'การตอบคำถาม',
                                                            'ความเหมาะสมของวิทยากร ในภาพรวม'
                                                        );
                                                        $listans5 = array(
                                                            'เอกสาร',
                                                            'โสตทัศนูปกรณ์',
                                                            'เจ้าหน้าที่สนับสนุน',
                                                            'อาหารเครื่องดื่มและสถานที่'
                                                        );
                                                        $listans6 = array(
                                                            'ท่านได้รับความรู้ แนวคิด ทักษะและประสบการณ์ใหม่ ๆ จากการฝึกอบรม/สัมมนา',
                                                            'ท่านสามารถนำสิ่งที่ได้รับจากโครงการ/กิจกรรมนี้ไปใช้ในการเรียน/การปฏิบัติงาน',
                                                            'สิ่งที่ท่านได้รับจากโครงการ/กิจกรรมครั้งนี้ตรงตามความคาดหวังของท่านหรือไม่',
                                                            'สัดส่วนระหว่างการฝึกอบรมภาคทฤษฎีกับภาคปฏิบัติ (ถ้ามี) มีความเหมาะสม',
                                                            'โครงการ/กิจกรรมในหลักสูตรเอื้ออำนวยต่อการเรียนรู้และพัฒนาความสามารถของท่านหรือไม่',
                                                            'ประโยชน์ที่ท่านได้รับจากโครงการ/กิจกรรม'
                                                        );
                                                        ?>
                                                        <style type="text/css">
                                                            .nav.nav-pills > li.active > a{
                                                                font-weight:inherit !important;
                                                            }   
                                                        </style>
                                                        <div class="row">
                                                            <div class="col-xs-10">
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <div style="border-bottom: 1px solid #A0A0A0;width:110px;">วันที่&nbsp;<?= date('Y-m-d'); ?></div>
                                                            </div>   
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-2">
                                                            </div> 
                                                            <div class="col-xs-8">
                                                                <h3 style="border-bottom: 1px solid #A0A0A0;width:410px;">แบบประเมินความพึงพอใจในการเข้าอบรม</h3>
                                                            </div>
                                                            <div class="col-xs-2">
                                                            </div>   
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-xs-2"></div> 
                                                                    <div class="col-xs-8">
                                                                        <table>
                                                                            <?php
                                                                            $idco = "";
                                                                            $numco = "";
                                                                            if ($course != NULL) {
                                                                                $idco = $course->cu_id;
                                                                                $numco = $course->name;
                                                                            }
                                                                            $emname = "";
                                                                            $empdtp = "";
                                                                            if ($employee != NULL) {
                                                                                $emname = $employee->firstname . '&nbsp;' . $employee->lastname;
                                                                                $empdtp = $employee->depart->name;
                                                                            }
                                                                            ?>
                                                                            <tr>
                                                                                <td>ID:</td><td><?= $idco ?></td>   
                                                                                <td>ชื่อคอร์ส:</td><td><?= $numco ?></td>   
                                                                            </tr>  
                                                                            <tr>
                                                                                <td>ชื่อผู้ประเมิน:</td><td><?= $emname ?></td>   
                                                                                <td>แผนก:</td><td><?= $empdtp ?></td>   
                                                                            </tr> 
                                                                        </table>
                                                                    </div>  
                                                                    <div class="col-xs-2"></div> 
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <section id="wizard">
                                                                    <div class="page-header" style="padding-bottom:0;margin:10px 0 20px 0;">
                                                                        <h3>แบบประเมิน</h3>
                                                                    </div>
                                                                    <div id="rootwizard">
                                                                        <div class="navbar">
                                                                            <div class="navbar-inner">
                                                                                <div class="row">
                                                                                    <div class="col-xs-12">
                                                                                        <ul>
                                                                                            <li><a href="#tab1" data-toggle="tab">ความรู้เนื้อหาที่อบรม</a></li>
                                                                                            <li><a href="#tab2" data-toggle="tab">วิธีและเทคนิคการสอน</a></li>
                                                                                            <li><a href="#tab3" data-toggle="tab">บุคลิกภาพของวิทยากร</a></li>
                                                                                            <li><a href="#tab4" data-toggle="tab">เจ้าหน้าที่ผู้ให้บริการ/วิทยากร/ผู้ประสานงาน</a></li>
                                                                                            <li><a href="#tab5" data-toggle="tab">การอำนวยความสะดวก</a></li>
                                                                                            <li><a href="#tab6" data-toggle="tab">ความรู้ที่ได้หลังการอบรม</a></li>
                                                                                        </ul>     
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>   
                                                                        <div  class="progress">
                                                                            <div id="bars" class="progress-bar progress-bar-info" role="progressbar"aria-valuemin="0" aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                        <form id="frm_questions" name="frm_questions" method="POST">
                                                                            <input type="hidden" name="frm_questions">  
                                                                            <div class="tab-content">
                                                                                <div class="tab-pane" id="tab1">
                                                                                    <table class="table table-bordered table-hover">
                                                                                        <thead>
                                                                                            <tr >
                                                                                                <th style="text-align: center;font-size: medium;" colspan="7">ประเมินวิทยากร</th>
                                                                                            </tr>
                                                                                        </thead>   
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>ลำดับที่</th>
                                                                                                <th>รายการ</th>
                                                                                                <th>ดีมาก</th>
                                                                                                <th>ดี</th>
                                                                                                <th>พอใช้</th>
                                                                                                <th>น้อย</th>
                                                                                                <th>น้อยที่สุด</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php
                                                                                            $i1 = 0;
                                                                                            foreach ($listans1 as $key1 => $value1) {
                                                                                                $i1++;
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td><?= $i1; ?></td>
                                                                                                    <td width="500">
    <?= $value1 ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans1[<?= $i1 ?>]" value="5-1-1">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans1[<?= $i1 ?>]" value="4-1-1">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" checked name="ans1[<?= $i1 ?>]" value="3-1-1">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans1[<?= $i1 ?>]" value="2-1-1">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans1[<?= $i1 ?>]" value="1-1-1">
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <?php
                                                                                            }
                                                                                            ?>
                                                                                        </tbody>
                                                                                    </table> 
                                                                                </div>
                                                                                <div class="tab-pane" id="tab2">
                                                                                    <table class="table table-bordered table-hover">
                                                                                        <thead>
                                                                                            <tr >
                                                                                                <th style="text-align: center;font-size: medium;" colspan="7">ประเมินวิทยากร</th>
                                                                                            </tr>
                                                                                        </thead>   
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>ลำดับที่</th>
                                                                                                <th>รายการ</th>
                                                                                                <th>ดีมาก</th>
                                                                                                <th>ดี</th>
                                                                                                <th>พอใช้</th>
                                                                                                <th>น้อย</th>
                                                                                                <th>น้อยที่สุด</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php
                                                                                            $i2 = 0;
                                                                                            foreach ($listans2 as $key2 => $value2) {
                                                                                                $i2++;
                                                                                                ?>     
                                                                                                <tr>
                                                                                                    <td><?= $i2 ?></td>
                                                                                                    <td width="500">
    <?= $value2 ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans2[<?= $i2 ?>]" value="5-1-2">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans2[<?= $i2 ?>]" value="4-1-2">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" checked name="ans2[<?= $i2 ?>]" value="3-1-2">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans2[<?= $i2 ?>]" value="2-1-2">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans2[<?= $i2 ?>]" value="1-1-2">
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <?php
                                                                                            }
                                                                                            ?> 
                                                                                        </tbody>
                                                                                    </table> 
                                                                                </div>
                                                                                <div class="tab-pane" id="tab3">
                                                                                    <table class="table table-bordered table-hover">
                                                                                        <thead>
                                                                                            <tr >
                                                                                                <th style="text-align: center;font-size: medium;" colspan="7">ประเมินวิทยากร</th>
                                                                                            </tr>
                                                                                        </thead>   
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>ลำดับที่</th>
                                                                                                <th>รายการ</th>
                                                                                                <th>ดีมาก</th>
                                                                                                <th>ดี</th>
                                                                                                <th>พอใช้</th>
                                                                                                <th>น้อย</th>
                                                                                                <th>น้อยที่สุด</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php
                                                                                            $i3 = 0;
                                                                                            foreach ($listans3 as $key3 => $value3) {
                                                                                                $i3++;
                                                                                                ?> 
                                                                                                <tr>
                                                                                                    <td><?= $i3; ?></td>
                                                                                                    <td width="500">
    <?= $value3 ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans3[<?= $i3 ?>]" value="5-1-3">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans3[<?= $i3 ?>]" value="4-1-3">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" checked name="ans3[<?= $i3 ?>]" value="3-1-3">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans3[<?= $i3 ?>]" value="2-1-3">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans3[<?= $i3 ?>]" value="1-1-3">
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <?php
                                                                                            }
                                                                                            ?> 
                                                                                        </tbody>
                                                                                    </table> 
                                                                                </div>
                                                                                <div class="tab-pane" id="tab4">
                                                                                    <table class="table table-bordered table-hover">
                                                                                        <thead>
                                                                                            <tr >
                                                                                                <th style="text-align: center;font-size: medium;" colspan="7">ประเมินความรู้ที่ได้จากการอบรม</th>
                                                                                            </tr>
                                                                                        </thead>   
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>ลำดับที่</th>
                                                                                                <th>รายการ</th>
                                                                                                <th>ดีมาก</th>
                                                                                                <th>ดี</th>
                                                                                                <th>พอใช้</th>
                                                                                                <th>น้อย</th>
                                                                                                <th>น้อยที่สุด</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php
                                                                                            $i4 = 0;
                                                                                            foreach ($listans4 as $key3 => $value4) {
                                                                                                $i4++;
                                                                                                ?> 
                                                                                                <tr>
                                                                                                    <td><?= $i4; ?></td>
                                                                                                    <td width="500">
    <?= $value4 ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans4[<?= $i4 ?>]" value="5-2-1">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans4[<?= $i4 ?>]" value="4-2-1">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" checked name="ans4[<?= $i4 ?>]" value="3-2-1">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans4[<?= $i4 ?>]" value="2-2-1">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans4[<?= $i4 ?>]" value="1-2-1">
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <?php
                                                                                            }
                                                                                            ?> 
                                                                                        </tbody>
                                                                                    </table> 
                                                                                </div>
                                                                                <div class="tab-pane" id="tab5">
                                                                                    <table class="table table-bordered table-hover">
                                                                                        <thead>
                                                                                            <tr >
                                                                                                <th style="text-align: center;font-size: medium;" colspan="7">ประเมินความรู้ที่ได้จากการอบรม</th>
                                                                                            </tr>
                                                                                        </thead>   
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>ลำดับที่</th>
                                                                                                <th>รายการ</th>
                                                                                                <th>ดีมาก</th>
                                                                                                <th>ดี</th>
                                                                                                <th>พอใช้</th>
                                                                                                <th>น้อย</th>
                                                                                                <th>น้อยที่สุด</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php
                                                                                            $i5 = 0;
                                                                                            foreach ($listans5 as $key5 => $value5) {
                                                                                                $i5++;
                                                                                                ?> 
                                                                                                <tr>
                                                                                                    <td><?= $i5; ?></td>
                                                                                                    <td width="500">
    <?= $value5 ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans5[<?= $i5 ?>]" value="5-2-2">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans5[<?= $i5 ?>]" value="4-2-2">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" checked name="ans5[<?= $i5 ?>]" value="3-2-2">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans5[<?= $i5 ?>]" value="2-2-2">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans5[<?= $i5 ?>]" value="1-2-2">
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <?php
                                                                                            }
                                                                                            ?> 
                                                                                        </tbody>
                                                                                    </table> 
                                                                                </div>
                                                                                <div class="tab-pane" id="tab6">
                                                                                    <table class="table table-bordered table-hover">
                                                                                        <thead>
                                                                                            <tr >
                                                                                                <th style="text-align: center;font-size: medium;" colspan="7">ประเมินความรู้ที่ได้จากการอบรม</th>
                                                                                            </tr>
                                                                                        </thead>   
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>ลำดับที่</th>
                                                                                                <th>รายการ</th>
                                                                                                <th>ดีมาก</th>
                                                                                                <th>ดี</th>
                                                                                                <th>พอใช้</th>
                                                                                                <th>น้อย</th>
                                                                                                <th>น้อยที่สุด</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php
                                                                                            $i6 = 0;
                                                                                            foreach ($listans6 as $key3 => $value6) {
                                                                                                $i6++;
                                                                                                ?> 
                                                                                                <tr>
                                                                                                    <td><?= $i6; ?></td>
                                                                                                    <td width="500">
    <?= $value6 ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans6[<?= $i6 ?>]" value="5-2-3">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans6[<?= $i6 ?>]" value="4-2-3">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" checked name="ans6[<?= $i6 ?>]" value="3-2-3">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans6[<?= $i6 ?>]" value="2-2-3">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="radio" name="ans6[<?= $i6 ?>]" value="1-2-3">
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <?php
                                                                                            }
                                                                                            ?> 
                                                                                        </tbody>
                                                                                    </table> 
                                                                                </div>
                                                                                <ul class="pager wizard">
                                                                                    <li class="previous first"><a href="javascript:;">ส่วนแรก</a></li>
                                                                                    <li class="previous"><a href="javascript:;">ส่วนก่อนหน้า</a></li>
                                                                                    
                                                                                    <li class="next"><a href="javascript:;">ส่วนต่อไป</a></li>
                                                                                    <li class="next finish" style="display:none;"><a href="javascript:;">บันทึกข้อมูล</a></li>
                                                                                </ul>
                                                                            </div>	
                                                                        </form>   
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </div>
                                                        <script type="text/javascript">
                                                            /*
                                                             $(document).ready(function() {
                                                             $('#rootwizard').bootstrapWizard({onNext: function(tab, navigation, index) {
                                                             var $total = navigation.find('li').length;
                                                             var $current = index + 1;
                                                             if (index == 2) {
                                                             // Make sure we entered the name
                                                             if (!$('#name').val()) {
                                                             alert('You must enter your name');
                                                             $('#name').focus();
                                                             return false;
                                                             } 
                                                             }
                                                             if($current >= $total) {
                                                             $('#rootwizard').find('.pager .next').hide();
                                                             $('#rootwizard').find('.pager .finish').show();
                                                             $('#rootwizard').find('.pager .finish').removeClass('disabled');
                                                             } else {
                                                             $('#rootwizard').find('.pager .next').show();
                                                             $('#rootwizard').find('.pager .finish').hide();
                                                             }
                                                             $('#tab3').html('Hello, ' + $('#name').val());
                                                             }, onTabShow: function(tab, navigation, index) {
                                                             var $total = navigation.find('li').length;
                                                             var $current = index + 1;
                                                             var $percent = ($current / $total) * 100;
                                                             $('#rootwizard').find('#bars').css({width: $percent + '%'});
                                                             }});
                                                             });
                                                             */
                                                            $(document).ready(function() {
                                                                $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                                                                        var $total = navigation.find('li').length;
                                                                        var $current = index + 1;
                                                                        var $percent = ($current / $total) * 100;
                                                                        $('#rootwizard').find('#bars').css({width: $percent + '%'});
                                                                        if ($current >= $total) {
                                                                            $('#rootwizard').find('.pager .next').hide();
                                                                            $('#rootwizard').find('.pager .finish').show();
                                                                            $('#rootwizard').find('.pager .finish').removeClass('disabled');
                                                                        } else {
                                                                            $('#rootwizard').find('.pager .next').show();
                                                                            $('#rootwizard').find('.pager .finish').hide();
                                                                        }

                                                                    }});
                                                                $('#rootwizard .finish').click(function() {
                                                                    var con = confirm('ยืนยันการบันทึกข้อมูล !');
                                                                    if (con) {
                                                                        $('#frm_questions').submit();
                                                                    }

                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <!--- seccsion --->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>		  
                            </div> 
                        </div>
                    </div><!-- /.row -->
                </div>
            </div>
        </div> 
    </div>
</div>       