  <?php if (Yii::app()->user->hasFlash('error')):  ?>
          <div class="alert in fade alert-danger">
          <?= Yii::app()->user->getFlash('error'); ?>
          </div>
     <?php endif; ?>
<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'supprier-form',
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
    <legend class="mylegend"><i class="glyphicon glyphicon-plus"></i>เพิ่มข้อมูลบริษัท / วิทยากร</legend>
     <?php  
     }else{
       ?>
       <legend class="mylegend"><i class="glyphicon glyphicon-pencil"></i>แก้ไขข้อมูลบริษัท / วิทยากร&nbsp;<?=$model->name?></legend>    
     <?php  
     }
    ?>
    <div style="margin-left:270px;">
        <p class="help-block">โปรดกรอกข้อมูลให้ครบทุกช่อง<span class="required">    *</span> </p>
    </div>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldGroup($model, 'idsuppier', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;', 'disabled' => true)))); ?>
    <?php echo $form->textFieldGroup($model, 'name', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
    <?php echo $form->fileFieldGroup($model, 'image', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
    <?php echo $form->textFieldGroup($model, 'tel', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:150px;')))); ?>
    <?php echo $form->textFieldGroup($model, 'email', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:150px;')))); ?>
    <?php echo $form->textAreaGroup($model, 'address', array('widgetOptions' => array('htmlOptions' => array('rows' => 3, 'style' => 'width:250px;')))); ?>
    <?php echo $form->textFieldGroup($model, 'contact', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
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
