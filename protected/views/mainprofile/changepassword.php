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
                        <div class="h_profiles"><h3>ประวัติการทำงาน</h3></div>
                        <div style="margin-left:5px;">
                            <div class="row clearfix">
                                <div class="col-xs-12 column">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="200">
                                                    ID: &nbsp;<?= $model->idemployee ?>
                                                </td>
                                                <td>
                                                    แผนก &nbsp; <?= $model->department ?>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    ชื่อ :&nbsp;n<?= $model->firstname ?>
                                                </td>
                                                <td>
                                                    นามสกุล&nbsp;<?= $model->lastname ?>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Tel: &nbsp;<?= $model->tel ?>
                                                </td>
                                                <td>
                                                    Email:&nbsp;Dev.<?= $model->email ?>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    วันที่เริ่มทำงาน: &nbsp;<?= $model->startdate ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    //   $count = count($modelhistory);
                                                    //  $datayear = $modelhistory[$count - 1];
                                                    $year = explode('-', $model->startdate);
                                                    ?>
                                                    ระยะเวลาทำงาน:&nbsp;<?= date('Y') - $year[0]; ?> &nbsp;ปี
                                                </td>
                                                <td></td>
                                            </tr>					
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div style="clear:both;"></div>		  
                </div> 
                <div id="my_box_trainning_history">
                    <?php
                    $oldiyear = '';
                    $i = 0;
                    foreach ($modelhistory as $key => $value) {
                        $datayear = explode('-', $value->start);
                        $year = $datayear[0];
                        $i++;
                        // var_dump($oldiyear!=$year);
                        if ($key == 0) {
                            ?>
                            <div class="panel panel-default" style="padding:2px;">
                                <div class="panel-heading">ประวัติการเข้ารับการอบรม</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <h2>ปี <?= $year; ?></h2>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="list-group">
                                                <a href="#" class="list-group-item active">
                                                    <?= $value->name ?>
                                                </a>
                                                <?php
                                            } else {
                                                if ($oldiyear != $year) {
                                                    $i = 1;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                       
                                <div class="panel panel-default" style="padding:2px;">
                                    <div class="panel-heading">ประวัติการเข้ารับการอบรม</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <h2>ปี <?= $year; ?></h2>
                                            </div>
                                            <div class="col-xs-8">
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item active">
                                                        <?= $value->name ?>
                                                    </a>             
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if ($i > 1) {
                                                ?>
                                                <a href="#" class="list-group-item"><?= $value->name ?></a>           
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            $oldiyear = $year;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 			
                </div> 		  
            </div>
        </div><!-- end .row -->
        <p class="pull-right"><a href="#">Back to top</a></p>
    </div>
</div>