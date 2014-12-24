<?php
$this->breadcrumbs=array(
	'Daycoursetrainings'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Daycoursetraining','url'=>array('index')),
array('label'=>'Create Daycoursetraining','url'=>array('create')),
array('label'=>'Update Daycoursetraining','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Daycoursetraining','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Daycoursetraining','url'=>array('admin')),
);
?>

<h1>View Daycoursetraining #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'idcourse',
		'day',
		'timestart',
		'timeend',
		'detail',
),
)); ?>
