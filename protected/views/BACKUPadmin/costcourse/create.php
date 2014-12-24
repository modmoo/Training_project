<?php
$this->breadcrumbs=array(
	'Costcourses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Costcourse','url'=>array('index')),
array('label'=>'Manage Costcourse','url'=>array('admin')),
);
?>

<h1>Create Costcourse</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>