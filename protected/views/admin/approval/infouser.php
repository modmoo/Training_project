<div id="my_box_trainning_history">
    <?php
    $oldiyear = '';
    $i = 0;
    foreach ($modeluser as $key => $value) {
        $datayear = explode('-', $value->start);
        $year = $datayear[0];
        $i++;
        // var_dump($oldiyear!=$year);
        if ($key == 0) {
            ?>
            <div class="panel panel-default" style="padding:2px;">
                <div class="panel-heading">ประวัติการเข้ารับการอบรม ปี <?= $year; ?></div>
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