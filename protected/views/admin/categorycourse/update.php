<?php
$this->menu=array(
	array('label'=>'List Categorycourse','url'=>array('index')),
	array('label'=>'Create Categorycourse','url'=>array('create')),
	array('label'=>'View Categorycourse','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Categorycourse','url'=>array('admin')),
	);
	?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>