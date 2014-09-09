<?php
$this->breadcrumbs=array(
	'Check Courses'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List CheckCourse','url'=>array('index')),
array('label'=>'Create CheckCourse','url'=>array('create')),
array('label'=>'Update CheckCourse','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete CheckCourse','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CheckCourse','url'=>array('admin')),
);
?>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'check',
		'day',
		'course_id',
		'employee_id',
),
)); ?>
