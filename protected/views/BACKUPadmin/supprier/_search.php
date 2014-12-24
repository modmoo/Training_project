<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldGroup($model, 'id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php echo $form->textFieldGroup($model, 'idsuppier', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 45)))); ?>

<?php echo $form->textAreaGroup($model, 'name', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

<?php echo $form->textAreaGroup($model, 'tel', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

<?php echo $form->textAreaGroup($model, 'email', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

<?php echo $form->textAreaGroup($model, 'address', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

    <?php echo $form->textAreaGroup($model, 'contact', array('widgetOptions' => array('htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'span8')))); ?>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
