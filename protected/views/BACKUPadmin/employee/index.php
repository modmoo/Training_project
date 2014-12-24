<?php
$this->breadcrumbs=array(
	'Employees',
);

$this->menu=array(
array('label'=>'Common','url'=>array('create')),
array('label'=>'Manage Employee','url'=>array('admin')),
);
?>

<h1>Employees</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
