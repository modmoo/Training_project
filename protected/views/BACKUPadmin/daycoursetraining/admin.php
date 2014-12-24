<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('daycoursetraining-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'daycoursetraining-grid',
'dataProvider'=>$model->search(),
'type' => 'striped bordered',
'filter'=>$model,
'columns'=>array(
		//'id',
		'idcourse',
		'day',
		'timestart',
		'timeend',
		'detail',
     
        array('header' => '<span style="color:#0088cc;padding-top:4px;">action</span>',
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{update}', // 'template'=>'{add} {list} {update} {print_act}',
            'buttons' => array
                (
                'update' => array
                    (
                    'label' => 'เช็คชื่อ',
                    'icon' => 'fa fa-pencil-square-o',
                    'url' => 'Yii::app()->controller->createUrl("admin/checkCourse/index", array("id"=>$data->idcourse,"day"=>$data->day))',
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
)); ?>
