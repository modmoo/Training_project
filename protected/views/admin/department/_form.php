<?php if (Yii::app()->user->hasFlash('error')):  ?>
          <div class="alert in fade alert-danger">
          <?= Yii::app()->user->getFlash('error'); ?>
          </div>
     <?php endif; ?>
<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'department-form',
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
    <legend class="mylegend"><i class="glyphicon glyphicon-plus"></i>เพิ่มแผนก</legend>
     <?php  
     }else{
       ?>
       <legend class="mylegend"><i class="glyphicon glyphicon-pencil"></i>แก้ไขแผนก&nbsp;<?=$model->name?></legend>    
     <?php  
     }
    ?>

    <div style="margin-left:270px;">
        <p class="help-block">โปรดกรอกข้อมูลให้ครบทุกช่อง<span class="required">    *</span> </p>
    </div>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldGroup($model, 'name', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
<div class="form-actions" style="margin-left:270px;">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'บันทึก' : 'แก้ไข',
    ));
    ?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'reset', 'label' => 'Reset')
    );
    ?>
</div>
</fieldset>
<?php $this->endWidget(); ?>