<?php 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('check-course-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<?php
/*
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'check-course-grid',
    'dataProvider' => $model->listcourseapproval(),
    //  'filter' => $model,
    'type' => 'striped bordered',
    'columns' => array(
        'id',
        'idcourse',
        //	'approval',
        array(
            'header' => '<span style="color:#0088cc;padding-top:4px;">ชื่อคอร์ส</span>',
            // 'name'=>'coursename',
            'value' => '$data->course->name',
            'htmlOptions' => array('style' => 'width:400px'),
        ),
        array('header' => '<span style="color:#0088cc;padding-top:4px;">action</span>',
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{update}', // 'template'=>'{add} {list} {update} {print_act}',
            'buttons' => array
                (
                'update' => array
                    (
                    'label' => 'เช็คชื่อ',
                    'icon' => 'fa fa-pencil-square-o',
                    'url' => 'Yii::app()->controller->createUrl("staff/daycoursetraining/admin", array("id"=>$data->course_id))',
                    'options' => array(
                        'class' => 'btn btn-small btn-info', 'style' => 'margin:5px;',
                    ),
                )
            ),
            'htmlOptions' => array(
                'style' => 'text-align:center;width: 120px;', 'class' => 'text_center'
            ),
        ),
    ),
)); */
?>
<div class="row clearfix">
    <div class="col-md-12 column">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                     ลำดับที่
                    </th>
                    <th>
                    ชื่อรหัสหลักสูตร
                    </th>
                    <th>
                    เวลาอบรม
                    </th>
                    <th>
                     จำนวนผู้อบรม
                    </th>
                    <th>ตรวจรายชื่อผู้เข้าอบรม</th>
                </tr>
            </thead>
            <tbody>
              <?php $num=0;
             foreach ($model as $key => $value) {
                  $num++;
                   ?>
                     <tr>
                    <td>
                     <?=$num?>
                    </td>
                    <td>
                     <?=cutword::substr_utf8($value['name'], 0, 40)?>
                    </td>
                    <td>
                    <?=Daycoursetraining::numday($value['cu_id']);?>&nbsp;วัน
                    </td>
                    <td>
                    <?php 
                    $regisnum=CourseRegister::model()->checkmax($value['cu_id']);
                   echo $regisnum;
                   ?>
                    </td>
                    <td width="250">
                     <?php
                     if($regisnum>0 &&Daycoursetraining::ischeckname($value['cu_id'])){
                     ?>
                    <a class="btn btn-small btn-info" title="" data-toggle="tooltip" href="<?=Yii::app()->controller->createUrl("staff/daycoursetraining/admin",array('id'=>$value['cu_id']));?>" data-original-title="เช็คชื่อ"><i class="fa fa-pencil-square-o"></i></a>
                    <?php
                     }else{
                      echo "ยังไม่ถึงวันตรวจรายชื่อ/เลยวันที่ตรวจรายชื่อแล้ว";   
                     }
                     ?>
                    </td>
                </tr>   
                <?php
             }
              ?>
            </tbody>
        </table>
    </div>
</div>