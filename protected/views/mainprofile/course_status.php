<?php
if(count($modelcourseregis)>0){
?>
<div id="my_box_trainning_history">
    <div class="panel panel-default" style="padding:2px;">
        <div class="panel-heading">สถานะหลักสูตรที่สมัคร</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="list-group">
                        <table class="table table-striped">
                            <thead>
                                <tr style="background:#5F9CCA; color:#ffffff">
                                    <th style="width: auto;">ลำดับ</th>
                                    <th style="width: auto;">รหัสหลักสูตร</th>
                                    <th style="width: auto;">ชื่อหลักสูตร</th>
                                    <th style="width: auto;">สถานะหลักสูตร</th>
                                    <th style="width: auto;">วันที่สมัคร</th>
                                    <th style="width: auto;">แบบบประเมิน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $csscolor = "";
                                //var_dump($modelcourseregis);exit();
                                foreach ($modelcourseregis as $key => $value) {
                                    $i++;
                                    //var_dump($value->approval);exit();
                                    //$data = CourseRegister::gettimeregis($value->id);
                                    if ($value->approval== 2) {
                                        $csscolor = "danger";
                                    } else if ($value->approval== 1) {
                                        $csscolor = "success";
                                    } else if ($value->approval== 0) {
                                        $csscolor = "info";
                                    } else {
                                        $csscolor = "";
                                    }
                                    ?>
                                    <tr class="<?= $csscolor ?>">
                                        <td style="width: auto;"><?= $i ?></td>
                                        <td style="width: auto;"><a href="<?= Yii::app()->createUrl('course_detail') ?>&id=<?=$value->course->cu_id ?>"><?= $value->course->cu_id ?></a></td>
                                        <td style="width: auto;"><a href="<?= Yii::app()->createUrl('course_detail') ?>&id=<?=$value->course->cu_id ?>"><?= cutword::substr_utf8($value->course->name, 0, 30) ?></a></td>
                                        <td style="width: auto;"><?= CourseRegister::getstatus2($value->approval); ?></td>
                                        <td style="width: auto;"><?=$value->time;?></td>
                                        <?php
                                        if(CourseRegister::getstatus2($value->approval)=='กรุณาทำแบบประเมิน'){
                                           ?>
                                        <td style="width: auto;"><a  class="btn btn-info btn-mini" href="<?=Yii::app()->createUrl('question/index',array('id'=>$value->course->cu_id))?>"><i class="glyphicon glyphicon-pencil"></i> กรุณาทำแบบประเมิน</a></td>
                                        <?php
                                        }else{
                                          ?>
                                        <td style="width: auto;"><span style="color: red;">ไม่พบแบบประเมิน</span></td>  
                                        <?php
                                        }
                                        ?>                           
                                    </tr>
                                    <?php
                                }
                                //  var_dump($value->courseRegisters);
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 			
</div> 	
<?php }
?>