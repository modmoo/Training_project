<?php
 if(Yii::app()->user->hasFlash('success')):?>
        <?php  
            Yii::app()->clientScript->registerScript(
                   'myalertEffect',
                   "swal('success...!', 'บันทึกข้อมูลเรียบร้อยแล้วค่ะ!', 'success');",
                   CClientScript::POS_READY
                );
         ?>
<?php endif; ?>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('department-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
<div style="margin-bottom:-46px;;" class="well">
<?php
echo '<h3>รายชื่อแผนก</h3>'; 
echo CHtml::ajaxSubmitButton(
    $label = 'ลบข้อมูล', 
    array('admin/company/Ajaxupdate'), array('success' => 'reloadGrid'),
    $htmlOptions=array ('class' => 'btn btn-danger')
    );
?>&nbsp;
<?php echo CHtml::link('เพิ่มข้อมูล',array('admin/department/create'),array('class'=>'btn btn-info')); ?>  
</div>
 
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id'=>'department-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped bordered',
    'filter' => $model, 
    //'rowCssClassExpression'=>'!$data->name?"danger":($data->name?"warning":"")',
    'selectableRows'=>3,    
    'columns' => array(
        array(
            'id' => 'id',
            'class' => 'CCheckBoxColumn',
           // 'selectableRows' => '50',
        ),
      //  'iddepartment',
        'name',
        array('header' => '<span style="color:#428bca;">ดำเนินการ</span>',
           'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{delete}{update}', //    'template'=>'{add} {list} {update} {print_act}',
            'buttons' => array(
                'update' => array(
                    'label' => 'แก้ไข',
                    'icon' => 'fa fa-pencil-square-o',
                    'url' => 'Yii::app()->controller->createUrl("admin/department/update", array("id"=>$data->id))',
                    'options' => array(
                        'class' => 'btn btn-small btn-warning', 'style' => 'margin:5px;',
                    ),
                ),
                'delete' => array
                    (
                    'label' => 'ลบ',
                    'icon' => 'fa fa-times',
                    'url' => 'Yii::app()->controller->createUrl("admin/department/delete", array("id"=>$data->id))',
                    'options' => array(
                        'class' => 'btn btn-small btn-danger',
                    ),
                ),
            ),
            'htmlOptions' => array(
                'style' => 'width: 120px;text-align:center;'//, 'class' => 'text_center'
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
    $.fn.yiiGridView.update('department-grid');
}
</script>
<?php $this->endWidget(); ?> 
 