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
                    'url' => 'Yii::app()->controller->createUrl("admin/checkCourse/index", array("id"=>$data->course_id))',
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
));
?>
