<?php
$this->breadcrumbs=array(
	'Categorycourses'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Categorycourse','url'=>array('index')),
array('label'=>'Create Categorycourse','url'=>array('create')),
array('label'=>'Update Categorycourse','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Categorycourse','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Categorycourse','url'=>array('admin')),
);
?>

<h1>View Categorycourse #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
),
)); ?>
