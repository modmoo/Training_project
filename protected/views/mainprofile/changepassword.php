<?php $this->setPageTitle('ประวัติการทำงาน');
 //var_dump($modelchange->getAttributeLabel('olduser'));
?>
 <style type="text/css">
    @charset "utf-8";
    Ch_user_pass {
        border: none;
        font-family: inherit;
        font-size: inherit;
        font-weight: inherit;
        line-height: inherit;
        -webkit-appearance: none;

    }

    /* ---------- LOGIN ---------- */

    #Ch_user_pass {
        margin: 20px auto;
        width: 400px;
    }

    #Ch_user_pass h4 {
        background: #428bca;;
        border-radius: 20px 20px 0 0;
        color: #fff;
        font-size: 20px;
        padding: 20px 26px;
        margin-bottom: 0;
    }

    #Ch_user_pass h4 span[class*="fontawesome-"] {
        margin-right: 14px;
    }

    #Ch_user_pass fieldset {
        background: #f5f5f5;
        border-radius: 0 0 20px 20px;
        padding: 20px 26px;
    }

    #Ch_user_pass fieldset p {
        color: #777;
        margin-bottom: 14px;
    }

    #Ch_user_pass fieldset p:last-child {
        margin-bottom: 0;
    }

    #Ch_user_pass fieldset input {
        border-radius: 0px;
    }

    #Ch_user_pass fieldset input[type="text"], #Ch_user_pass fieldset input[type="password"] {
        /*background: #eee;*/
        color: #777;
        padding: 4px 10px;
        width: 328px;
    }

    #Ch_user_pass fieldset input[type="submit"] {
        background: #428bca;
        color: #fff;
        display: block;
        margin: 0 auto;
        padding: 4px 0;
        width: 120px;
        border-radius: 4px;
        border: 0px;
        padding: 10px;
    }

    #Ch_user_pass fieldset input[type="submit"]:hover {
        background: #428bca;
    }
</style>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <!--- div profiles--->
                <div id='mainbox_profile'>
                    <div id='proimg'>
                        <img src="<?= Yii::app()->baseUrl; ?>/images/uploads/employee/<?= $model->image; ?>">
                    </div> 
                    <div id='profile' style="min-height: 470px;">
                        <div style="margin-left:5px;">
                            <div class="row clearfix">
                                <div class="col-xs-12 column">
                                    <div style="margin-top: 5px;"></div>
                                  <div id="Ch_user_pass">
                                      <h4 style="text-align: center"><span class="fontawesome-lock"></span>เปลี่ยน Password</h4>
 <fieldset>  
<?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'user-changepassword-form',
                 'enableAjaxValidation' => true,
            ));
?>    
<?= $form->errorSummary($modelchange, null, null, [ 'class' => 'alert alert-danger' ] ); ?>
 
<?php if ( Yii::app()->user->hasFlash( 'success' ) ): ?>
 <div class="alert alert-success">
 <?= Yii::app()->user->getFlash( 'success' ); ?>
 </div>
<?php endif; ?>   
<p><?= $form->textField($modelchange, 'oldpassword', [ 'password' => 'UserName', 'placeholder' => $modelchange->getAttributeLabel( 'oldpassword' ) ] ); ?></p>   
<p><?= $form->textField($modelchange, 'newpassword', [ 'id' => 'UserName', 'placeholder' => $modelchange->getAttributeLabel( 'newpassword' ) ] ); ?></p>   
<p><?= $form->textField($modelchange, 'renewpassword', [ 'id' => 'UserName', 'placeholder' => $modelchange->getAttributeLabel( 'renewpassword' ) ] ); ?></p>   
<?= CHtml::submitButton( 'บันทึกข้อมูล', [ 'class' => 'btn btn-default' ] ); ?>
<?php $this->endWidget(); ?>
</fieldset>   
</div> <!-- end login -->  
 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>		  
                </div> 
            </div>
        </div><!-- end .row -->
        <p class="pull-right"><a href="#">Back to top</a></p>
    </div>
</div>