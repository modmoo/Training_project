<?php
$iscomplete=Daycoursetraining::iscompletecourse($data->course_id);
 // if($data->day==$data->getdaynow()){
if($iscomplete){  
 $this->widget(
    'booster.widgets.TbButton',
    array(
        'label' => 'เช็คชื่อ',
        'icon' => 'fa fa-pencil-square-o',
        'size' => 'small',
        'buttonType' =>'link',
        'context' => 'info',
        'url' =>Yii::app()->controller->createUrl("staff/checkCourse/index", array("id"=>$data->idcourse,"day"=>$data->day)),
    )
); echo ' ';   
}else if($data->getdaynow()){
 ?>
<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
   ผ่านมาแล้ว  
  </div>
</div>
<?php
}if($data->getdaynow()<$data->day){
 ?>
<div class="progress">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
   ยังไม่ถึงเวลา  
  </div>
</div>
<?php
} 
 ?>
