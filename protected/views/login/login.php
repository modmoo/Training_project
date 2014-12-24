<div class="form-box" id="login-box">
    <div class="header">Sign In</div>
    <div class="form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>
        <div class="body bg-gray">
            <p class="note">Fields with <span class="required">*</span> are required.</p>
            <div class="form-group">
                <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'value' => '', 'placeholder' => $model->getAttributeLabel('username'))); ?>
                <?php echo $form->error($model, 'username'); ?> 
            </div>
            <div class="form-group">
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'value' => '', 'placeholder' => $model->getAttributeLabel('password'))); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>          
            <div class="form-group">
                <?php echo $form->checkBox($model, 'rememberMe'); ?>
                <?php echo $form->label($model, 'rememberMe'); ?>
                <?php echo $form->error($model, 'rememberMe'); ?>
            </div>
        </div>
        <div class="footer">                                                               
            <?php echo CHtml::submitButton('Sign me in', array('class' => 'btn bg-olive btn-block')); ?>
        <!--    <p><a href="#">I forgot my password</a></p>
            <a href="#" class="text-center">Register a new membership</a> -->
        </div>
        <?php $this->endWidget(); ?>
    </div><!-- form -->

</div>
