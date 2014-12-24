<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('course-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<style type="text/css">
.text_center{
  text-align:center;
}
</style>
<div class="well">
 <h3>รายการหลักสูตร</h3>
<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn btn-primary')); ?>
<div class="search-form" style="display:none">
    <?php
    //$this->renderPartial('_search', array(
    //    'model' => $model,
   // ));
    ?>
</div><!-- search-form -->
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
<div style="margin-bottom:-46px;;" class="well">
<?php
echo CHtml::ajaxSubmitButton(
    $label = 'ลบข้อมูล', 
    array('admin/course/Ajaxupdate'), array('success' => 'reloadGrid'),
    $htmlOptions=array ('class' => 'btn btn-danger')
    );
?>&nbsp;
<?php echo CHtml::link('เพิ่มข้อมูล',array('admin/course/create'),array('class'=>'btn btn-info')); ?>  
</div>
 
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'course-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped bordered',
    'filter' => $model,
    'selectableRows'=>3,    
    'columns' => array(
        array(
            'id' => 'cu_id',
            'class' => 'CCheckBoxColumn',
           // 'selectableRows' => '50',
        ),
        'name',
	array(
            'name'=>'categorycourse',
            //'header'=>'สถานะ',
            'htmlOptions'=> array( 'class' => 'form-control' ),
	    'filter'=> CHtml::dropDownList( 'Course[categorycourse]', $model->categorycourse,
	     CHtml::listData(Categorycourse::getTypescourse(),'id', 'name'),
	    array( 'empty' => '-- หลักสูตร --','class' => 'form-control', )
	    ),
           'value'=>'Categorycourse::getlabelTypescourse($data->categorycourse)',
            'htmlOptions' => array(
             'style' => 'width: 180px;text-align:center;'//, 'class' => 'form-control'
            ),
	   ),
        array(
            'name' => 'active',
            'header' => 'สถานะ',
            'filter' => array('1' => 'แสดง', '0' => 'ไม่แสดง'),
            'value' => '($data->active=="1")?("แสดง"):("ไม่แสดง")', 'htmlOptions' => array('class' => 'text_center'),
            'htmlOptions' => array(
             'style' => 'width: 150px;text-align:center;'//, 'class' => 'form-control'
            ),
        ),
        array('header' => '<span style="color:#428bca;">ดำเนินการ</span>',
           'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{delete}{update}{request}{ansquest}', //    'template'=>'{add} {list} {update} {print_act}',
            'buttons' => array(
                'update' => array(
                    'label' => 'แก้ไข',
                    'icon' => 'fa fa-pencil-square-o',
                    'url' => 'Yii::app()->controller->createUrl("admin/course/update", array("id"=>$data->cu_id))',
                    'options' => array(
                        'class' => 'btn btn-small btn-warning', 'style' => 'margin:5px;',
                    ),
                ),
                'delete' => array
                    (
                    'label' => 'ลบ',
                    'icon' => 'fa fa-times',
                    'url' => 'Yii::app()->controller->createUrl("admin/course/delete", array("id"=>$data->cu_id))',
                    'options' => array(
                        'class' => 'btn btn-small btn-danger',
                    ),
                ),
               'request' => array(
                    'label' => 'ร้องผู้อบรม',
                    'icon' => 'fa fa-users',
                    'url' => 'Yii::app()->controller->createUrl("admin/course/requestuser", array("id"=>$data->cu_id))',
                    'options' => array(
                        'class' => 'btn btn-small btn-info', 'style' => 'margin:5px;',
                    ),
                ),  
             'ansquest' => array(
                    'label' => 'ดูผลการประเมิน',
                    'icon' => 'fa fa-bar-chart-o',
                    'url' => 'Yii::app()->controller->createUrl("admin/questionresult", array("id"=>$data->cu_id))',
                    'options' => array(
                        'class' => 'btn btn-small btn-success', 'style' => 'margin:5px;',
                    ),
                ), 
            ),
            'htmlOptions' => array(
                'style' => 'width: 300px;', 'class' => 'text_center'
            ),
        )
    /*
      array(
      'class'=>'booster.widgets.TbButtonColumn',
      ), */
    ),'htmlOptions' => array(
                'style' => 'margin-top:0;'
            ),
   )
  );
?>
</div>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('course-grid');
}
</script>
<?php $this->endWidget(); ?>
 