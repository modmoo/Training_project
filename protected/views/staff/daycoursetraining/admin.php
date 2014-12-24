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

<?php 
 
$this->widget('booster.widgets.TbGridView',array(
'id'=>'daycoursetraining-grid',
'dataProvider'=>$model->search($_GET['id']),
'rowCssClassExpression'=>'$data->day==$data->getdaynow()?"warning":("success")', 
'type' => 'striped bordered',
//'filter'=>$model,
'columns'=>array(
		//'id',
		//'idcourse',
		'day',
		'timestart',
		'timeend',
		'detail',
            array(
            'name' => 'day',
            'header' => 'ตรวจรายชื่อผู้เข้าอบรม',
            'value' => function($data)
            {
                Yii::app()->controller->renderPartial('_buttonaction', array(
                    'data' => $data
                ));
            },
            'htmlOptions' => array(
                'style' => 'width:200px;'
            )
        ),/*            
        array('header' => '<span style="color:#0088cc;padding-top:4px;">เช็คชื่อ</span>',
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{update}', // 'template'=>'{add} {list} {update} {print_act}',
            'buttons' => array
                (
                'update' => array
                    (
                    'label' => 'เช็คชื่อ',
                    'icon' => 'fa fa-pencil-square-o',
                    'url' => 'Yii::app()->controller->createUrl("staff/checkCourse/index", array("id"=>$data->idcourse,"day"=>$data->day))',
                    'options' => array(
                        'class' => 'btn btn-small btn-info', 'style' => 'margin:5px;',
                    ),
                    'visible'=>'$data->day==$data->getdaynow()',
                )
            ),
            'htmlOptions' => array(
                'style' => 'text-align:center;width: 120px;', 'class' => 'text_center'
            ),
        ),*/
),
)); 
 
?>
<?php
/*
$this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped bordered',
    'id' => 'news-grid',
'dataProvider'=>$model->search($_GET['id']),
    'filter' => $model,
    'columns' => array(
		'day',
		'timestart',
		'timeend',
		'detail',
        array(
            'name' => 'day',
            'value' => function($data)
            {
                Yii::app()->controller->renderPartial('_status_button', array(
                    'data' => $data
                ));
            },
            'filter' => array(
                Daycoursetraining::STATUS_check => 'Published',
                Daycoursetraining::STATUS_uncheck => 'Draft'
            ),
            'htmlOptions' => array(
                'style' => 'width:200px;'
            )
        ),
    ),
));
Yii::app()->clientScript->registerScript('myajax',"
  jQuery('#news-grid a.toggleStatus').on('click',function() {
 alert('xx');
        if ($(this).hasClass('disabled'))
            return false;
 
        var th=this;
 
        var afterDelete=function(){};
        $.fn.yiiGridView.update('news-grid', {
            type:'POST',
            url:$(this).attr('href'),
            success:function(data) {
                $.fn.yiiGridView.update('news-grid');
                afterDelete(th,true,data);
            },
            error:function(XHR) {
                return afterDelete(th,false,XHR);
            }
        });
 
        return false;
    });
  ");          
  */          
?>
 