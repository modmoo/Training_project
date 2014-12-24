<div class="row">
    <div class="col-xs-12">
        <div id="main_boxslide">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <!--- div profiles--->
                            <div id='mainbox_profile'>
                                    <div style="margin-left:5px;margin-right:5px;margin-top: 7px;">
                                        <div class="row clearfix">
                                            <div class="col-xs-12">
                 <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            <div class="course-sub">
                                <h4 style="padding:5px 15px 3px 20px; background:#428bca; border-radius:5px; margin-button:5px; margin-top:5px; color:#ffffff;"><span class="glyphicon glyphicon-play">&nbsp;</span>รายการหลักสูตรการอบรม</h4>	
                            </div>
                        </div>

                        <!-- List group -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="background:#5F9CCA; color:#fff; width:50px;">ลำดับที่</th>
                                    <th style="background:#5F9CCA; color:#fff; width:150px;">รหัสหลักสูตร</th>
                                    <th style="background:#5F9CCA; color:#fff; width:250px;">ชื่อหลักสูตร</th>
                                    <th style="background:#5F9CCA; color:#fff; width:100px;">วันเปิดรับสมัคร</th>
                                    <th style="background:#5F9CCA; color:#fff; width:100px;">วันปิดรับสมัคร</th>
                                    <th style="background:#5F9CCA; color:#fff; width:100px;">สมัคร/คงเหลือ</th>
                                    <th style="background:#5F9CCA; color:#fff; width:100px;">สถานะ</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //var_dump($modelhistory);
                                $num = 0;
                                foreach ($modelhistory as $key2 => $value2) {
                                    $num++;
                                    $counchk = Course::model()->checkclose($value2['cu_id']);
                                    $numregis = CourseRegister::model()->checkmax($value2['cu_id']);
                                    $isfull = $numregis>=$counchk[0]->num_max; // true ถ้าไม่เต็ม
									$isexpirecourse=  Course::isexpirecourse($value2['cu_id']);
									//echo 'numregis'.$numregis.'counchk'.$counchk[0]->num_max;
									// var_dump($counchk[0]);
									if($isexpirecourse){// ยังเปิด
									 if (!$isfull) {// ไม่เต็ม
									    $pcen =$counchk[0]->num_max-($counchk[0]->num_max - $numregis)."/".$counchk[0]->num_max  ;
                                        $path = Yii::app()->createUrl('course_detail&id=') . $value2['cu_id'];
                                        $alink = "<a href=\"$path\">" . $value2['cu_id'] . "</a>";
                                        $alinlname = "<a href=\"$path\">" . cutword::substr_utf8($value2['name'], 0, 30) . "</a>";
                                        $iscloses = "<font color=\"WHITE\"><a href=\"$path\" class=\"btn btn-success btn-sm active\" role=\"button\">ยังเปิดรับสมัคร</a></font>";
									 }else{ // เต็ม
									 	$iscloses = "<font color=\"red\">ผู้สมัครเต็มแล้ว</font>";
                                        $pcen =$counchk[0]->num_max-($counchk[0]->num_max - $numregis)."/".$counchk[0]->num_max  ;
                                        $alink = "<span style='color:red;'>" . $value2['cu_id'] . "</span>";
                                        $alinlname = "<span style='color:red;'>" . cutword::substr_utf8($value2['name'], 0, 30) . "</span>";
									 } 
									}else{// ปิดไปแล้ว
									   $iscloses = "<font color=\"red\">ปิดรับสมัคร</font>";
                                        $pcen =$counchk[0]->num_max-($counchk[0]->num_max - $numregis)."/".$counchk[0]->num_max  ;
                                        $alink = "<span style='color:red;'>" . $value2['cu_id'] . "</span>";
                                        $alinlname = "<span style='color:red;'>" . cutword::substr_utf8($value2['name'], 0, 30) . "</span>";
									}
                                    if ($isfull) {

								   } else {
                                     
                                    }
                                    ?>
                                    <tr class="odd">
                                        <td style="width: 10px"><?= $num ?></td>
                                        <td style="width: 10px"><?= $alink ?></td>
                                        <td style="width: 40px"><?= $alinlname ?></td>
                                        <td style="width: 10px"><?= $value2['dayopencoure'] ?></td>
                                        <td style="width: 10px"><?= $value2['dayclose'] ?></td>
                                        <td style="text-align: center;width: 10px"><?= $pcen ?></td>
                                        <td style="width: 10px"><?= $iscloses ?></td>

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
                                <div style="clear:both;"></div>		  
                            </div> 
                        </div>
                    </div><!-- /.row -->
                </div>
            </div>
        </div> 
    </div>
</div>  
    </div>