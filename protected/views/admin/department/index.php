<?php
$this->breadcrumbs=array(
	'Departments',
);

$this->menu=array(
array('label'=>'Create Department','url'=>array('create')),
array('label'=>'Manage Department','url'=>array('admin')),
);
?>
 

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
