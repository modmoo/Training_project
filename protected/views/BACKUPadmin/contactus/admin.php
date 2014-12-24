<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('contactus-grid', {
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
 <h3>ข้อมูลผู้ติดต่อ</h3>
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
    array('admin/contactus/Ajaxupdate'), array('success' => 'reloadGrid'),
    $htmlOptions=array ('class' => 'btn btn-danger')
    );
?>&nbsp;
<?php //echo CHtml::link('เพิ่มข้อมูล',array('admin/course/create'),array('class'=>'btn btn-info')); ?>  
</div>
 
<?php
$this->widget('booster.widgets.TbGridView', array(
     'id'=>'contactus-grid',
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
        array(
        	 'name'=>'name',
             'htmlOptions' => array(
             'style' => 'width: 150px;text-align:center;'//, 'class' => 'form-control'
            ),
        	),
        array(
        	 'name'=>'to',
             'htmlOptions' => array(
             'style' => 'width: 150px;text-align:center;'//, 'class' => 'form-control'
            ),
        	),
        array(
        	 'name'=>'detail',
             'htmlOptions' => array(
             'style' => 'width: 150px;text-align:center;'//, 'class' => 'form-control'
            ),
        	),
        array(
        	 'name'=>'email',
             'htmlOptions' => array(
             'style' => 'width: 150px;text-align:center;'//, 'class' => 'form-control'
            ),
        	),
        array('header' => '<span style="color:#428bca;">ดำเนินการ</span>',
           'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{delete}{view}', //    'template'=>'{add} {list} {update} {print_act}',
            'buttons' => array(
                'delete' => array(
                    'label' => 'ลบ',
                    'icon' => 'fa fa-times',
                    'url' => 'Yii::app()->controller->createUrl("admin/contactus/delete", array("id"=>$data->id))',
                    'options' => array(
                        'class' => 'btn btn-small btn-danger','style' => 'margin:5px;',
                    ),
                ),
                'view' => array(
                    'label' => 'แสดงรายละเอียด',
                    'icon' => 'fa fa-info-circle',
                    'url' => 'Yii::app()->controller->createUrl("admin/contactus/view", array("id"=>$data->id))',
                    'options' => array(
                       'class' => 'btn btn-small btn-info', 'style' => 'margin:5px;',
                    ),
                ),   
            ),
            'htmlOptions' => array(
                'style' => 'width: 100px;', 'class' => 'text_center'
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
    $.fn.yiiGridView.update('contactus-grid');
}
</script>
<?php $this->endWidget(); ?>
 