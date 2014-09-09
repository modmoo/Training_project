<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'RegisterForm',
);
?>

<h1> Register </h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Register-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ep_username'); ?>
		<?php echo $form->textField($model,'ep_username'); ?>
		<?php echo $form->error($model,'ep_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ep_password'); ?>
		<?php echo $form->textField($model,'ep_password'); ?>
		<?php echo $form->error($model,'ep_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ep_cp_id'); ?>
		<?php echo $form->textField($model,'ep_cp_id',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'ep_cp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ep_sex'); ?>
		<?php echo $form->textField($model,'ep_sex',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ep_sex'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'ep_tel'); ?>
		<?php echo $form->textField($model,'ep_tel'); ?>
		<?php echo $form->error($model,'ep_tel'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'ep_department'); ?>
		<?php echo $form->textField($model,'ep_department'); ?>
		<?php echo $form->error($model,'ep_department'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'ep_start_date'); ?>
		<?php echo $form->textField($model,'ep_start_date'); ?>
		<?php echo $form->error($model,'ep_start_date'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'ep_birtthday'); ?>
		<?php echo $form->textField($model,'ep_birtthday'); ?>
		<?php echo $form->error($model,'ep_birtthday'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'ep_degree'); ?>
		<?php echo $form->textField($model,'ep_degree'); ?>
		<?php echo $form->error($model,'ep_degree'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'ep_address'); ?>
		<?php echo $form->textField($model,'ep_address'); ?>
		<?php echo $form->error($model,'ep_address'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'ep_email'); ?>
		<?php echo $form->textField($model,'ep_email'); ?>
		<?php echo $form->error($model,'ep_email'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'ep_user_type'); ?>
		<?php echo $form->textField($model,'ep_user_type'); ?>
		<?php echo $form->error($model,'ep_user_type'); ?>
	</div>
			<div class="row">
		<?php echo $form->labelEx($model,'ep_active'); ?>
		<?php echo $form->textField($model,'ep_active'); ?>
		<?php echo $form->error($model,'ep_active'); ?>
	</div>
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>