<div class="row">
    <div class="col-xs-12">
        <div id='mainbox_profile'>
            <div id='proimg'>
                <img src="<?= Yii::app()->baseUrl; ?>/images/uploads/course/<?= $model->image; ?>">
            </div>
            <div id='profile'>
                <div class="h_profiles"><h3>เช็คชื่อ</h3><br>รายชื่อผู้เข้าอบรม</br></div>
                <div style="margin-left:5px;">
                    <div class="row clearfix">
                        <div class="col-xs-12 column">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td width="300">
                                            Course ID: &nbsp;<?= $model->cu_id ?>
                                        </td>
                                        <td>
                                            Course Name :&nbsp;<?= $model->name ?>	
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            อบรม : วันที่ :&nbsp;<?= $model->dayopencoure ?>
                                        </td>
                                        <td>
                                            จำนวนผู้เข้าอบรม :&nbsp;<?= CourseRegister::model()->checkmax($_GET['id']); ?>&nbsp;คน
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
            <div class="panel panel-default" style="padding:2px;">
                <div class="panel-heading">รายชื่อผู้เข้าอบรม</div>
                <div class="panel-body">
                    <div class="row">
                        <?php
                        $i = 0;
                        $oldid = "";
                        $num = 0;
                        foreach ($modelcourse as $key => $value) {
                            $i++;
                            $num++;
                            // echo $value->employee->depart->name;  
                            if ($oldid != $value->employee->depart->name) {
                                ?>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <h6>แผนก : <?= $value->employee->depart->name ?></h6>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="list-group">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr height="50" style="background:#428BCA;color:#fff; padding-top:2px;padding-bottom:2px; height:50px;">
                                                        <td align="center">Image Employee</td>
                                                        <td align="center" >Employee ID</td>
                                                        <td align="center" >First Name</td>
                                                        <td align="center" >Last Name</td>
                                                        <td align="center" > เข้าอบรม</td>
                                                        <td align="center" >ไม่เข้าอบรม</td>
                                                        <td align="center" > คะแนนวัติผลความรู้</td>
                                                    </tr>
                                                </thead>                          
                                                <?php
                                            }
                                            ?>
                                            <tbody >
                                                <tr style="height:100px">
                                                    <td width="10%"><img src="<?= Yii::app()->baseUrl; ?>/images/uploads/employee/<?= $value->employee->image ?>" style="width:100px;height:100px"></td>

                                                    <td width="100%" colspan="7">
                                                        <table height="100%" width="100%">
                                                            <tr style="height:100px" width="100%">
                                                                <td width="130" align="center"><?= $value->employee->idemployee ?></td>
                                                                <td width="120" align="center" > <?= $value->employee->firstname ?></td>
                                                                <td width="120" align="center" > <?= $value->employee->lastname ?></td>
                                                                <td width="100" align="center" ><input type="radio" name="radiobutton[<?= $num ?>]" value="1-<?= $value->employee->id ?>"></td>
                                                                <td width="120" align="center" ><input type="radio" name="radiobutton[<?= $num ?>]" value="0-<?= $value->employee->id ?>"></td>
                                                                <td width="100" align="center" ><input type="text" name="score[<?= $num ?>][<?= $value->employee->id ?>]" size="4">&nbsp;คะแนน</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <?php
                                                if ($oldid != $value->employee->depart->name) {
                                                    if ($num == 1 && $num == count($modelcourse)) {
                                                        ?>
                                                        <tr>
                                                            <td width="100"> รวม :&nbsp;<?= $i ?>&nbsp;คน</td>
                                                        </tr>
                                                </table>            
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }  
                                $oldid = $value->employee->depart->name;
                                $i = 0;
                            } else {
                                if ($num > 1 && $num == count($modelcourse)) {
                                    ?> 
                                    <tr>
                                        <td width="100"> รวม :&nbsp; <?= $i ?>&nbsp;คน</td>
                                    </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    $oldid = $value->employee->depart->name;
                    $i = 0;
                }
            } 
            ?>
            <!--
                        <div class="col-xs-1">
                            <h6>แผนก : บัญชี</h6>
                        </div>
                        <div class="col-xs-11">
                            <div class="list-group">
                                <table class="table table-striped">

                                    <thead>
                                        <tr height="50" style="background:#428BCA;color:#fff; padding-top:2px;padding-bottom:2px; height:50px;">
                                            <td align="center">Image Employee</td>
                                            <td align="center" >Employee ID</td>
                                            <td align="center" >First Name</td>
                                            <td align="center" >Last Name</td>
                                            <td align="center" > เข้าอบรม</td>
                                            <td align="center" >ไม่เข้าอบรม</td>
                                            <td align="center" > คะแนนวัติผลความรู้</td>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <tr style="height:100px">
                                            <td width="10%"><img src="front/images/111.jpg" style="width:100px;height:100px"></td>

                                            <td width="100%" colspan="7">
                                                <table height="100%" width="100%">
                                                    <tr style="height:100px" width="100%">
                                                        <td width="130" align="center"> 5233470134</td>
                                                        <td width="120" align="center" > ไอริณ</td>
                                                        <td width="120" align="center" > เทพหัสดิน ...</td>
                                                        <td width="100" align="center" ><input type="radio" name="approval1" value="0"></td>
                                                        <td width="120" align="center" ><input type="radio" name="approval1" value="1"></td>
                                                        <td width="100" align="center" ><input type="text" size="4">&nbsp;คะแนน</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr style="height:100px">
                                            <td width="10%"><img src="front/images/111.jpg" style="width:100px;height:100px"></td>

                                            <td width="100%" colspan="7">
                                                <table height="100%" width="100%">
                                                    <tr style="height:100px" width="100%">
                                                        <td width="130" align="center"> 5233470134</td>
                                                        <td width="120" align="center" > ไอริณ</td>
                                                        <td width="120" align="center" > เทพหัสดิน ...</td>
                                                        <td width="100" align="center" ><input type="radio" name="approval1" value="0"></td>
                                                        <td width="120" align="center" ><input type="radio" name="approval1" value="1"></td>
                                                        <td width="100" align="center" ><input type="text" size="4">&nbsp;คะแนน</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr style="height:100px">
                                            <td width="10%"><img src="front/images/111.jpg" style="width:100px;height:100px"></td>

                                            <td width="100%" colspan="7">
                                                <table height="100%" width="100%">
                                                    <tr style="height:100px" width="100%">
                                                        <td width="130" align="center"> 5233470134</td>
                                                        <td width="120" align="center" > ไอริณ</td>
                                                        <td width="120" align="center" > เทพหัสดิน ...</td>
                                                        <td width="100" align="center" ><input type="radio" name="approval1" value="0"></td>
                                                        <td width="120" align="center" ><input type="radio" name="approval1" value="1"></td>
                                                        <td width="100" align="center" ><input type="text" size="4">&nbsp;คะแนน</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100"> รวม :&nbsp; 3 &nbsp;คน</td>


                                        </tr>
                                </table>
 

                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-xs-1">
                        <h6>แผนก : การตลาด</h6>
                    </div>
                    <div class="col-xs-11">
                        <div class="list-group">
                            <table class="table table-striped">

                                <thead>
                                    <tr height="50" style="background:#428BCA;color:#fff; padding-top:2px;padding-bottom:2px; height:50px;">
                                        <td align="center">Image Employee</td>
                                        <td align="center" >Employee ID</td>
                                        <td align="center" >First Name</td>
                                        <td align="center" >Last Name</td>
                                        <td align="center" > เข้าอบรม</td>
                                        <td align="center" >ไม่เข้าอบรม</td>
                                        <td align="center" > คะแนนวัติผลความรู้</td>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr style="height:100px">
                                        <td width="10%"><img src="front/images/111.jpg" style="width:100px;height:100px"></td>

                                        <td width="100%" colspan="7">
                                            <table height="100%" width="100%">
                                                <tr style="height:100px" width="100%">
                                                    <td width="130" align="center"> 5233470134</td>
                                                    <td width="120" align="center" > ไอริณ</td>
                                                    <td width="120" align="center" > เทพหัสดิน ...</td>
                                                    <td width="100" align="center" ><input type="radio" name="approval1" value="0"></td>
                                                    <td width="120" align="center" ><input type="radio" name="approval1" value="1"></td>
                                                    <td width="100" align="center" ><input type="text" size="4">&nbsp;คะแนน</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr style="height:100px">
                                        <td width="10%"><img src="front/images/111.jpg" style="width:100px;height:100px"></td>

                                        <td width="100%" colspan="7">
                                            <table height="100%" width="100%">
                                                <tr style="height:100px" width="100%">
                                                    <td width="130" align="center"> 5233470134</td>
                                                    <td width="120" align="center" > ไอริณ</td>
                                                    <td width="120" align="center" > เทพหัสดิน ...</td>
                                                    <td width="100" align="center" ><input type="radio" name="approval1" value="0"></td>
                                                    <td width="120" align="center" ><input type="radio" name="approval1" value="1"></td>
                                                    <td width="100" align="center" ><input type="text" size="4">&nbsp;คะแนน</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr style="height:100px">
                                        <td width="10%"><img src="front/images/111.jpg" style="width:100px;height:100px"></td>

                                        <td width="100%" colspan="7">
                                            <table height="100%" width="100%">
                                                <tr style="height:100px" width="100%">
                                                    <td width="130" align="center"> 5233470134</td>
                                                    <td width="120" align="center" > ไอริณ</td>
                                                    <td width="120" align="center" > เทพหัสดิน ...</td>
                                                    <td width="100" align="center" ><input type="radio" name="approval1" value="0"></td>
                                                    <td width="120" align="center" ><input type="radio" name="approval1" value="1"></td>
                                                    <td width="100" align="center" ><input type="text" size="4">&nbsp;คะแนน</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100"> รวม :&nbsp; 3 &nbsp;คน</td>


                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>

            -->

        </div>
        <!---------------//---------------->
        <table>
            <tr>
                <td> Upload Image </td>
                <td><input id="input-23" type="file" multiple="true"></td>
            </tr>
        </table>	
    </div>