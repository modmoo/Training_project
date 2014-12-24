<?php
$this->breadcrumbs=array(
	'Costcourses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Costcourse','url'=>array('index')),
	array('label'=>'Create Costcourse','url'=>array('create')),
	array('label'=>'View Costcourse','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Costcourse','url'=>array('admin')),
	);
	?>

	<h1>Update Costcourse <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>