<?php
$this->breadcrumbs=array(
	'Suppriers',
);

$this->menu=array(
array('label'=>'Create Supprier','url'=>array('create')),
array('label'=>'Manage Supprier','url'=>array('admin')),
);
?>

<h1>Suppriers</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
