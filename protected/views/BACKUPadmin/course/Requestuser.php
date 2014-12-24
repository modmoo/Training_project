<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'requestuser-form',
    'enableAjaxValidation' => true, 'type' => 'horizontal',
    'htmlOptions' => array('class' => 'well', 'enctype' => 'multipart/form-data')
        ));
?>
<fieldset>
    <div style="margin-left:270px;">
        <p class="help-block">โปรดกรอกข้อมูลให้ครบทุกช่อง<span class="required">    *</span> </p>
    </div>
    <?php echo $form->errorSummary($model); ?>
    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <?php echo $form->dropDownListGroup($model, 'todapt', array('wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'widgetOptions' => array('data' => dataweb::getdepartmanets(), 'htmlOptions' => array('prompt' => 'เลือกแผนก', 'style' => 'width:250px;')))); ?>
    <?php echo $form->textFieldGroup($model, 'num', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
    <?php //echo $form->textFieldGroup($model, 'idcourse', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:150px;')))); ?>
    <input type="hidden" name="idcourse" value="<?= $_GET['id'] ?>">
    <?php echo $form->textAreaGroup($model, 'note', array('widgetOptions' => array('htmlOptions' => array('rows' => 3, 'style' => 'width:250px;')))); ?>
</fieldset>
<div class="form-actions" style="margin-left:270px;">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'เพิ่มผู้อบรม' : 'แก้ไขผู้อบรม',
    ));
    ?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'reset', 'label' => 'Reset')
    );
    ?>
</div>

<?php $this->endWidget(); ?>
