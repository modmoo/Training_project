<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('employee-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
 
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php
        /*
        $this->renderPartial('_search',array(
	'model'=>$model,
)); 
 */
 ?>
</div><!-- search-form -->
<div style="margin-bottom:-46px;;" class="well">
    <strong>ราชื่อพนักงานแผนก: &nbsp;</strong><?=Department::getlabeldepartmanets(Yii::app ()->user->getdepartments())?>  
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
 
<?php 
    $model->iddept=Yii::app ()->user->getdepartments();
    $this->widget('booster.widgets.TbGridView', array(
    'id'=>'employee-grid',
    'type' => 'striped bordered condensed',
    'dataProvider'=>$model->search(),
  //  'filter'=>$model,
    'columns'=>array(
        'idemployee',
        'firstname',
	    'lastname',  
	array(
            'name'=>'iddept',
            //'header'=>'สถานะ',
            'htmlOptions'=> array( 'class' => 'form-control' ),
           'value'=>'Department::getlabeldepartmanets($data->iddept)',
            'htmlOptions' => array(
             'style' => 'width: 180px;text-align:center;'//, 'class' => 'form-control'
            ),
	   ),
        array(
            'name'=>'active',
            'header'=>'สถานะ',
           // 'filter'=>array('1'=>'แสดงผล','0'=>'ไม่แสดงผล'),
            'value'=>'($data->active=="1")?("ยังทำงาน"):("ลาออกแล้ว")'
        ),
    ),
)); ?>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('employee-grid');
}
</script>
<?php $this->endWidget(); ?>
 