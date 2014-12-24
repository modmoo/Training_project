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
<script type="text/javascript">
   function gettDatainfo(id) {
    //alert(id);
        $.ajax({
            url: '<?= Yii::app()->createUrl('admin/employee/getuserinfo') ?>',
            type: 'POST',
            cache: false, data: {id: id},
            beforeSend: function() {
            },
            success: function(html) {
                $("#datasup").empty().html(html);
                $("#myModalinfo").modal("show");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus + "ajaxloadcontent");
            }
        });
    }
</script> 
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php
        /*
        $this->renderPartial('_search',array(
	'model'=>$model,
)); 
 */
 ?>
</div><!-- search-form -->

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
<?php
echo '<div style="margin-bottom:-46px;;" class="well">';    
echo '<h3>จัดการพนักงาน</h3>'; 
echo CHtml::ajaxSubmitButton(
    $label = 'ลบข้อมูล', 
    array('admin/employee/Ajaxupdate'), array('success' => 'reloadGrid'),
    $htmlOptions=array ('class' => 'btn btn-danger')
    );
?>&nbsp;
<?php echo CHtml::link('เพิ่มข้อมูล',array('admin/employee/create'),array('class'=>'btn btn-info')); ?>  
</div>
<?php 
  if(!Yii::app()->user->isAdmin()){
  $model->iddept=Yii::app ()->user->getdepartments();  
  }
    $this->widget('booster.widgets.TbGridView', array(
    'id'=>'employee-grid',
    'type' => 'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'selectableRows'=>3,    
    'columns'=>array(
        array(
            'id'=>'idemployee',
            'class'=>'CCheckBoxColumn',
        //    'selectableRows' => '50',   
        ),
        'idemployee',
        'firstname',
	 'lastname',  
	array(
            'name'=>'iddept',
            //'header'=>'สถานะ',
            'htmlOptions'=> array( 'class' => 'form-control' ),
	    'filter'=> CHtml::dropDownList( 'Employee[iddept]', $model->iddept,
	     CHtml::listData(Department::getdepartmanets(),'id', 'name'),
	    array( 'empty' => '-- หลักสูตร --','class' => 'form-control', )
	    ),
           'value'=>'Department::getlabeldepartmanets($data->iddept)',
            'htmlOptions' => array(
             'style' => 'width: 180px;text-align:center;'//, 'class' => 'form-control'
            ),
	   ),
        array(
            'name'=>'active',
            'header'=>'สถานะ',
            'filter'=>array('1'=>'แสดงผล','0'=>'ไม่แสดงผล'),
            'value'=>'($data->active=="1")?("แสดงผล"):("ไม่แสดงผล")'
        ),array('header' => '<span style="color:#0088cc;padding-top:4px;">ดำเนินการ</span>',
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{delete}{update}{view}', //    'template'=>'{add} {list} {update} {print_act}',
            'buttons' => array
                (
                'update' => array
                    (
                    'label' => 'แก้ไข',
                    'icon' => 'fa fa-pencil-square-o',
                    'url' => 'Yii::app()->controller->createUrl("admin/employee/update", array("id"=>$data->idemployee))',
                    'options' => array(
                        'class' => 'btn btn-small btn-warning', 'style' => 'margin:5px;',
                    ),
                ),
                'delete' => array
                    (
                    'label' => 'ลบ',
                    'icon' => 'fa fa-times',
                    'url' => 'Yii::app()->controller->createUrl("admin/employee/delete", array("id"=>$data->idemployee))',
                    'options' => array(
                        'class' => 'btn btn-small btn-danger',
                    ),
                ),
               'view' => array
                    (
                    'label' => 'ดูข้อมูล',
                    'icon' => 'fa fa-user',
                    'url' => '',
                    'options' => array(
                        'class' => 'btn btn-small btn-info',
                        'onclick' => 'gettDatainfo($(this).parent().parent().children(":nth-child(2)").text());',
                    ),
                ),  
            ),
            'htmlOptions' => array(
                'style' => 'text-align:center; width: 220px;', 'class' => 'text_center'
            ),
        ),
    ),
)); ?>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('employee-grid');
}
</script>
<?php $this->endWidget(); ?>

<?php //echo CHtml::beginForm(array('export')); ?>
 
<?php // echo CHtml::endForm(); ?>
    <!-- Modal info  -->
<div class="modal fade" id="myModalinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">ข้อมูลพนักงาน </h4>
            </div>
            <div class="modal-body">
                <div id="datasup"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>