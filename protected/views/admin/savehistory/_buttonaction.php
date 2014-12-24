<?php
$iscomplete=Daycoursetraining::iscompletecourse($data->course_id);
 // if($data->day==$data->getdaynow()){
 // var_dump($lastcourse);exit();
if($iscomplete){  
 $this->widget(
    'booster.widgets.TbButton',
    array(
        'label' => 'บันทึกประวัติ',
        'icon' => 'fa fa-floppy-o',
        'size' => 'small',
        'buttonType' =>'link',
        'context' => 'info',
        'url' =>Yii::app()->controller->createUrl("admin/employee/savehistory", array("id"=>$data->idcourse,"id"=>$data->course_id)),
    )
); echo ' ';   
}else if($data->getdaynow()>Daycoursetraining::getlastcourse($data->course_id)){
 ?>
<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
   ผ่านมาแล้ว  
  </div>
</div>
<?php
}if($data->getdaynow()<Daycoursetraining::getlastcourse($data->course_id)){
 ?>
<div class="progress">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
   ยังไม่ถึงเวลา  
  </div>
</div>
<?php
} 
 ?>
