<?php
$this->breadcrumbs=array(
	'Courses',
);

$this->menu=array(
array('label'=>'Create Course','url'=>array('create')),
array('label'=>'Manage Course','url'=>array('admin')),
);
?>
 
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
