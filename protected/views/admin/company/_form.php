<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'company-form',
    'enableAjaxValidation' => false, 'type' => 'horizontal',
    'htmlOptions' => array('class' => 'well', 'enctype' => 'multipart/form-data')
        ));
?>

<fieldset>
    <div style="margin-left:270px;">
        <p class="help-block">โปรดกรอกข้อมูลให้ครบทุกช่อง<span class="required">    *</span> </p>
    </div>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldGroup($model, 'name', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
    <?php echo $form->textFieldGroup($model, 'tel', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
    <?php echo $form->textFieldGroup($model, 'email', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?> 
    <?php echo $form->textAreaGroup($model, 'address', array('widgetOptions' => array('htmlOptions' => array('rows' => 3, 'style' => 'width:250px;')))); ?>
    <?php echo $form->textFieldGroup($model, 'fax', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:150px;')))); ?>
    <?php echo $form->textAreaGroup($model, 'discription', array('widgetOptions' => array('htmlOptions' => array('rows' => 3, 'style' => 'width:250px;')))); ?>
</fieldset>
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

<?php $this->endWidget(); ?>
 