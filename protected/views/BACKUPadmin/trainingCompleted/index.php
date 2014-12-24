<div id="my_box_trainning_history">
    <div class="panel panel-default" style="padding:2px;">
        <div class="panel-heading">ค้นหา</div>
        <div class="panel-body">
            <?php
$form = $this->beginWidget('CActiveForm', [
    'id' => 'order-search-form',
    'method' => 'get',
]);
echo '<input  type="text" name="year">&nbsp;';
echo CHtml::submitButton('ค้นหา', ['class' => 'btn btn-primary btn-sm']);
$this->endWidget();
            ?>
            <?php
            $oldyear="";$i=0;
            if($modelhistory!=NULL){
              foreach ($modelhistory as $key => $value) {
               if($value['myyear']!=$oldyear){
                   
               }   
            }   
            }
            ?>
      
        </div>
        <div class="row">
<div id="my_box_trainning_history">
    <?php
    $oldiyear = '';
    $i = 0;
    if($modelhistory!=NULL){
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
                                <a href="<?=Yii::app()->createUrl('historycourse/detail',array('id'=>$value['cu_id']))?>" class="list-group-item active">
                                    <?= $value['name']?>
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
                                    <a href="<?=Yii::app()->createUrl('historycourse/detail',array('id'=>$value['cu_id']))?>" class="list-group-item active">
                                       <?= $value['name']?>
                                    </a>             
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if ($i > 1) {
                                ?>
                                <a href="<?=Yii::app()->createUrl('historycourse/detail',array('id'=>$value['cu_id']))?>" class="list-group-item"> <?= $value['name']?></a>           
                                <?php
                            }
                            ?>
                            <?php
                            $oldiyear = $year;
                        }       
    }
  
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> 			
</div> 	
        </div>
    </div>
</div> 