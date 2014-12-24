<?php
$this->breadcrumbs=array(
	'Costcourses'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Costcourse','url'=>array('index')),
array('label'=>'Create Costcourse','url'=>array('create')),
array('label'=>'Update Costcourse','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Costcourse','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Costcourse','url'=>array('admin')),
);
?>

<h1>View Costcourse #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'price',
),
)); ?>
