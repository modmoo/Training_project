<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'check-course-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model, 'check', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 2)))); ?>

<?php echo $form->datePickerGroup($model, 'day', array('widgetOptions' => array('options' => array(), 'htmlOptions' => array('class' => 'span5')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 'append' => 'Click on Month/Year to select a different Month/Year.')); ?>

<?php echo $form->textFieldGroup($model, 'course_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

    <?php echo $form->textFieldGroup($model, 'employee_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
