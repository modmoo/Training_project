<script type="text/javascript">
 $(document).ready(function() {
 $("#Employee_startdate").change(function() {
    $('#startdate').val($(this).val());
    //alert($(this).val());
 });
 $("#Employee_birtthday").change(function() {
  $('#hiddenbirtthday').val($(this).val());   // alert($(this).val());
 });      
 });   
</script>
<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'employee-form',
    'enableAjaxValidation' => false, 'type' => 'horizontal',
    'htmlOptions' => array('class' => 'well', 'enctype' => 'multipart/form-data')
        ));
?>
 <?php
         $mytrue=TRUE;
         if(!$model->isNewRecord){
         $mytrue=FALSE;   
         }
        ?>
        
<fieldset class="myfieldset">
    <?php
     if($mytrue){
       ?>
    <legend class="mylegend"><i class="glyphicon glyphicon-plus"></i>เพิ่มพนักงาน</legend>
     <?php  
     }else{
       ?>
       <legend class="mylegend"><i class="glyphicon glyphicon-pencil"></i>แก้ไขพนักงาน&nbsp;<?=$model->idemployee?></legend>    
     <?php  
     }
    ?>
    <div style="margin-left:270px;">
        <p class="help-block">โปรดกรอกข้อมูลให้ครบทุกช่อง<span class="required">    *</span> </p>
    </div>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldGroup($model, 'idemployee', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;', 'disabled' => true)))); ?>
    <?php echo $form->textFieldGroup($model, 'firstname', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
    <?php echo $form->textFieldGroup($model, 'lastname', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
    <?php //echo $form->textFieldGroup($model, 'username', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
    <input type="hidden" id="startdate" value="" name="startdate">
    <input type="hidden" id="hiddenbirtthday" value="" name="hiddenbirtthday">
    <?php
    if (!$model->isNewRecord) {
        unset($model->password);
        echo $form->textFieldGroup($model, 'username', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;'))));
        echo $form->passwordFieldGroup($model, 'password', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;'))));
    }
    ?>
    <?php echo $form->radioButtonListGroup($model, 'sex', array('widgetOptions' => array('data' => array('  ชาย', '  หญิง')))); ?>
    <?php echo $form->fileFieldGroup($model, 'image', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:190px;')))); ?>
    <?php echo $form->textFieldGroup($model, 'tel', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
    <?php echo $form->dropDownListGroup($model, 'iddept', array('wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'widgetOptions' => array('data' => dataweb::getdepartmanets(), 'htmlOptions' => array('prompt' => 'เลือกแผนก', 'style' => 'width:150px;')))); ?>
    <?php echo $form->datePickerGroup($model, 'startdate', array('widgetOptions' => array('options' => array(), 'htmlOptions' => array('style' => 'width:100px;')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>')); ?>
    <?php echo $form->datePickerGroup($model, 'birtthday', array('widgetOptions' => array('options' => array(), 'htmlOptions' => array('style' => 'width:100px;')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>')); ?>
    <?php echo $form->dropDownListGroup($model, 'degree', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',), 'widgetOptions' => array('data' => dataweb::getEmployee_degree(), 'htmlOptions' => array('prompt' => 'เลือกวุฒิการศึกษา', 'style' => 'width:150px;')))); ?>
    <?php echo $form->textAreaGroup($model, 'address', array('widgetOptions' => array('htmlOptions' => array('rows' => 3, 'style' => 'width:250px;')))); ?>
    <?php echo $form->textFieldGroup($model, 'email', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
    <?php echo $form->dropDownListGroup($model, 'usertype', array('wrapperHtmlOptions' => array('class' => 'col-sm-2',), 'widgetOptions' => array('data' => dataweb::gettype_user(), 'htmlOptions' => array('prompt' => 'เลือกประเภทผู้ใช้งาน', 'style' => 'width:250px;')))); ?>
    <?php echo $form->radioButtonListGroup($model, 'active', array('widgetOptions' => array('data' => array('ไม่แสดงผล', 'แสดงผล')))); ?>
    <?php //echo $form->timePickerGroup($model, 'at_lastvisit', array('wrapperHtmlOptions' => array('class' => 'col-sm-3'),'htmlOptions' => array('style'=>'width:50px;'))); ?>
    <?php //echo $form->textFieldGroup($model, 'at_counter', array('widgetOptions' => array('htmlOptions' => array('style'=>'width:150px;')))); ?>
    <?php //echo $form->textFieldGroup($model, 'company_id', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:90px;')))); ?> 
    <?php echo $form->dropDownListGroup($model, 'company_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-2',), 'widgetOptions' => array('data' => dataweb::getcompany(), 'htmlOptions' => array('prompt' => 'เลือกบริษัท', 'style' => 'width:250px;')))); ?>
</fieldset>
<div class="form-actions" style="margin-left:280px;">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'reset', 'label' => 'Reset')
    );
    ?>
</div>

<?php $this->endWidget(); ?>
 