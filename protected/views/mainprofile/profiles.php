<?php
if(count($modelhistory)>0){
?>
<div id="my_box_trainning_history">
    <?php
    $oldiyear = '';
    $i = 0;
    foreach ($modelhistory as $key => $value) {
        //var_dump($value);exit();
        $datayear = explode('-', $value['dmax']);
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
                                <a href="<?=Yii::app()->createUrl('historycourse/detail',array('id'=>$value['cu_id']))?>" class="">
                                    <?= $value['name']?><br>
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
                                <div class="list-group" >
                                    <a href="<?=Yii::app()->createUrl('historycourse/detail',array('id'=>$value['cu_id']))?>"  ><?= $value['name']?><br>
                                    </a>             
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if ($i > 1) {
                                ?>
                                <a href="<?=Yii::app()->createUrl('historycourse/detail',array('id'=>$value['cu_id']))?>" > <?= $value['name']?><br></a>           
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
<?php }
?>