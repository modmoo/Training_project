<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('supprier-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
 
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php //$this->renderPartial('_search',array('model'=>$model)); ?>
</div><!-- search-form -->
 

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
<div style="margin-bottom:-46px;;" class="well">
<?php
echo '<h3>จัดการบริษัทรับจัดอบรม</h3>'; 
echo CHtml::ajaxSubmitButton(
    $label = 'ลบข้อมูล', 
    array('admin/supprier/Ajaxupdate'), array('success' => 'reloadGrid'),
    $htmlOptions=array ('class' => 'btn btn-danger')
    );
?>&nbsp;
<?php echo CHtml::link('เพิ่มข้อมูล',array('admin/supprier/create'),array('class'=>'btn btn-info')); ?>  
</div>
 
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id'=>'supprier-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped bordered',
    'filter' => $model,
    'selectableRows'=>3,    
    'columns' => array(
        array(
            'id' => 'id',
            'class' => 'CCheckBoxColumn',
           // 'selectableRows' => '50',
        ),
		'idsuppier',
		'name',
		'tel',
		'email',
		'address',
        array('header' => '<span style="color:#428bca;">ดำเนินการ</span>',
           'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{delete}{update}', //    'template'=>'{add} {list} {update} {print_act}',
            'buttons' => array(
                'update' => array(
                    'label' => 'แก้ไข',
                    'icon' => 'fa fa-pencil-square-o',
                    'url' => 'Yii::app()->controller->createUrl("admin/supprier/update", array("id"=>$data->id))',
                    'options' => array(
                        'class' => 'btn btn-small btn-warning', 'style' => 'margin:5px;',
                    ),
                ),
                'delete' => array
                    (
                    'label' => 'ลบ',
                    'icon' => 'fa fa-times',
                    'url' => 'Yii::app()->controller->createUrl("admin/supprier/delete", array("id"=>$data->id))',
                    'options' => array(
                        'class' => 'btn btn-small btn-danger',
                    ),
                ),
            ),
            'htmlOptions' => array(
                'style' => 'width: 220px;text-align:center;'
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
    $.fn.yiiGridView.update('supprier-grid');
}
</script>
<?php $this->endWidget(); ?>


