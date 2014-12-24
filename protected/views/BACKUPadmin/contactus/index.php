<?php
$this->breadcrumbs=array(
	'Contactuses',
);

$this->menu=array(
array('label'=>'Create Contactus','url'=>array('create')),
array('label'=>'Manage Contactus','url'=>array('admin')),
);
?>

<h1>Contactuses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
