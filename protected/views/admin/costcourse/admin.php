<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('costcourse-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
 
<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//))
        ; ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'costcourse-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'name',
		'price',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
