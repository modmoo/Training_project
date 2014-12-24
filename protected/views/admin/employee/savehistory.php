<?php
 $myidcourse=""; 
  if(isset($_GET['id'])){
   $myidcourse=$_GET['id'];
  }
 $issaveSup=TrainingHistory::issaveSup($myidcourse);
 $ischeck=  TrainingUsershistory::ischeck($myidcourse);
 $ischecksupper= TrainingTrainneruserhistory::ischeck($myidcourse);
  //var_dump($ischeck);
  //var_dump($issaveSup); exit();
  //var_dump(!$issaveSup &&!$ischeck);exit();
//var_dump(CheckCourse::getscoreByuser($_GET['id']));exit();
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('savehistory-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<style type="text/css">
.text_center{
  text-align:center;
}
</style>
<div class="well">
 <h3>บันทึกประวัติผู้เรียน</h3>
<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn btn-primary')); ?>
<div class="search-form" style="display:none">
    <?php
    //$this->renderPartial('_search', array(
    //    'model' => $model,
   // ));
    ?>
</div><!-- search-form -->
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
<input type="hidden" name="sp_id" value="<?= Course::getsupprier_id($myidcourse)?>">
<div style="margin-bottom:-34px;" class="well">
    <a href="<?=Yii::app()->createUrl('admin/employee/infosavehistory',array('id'=>$myidcourse))?>" class="btn btn-info" role="button">ข้อมูลหลักสูตร</a>
    &nbsp;
<?php 
if(!$issaveSup &&!$ischeck){
echo CHtml::ajaxSubmitButton(
    $label = 'บันทึกประวัติผู้เรียน', 
    array('admin/employee/actsavehistory'), array('success' => 'reloadGrid','success' => 'js:function(){location.reload();}'),
    $htmlOptions=array ('class' => 'btn btn-danger'),
    array('confirm'=>'Do you want to save settings ?')  
    );
}else{
 ?>
<button type="button" class="btn btn-warning" disabled="disabled">บันทึกประวัติผู้เรียนแล้วค่ะ</button>  
<?php    
}
?>
 &nbsp; 
 <?php
  if(!$ischecksupper &&$ischeck){
 ?>
 <!-- <a href="<?php // Yii::app()->createUrl('admin/employee/SaveSuhistory',array('id'=>$myidcourse))?>" class="btn btn-success" role="button">บันทึกประวัติผู้สอน</a> -->  
  &nbsp;
 <?php    
  }else{
    ?>
 <!-- <button type="button" class="btn btn-warning" disabled="disabled">กณุนาบันทึกประวัติผู้เรียน</button>  -->
  <?php
  } 
  echo '&nbsp;&nbsp;ประเมินหลักสูตร&nbsp;&nbsp;'.CHtml::checkBox('question',true,array());
//echo CHtml::link('บันทึกประวัติ',array('admin/employee/actsavehistory'),array('class'=>'btn btn-danger'));
?>  
</div>
 
<?php
  echo CHtml::hiddenField("course_id",$myidcourse,array("type"=>"hidden","style"=>"width:0px;"));
   if(!Yii::app()->user->isAdmin()){
  $model->iddept=Yii::app ()->user->getdepartments();    
  }
   
    $this->widget('booster.widgets.TbGridView', array(
    'id'=>'savehistory-grid',
    'type' => 'striped bordered condensed',
    'dataProvider'=>$model->searchsavehistory($myidcourse),
    //'filter'=>$model,
    'selectableRows'=>3, 
    'columns'=>array(
      array(
          'name' => 'employee.idemployee',
          'visible'=>false,
          'value' => '$data->employee->idemployee',
        ),
         array(
          //'name' => 'employee.idemployee',
          'header' => 'วันสิ้นสุดหลักสูตร',  
          'value' => 'Daycoursetraining::getlastcourse($data->course_id)',
        ),
       array(
          'name' => 'employee.firstname',
          'value' => '$data->employee->firstname',
        ), 
        array(
          'name' => 'employee.lastname',
          'value' => '$data->employee->lastname',
        ),
     array(
         // 'name' => 'employee.idemployee',
          //'headerHtmlOptions'=>array('colspan'=>2),
           'type'=>'raw',
           'header' => 'ผลการเรียนผ่าน',
           'value' =>'CHtml::radioButton("status[$data->id]", true, array("value"=>1));',
          'htmlOptions'=>array("width"=>"130px",'style'=>'text-align:center;'),
         ),
     array(
           'header' => 'ผลการเรียนไม่ผ่าน',
           'type'=>'raw',
           'value' =>'CHtml::radioButton("status[$data->id]", false, array("value"=>2));',
          'htmlOptions'=>array("width"=>"130px",'style'=>'text-align:center;'),
         ),   
       array(
            'name'=>'employee.idemployee',
            'type'=>'raw',
             'headerHtmlOptions'=>array('colspan'=>2),
            'header' => 'คะแนนรวม',
            'value'=>'CHtml::textField("score[]",CheckCourse::getscoreByusernew($data->course_id,$data->employee->idemployee),array("style"=>"width:150px;"));',
            'htmlOptions'=>array("width"=>"150px"),
        ),
      array(
            'name'=>'employee.idemployee',
            'type'=>'raw',
            'headerHtmlOptions'=>array('style'=>'display:none'),
            'value'=>'CHtml::hiddenField("userid[]",$data->employee->idemployee,array("type"=>"hidden","style"=>"width:0px;"))',
            'htmlOptions'=>array("width"=>"0px"),
        ),/*  
      array(
            'name'=>'course_id',
            'type'=>'raw',
            'headerHtmlOptions'=>array('style'=>'display:none'),
            'value'=>'CHtml::hiddenField("course_id[]",$data->course_id,array("type"=>"hidden","style"=>"width:0px;"))',
            'htmlOptions'=>array("width"=>"0px"),
        ),*/
    ),
)); ?>
</div>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('savehistory-grid');
}
</script>
<?php $this->endWidget(); ?>
 
