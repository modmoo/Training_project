<?php


	$this->menu=array(
	array('label'=>'List CheckCourse','url'=>array('index')),
	array('label'=>'Create CheckCourse','url'=>array('create')),
	array('label'=>'View CheckCourse','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage CheckCourse','url'=>array('admin')),
	);
	?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>