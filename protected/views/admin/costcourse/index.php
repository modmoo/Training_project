<?php
$this->breadcrumbs=array(
	'Costcourses',
);

$this->menu=array(
array('label'=>'Create Costcourse','url'=>array('create')),
array('label'=>'Manage Costcourse','url'=>array('admin')),
);
?>

<h1>Costcourses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
