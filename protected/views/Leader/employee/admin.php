<?php
 

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('employee-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
 
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'employee-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'idemployee',
		'firstname',
		'lastname',
		'username',
		'password',
		/*
		'sex',
		'image',
		'tel',
		'department',
		'startdate',
		'birtthday',
		'degree',
		'address',
		'email',
		'usertype',
		'active',
		'at_lastvisit',
		'at_counter',
		'company_id',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
