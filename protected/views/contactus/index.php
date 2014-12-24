<?php
//$baseUrl = Yii::app()->theme->baseUrl;
//$cs = Yii::app()->getClientScript();
//$cs->registerCssFile($baseUrl.'/front/font-awesome/css/font-awesome.min.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/front/font-awesome/css/font-awesome.min.css');
?>
<div style="border: 1px solid #DDDEE2;">
    <div class="row">
        <div class="col-xs-6">
                <h4 style="background:#F7F7F7; height:35px; padding-top: 10px; padding-left: 10px;"> เกี่ยวกับเรา</h4>
        </div>
        
    </div>
    <div class="row">
        <div class="col-xs-6">
           <table width="100%">
                <tr>
                    <td><b>ชื่อบริษัท:</b></td>
                     <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Grad A Company LTD.</td>
                </tr>
                <tr>
                    <td><b>ที่อยู่บริษัท:</b></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123/456 ถนนเจริญนคร แขวงบางลำภูล่าง เขตคลองสาร 10600</td>
                </tr>
                <tr>
                    <td><b>เบอร์โทร:</b></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel: 02-456-7890 &nbsp;&nbsp; Fax: 02-456-7880</td>
                </tr>
                <tr>
                    <td><b>อีเมล์:</b></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GradACompany@hotmail.com</td>
                </tr>
                <tr>
                    <td colspan="2"><div class="col-xs-6 column">
                                                <div style="width:450px; height:100px; overflow:auto;">

              
                                                    <div class="">
                                                        <h4 style="background:#F7F7F7; height:35px; padding-top: 10px; padding-left: 10px;">ประวัติบริษัท :</h4>
                                                        <h5 style="padding-left: 15px;">บริษัท เกรด เอ จำกัด ก่อตั้งขึ้นเมื่อปี พ.ศ. 2523 เป็นบริษัทผู้รับผลิตเวชสำอาง 
                                                            ดูแลผิวแบบครบวงจร ตั้งแตวิจัยคิดค้นสูตรใหม่ โดยผู้เชี่ยวชาญเฉพาะทาง รวมถึงกระบวนการผลิตที่ทันสมัย ปลอดภัยมีมาตรฐาน 
                                                            เพื่อตอบสนองความต้องการของลูกค้าให้เป็นไปตามที่ใจคุณปราถนา

                                                        </h5>           
                                                    </div>
                                                </div>
                                            </div></td>
                                            
                <tr>
                    <td colspan="2"><div class="col-xs-6 column">
                                                <div style="width:450px; height:100px; overflow:auto;">

              
                                                    <div class="">
                                                        <h4 style="background:#F7F7F7; height:35px; padding-top: 10px; padding-left: 10px;">
วิสัยทัศน์ :</h4>
                                                        <h5 style="padding-left: 15px;">บริษัท เกรด เอ จำกัด ต้องการเป็นผู้นำในโลกของธุรกิจความงาม และผลิตภัณฑ์ดูแลผิวพรรณ เพราะเราเชื่อมั่นใจทีมงาน และบริการจากที่ดีที่บริษัทของเรามี โดยเราจะคงไว้ซึ่งคุณค่านี้ตลอดไป

                                                        </h5>           
                                                    </div>
                                                </div>
                                            </div></td>
                                            
                </tr>
            </table>
        </div>
        <div class="col-xs-6">
            <div id="maincontact" class="indent">
    <div class="contact">
        <div class="info">
            <h1>ติดต่อเรา</h1>
        </div>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'usercontactus-form',
                 'enableAjaxValidation' => true,
            ));
      ?>    
        <div class="form">
            <div class="row fixrow_border">
                <div class="col-md-6 border-right">
                    <?= $form->textField($model, 'name', ['class'=>'left half','id' => 'name', 'placeholder' => $model->getAttributeLabel( 'name' ) ] ); ?>
                </div>

                <div class="col-md-6 no-padding-left">
                    <?= $form->textField($model, 'to', ['class'=>'left half','id' => 'to', 'placeholder' => $model->getAttributeLabel( 'to' ) ] ); ?>
                  
                </div>
            </div>

            <div class="row indent fixrow_border">
                    <?= $form->textField($model, 'email', ['class'=>'left half','id' => 'email', 'placeholder' => $model->getAttributeLabel('email') ] ); ?>
       
            </div>

            <div class="row indent fixrow_border">
               <?php echo $form->textArea($model, 'detail', array('rows' => '3','class'=>'full','style' => 'margin-bottom: 5px;', 'class' => 'form-control', 'encode' => false, 'value' => '', 'placeholder' =>$model->getAttributeLabel('detail'))); ?>
            </div>
            <button type="submit">
                <i class="fa fa-envelope-o"></i>
                <span>Send</span>
            </button>
            <div class="additional">
            </div>
        </div>
    <?php $this->endWidget(); ?>
    </div>
     <div>
<?= $form->errorSummary($model, null, null, [ 'class' => 'alert alert-danger' ] ); ?>
<?php if ( Yii::app()->user->hasFlash( 'success' ) ): ?>
 <div class="alert alert-success">
 <?= Yii::app()->user->getFlash( 'success' ); ?>
 </div>
<?php endif; ?> 
     </div>
</div>
        </div>
    </div>

    
</div>