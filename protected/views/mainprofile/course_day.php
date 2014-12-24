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
                                    <th style="width: auto;">วันที่อบรม</th>
                                    <th style="width: auto;">เวลาที่อบรม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $csscolor = "";$myi=0;
                                //var_dump($modelcourse);//exit();
                                foreach ($modelcourseregis as $key => $value) {
                                    $i++;  $myarrra=array();

								  // $dayall=Daycoursetraining::getdayallcourse($value->course->cu_id);
								   $dayalltime=Daycoursetraining::getdayallcoursemy($value->course->cu_id);
                                    //var_dump($value->approval);exit();
                                    //$data = CourseRegister::gettimeregis($value->id);
                                    //if ($value->approval== 2) {
//                                        $csscolor = "danger";
//                                    } else if ($value->approval== 1) {
//                                        $csscolor = "success";
//                                    } else if ($value->approval== 0) {
//                                        $csscolor = "info";
//                                    } else {
//                                        $csscolor = "";
//                                    }
                               foreach ($dayalltime as $key2 => $value2) {
								  // array_push($myarrra,$value2->timestart.'-'.$value2->timestart);
								  $myi++;
                                    ?>
                                    <tr class="<?= $csscolor ?>">
                                        <td style="width: auto;"><?=$myi ?></td>
                                        <td style="width: auto;"><?= $value->course->cu_id ?></td>
                                        <td style="width: auto;"><?= cutword::substr_utf8($value->course->name, 0, 30); ?></td>
                                        <td style="width: auto;"><?= $value2->day ?></td>
                                        <td style="width: auto;"><?=$value2->timestart.' - '.$value2->timeend?></td>                                                                  
                                    </tr>
                                    <?php
							      }
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