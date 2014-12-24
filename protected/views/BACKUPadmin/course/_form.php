<?php
$baseUrl = Yii::app()->theme->baseUrl;
//$cs = Yii::app()->getClientScript();
//$cs->registerScriptFile($baseUrl . '/datepicker/js/bootstrap-datepicker.js');
//$cs->registerScriptFile($baseUrl . '/datepicker/js/bootstrap-datetimepicker.min.js');
//$cs->registerCssFile($baseUrl . '/datepicker/css/datepicker.css');
//$cs->registerCssFile($baseUrl . '/datepicker/css/bootstrap-datetimepicker.min.css');
?>
<script type="text/javascript">
        var counter_training = 2;
        var counter_training_staf =1;
    $(document).ready(function() {
 
  $( "#optionssupprier1").click(function() {
      $('#boxisupprier').fadeOut('fast');  
      $("#boxonisupprier").slideDown("slow",function(){  
      });
    /*$("#boxonisupprier").fadeIn(700, function() {
       $('#boxisupprier').fadeOut(700); 
    }); */  
   });  
  $( "#optionssupprier2").click(function() {
      $('#boxonisupprier').fadeOut('fast');   
      $("#boxisupprier").slideDown("slow",function(){ 
      });
   });  
        $("#addButton_training").click(function() {
            if (counter_training > 20) {
                alert("มากสุด 20");
                return false;
            }
            var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv_training' + counter_training);
            newTextBoxDiv.after().html('<table cellpadding="0" cellspacing="0" style="margin: 0 auto 0 10%;" border="0">' +
                    '<tr>' +
                    '<td>วันที่ ' + counter_training + '</td>' +
                    '<td><div class="form-group">' +
                    '<div class="input-group"><span class="input-group-addon">' +
                    '<i class="glyphicon glyphicon-calendar"></i></span>' +
                    '<input style="width:100px;" class="form-control ct-form-control" type="text"' +
                    'placeholder="2014-01-01" name="day[]" id="">' +
                    '</div></div></td>' +
                    '<td>เวลา</td>' +
                    '<td> <div class="form-group">' +
                    '<div class="input-group date form_time col-md-8">' +
                    '<input style="width:100px;"  class="form-control" type="text" placeholder="12:00" name="timestart[]" value="">' +
                    '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>' +
                    '</div></div></td><td>ถึง</td>' +
                    '<td> <div class="form-group">' +
                    '<div class="input-group date form_time col-md-8" data-date="" data-date-format="hh:ii">' +
                    '<input style="width:100px;" class="form-control" type="text" placeholder="12:00" name="timeend[]" value="">' +
                    '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>' +
                    '</div> </div></td></tr><tr>' +
                    '<td colspan="6">' +
                    '<textarea rows="3" class="form-control" placeholder="รายละเอียดการสอน" name="detailTraining[]"></textarea>' +
                    '</td> </tr></table>');
            newTextBoxDiv.fadeIn("slow").appendTo("#TextBoxesGroup_training");
            counter_training++;
        });
        $("#removeButton_training").click(function() {
            if (counter_training == 2) {
                alert("ไม่มีข้อมูลที่ลบ");
                return false;
            }
            counter_training--;
            $("#TextBoxDiv_training" + counter_training).fadeOut(300, function() {
                $(this).remove();
            });
        }); 
      $("#removeButton_training_staf").click(function() {
            if (counter_training_staf ==1) {
                alert("ไม่มีข้อมูลที่ลบ");
                return false;
            }
            counter_training_staf--;
            $("#TextBoxDiv_training_staf" + counter_training_staf).fadeOut(300, function() {
                $(this).remove();
            });
        }); 
        $("#getButtonValue_training").click(function() {
            var msg = '';
            for (i = 1; i < counter_training; i++) {
                msg += "\n Textbox #" + i + " : " + $('#textbox_training' + i).val();
            }
            alert(msg);
        });
        $("#Course_dayclose").change(function() {
         //  var day = daydiff(parseDate($('#Course_dayopencoure').val()), parseDate($(this).val()));
        var day=mydateDiff($('#Course_dayopencoure').val(),$(this).val()); 
        $('#Course_time').val(day.d);
        $('#timetotal').val(day.d);
        });
    });
function mydateDiff( str1, str2 ) {
    var diff = Date.parse( str2 ) - Date.parse( str1 ); 
    return isNaN( diff ) ? NaN : {
        diff : diff,
        ms : Math.ceil( diff            % 1000 ),
        s  : Math.ceil( diff /     1000 %   60 ),
        m  : Math.ceil( diff /    60000 %   60 ),
        h  : Math.ceil( diff /  3600000 %   24 ),
        d  : Math.ceil( diff / 86400000        )
    };
}
    function parseDate(str) {
        var mdy = str.split('-');
        return new Date(mdy[2], mdy[1] - 1, mdy[0]);
    }
    function daydiff(first, second) {
        return (second - first) / (1000 * 60 * 60 * 24);
    }
    function selectDataemployee(id, name) {
        // alert(id+"||"+name);
        if (confirm("คุณเลือก พนักงาน  " + name)) {
            createemployee(id);
           // $("#Course_supprier_id").val(id);
           // $("#isupprier_id").val(id);
           $('#employeeModal').modal("hide");
        }
        // $("#data-info .info").html(name);
        // ;
    }   
 function createemployee(id){
        if (counter_training_staf> 20) {
                alert("มากสุด 20");
                return false;
            }
            var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv_training_staf' + counter_training_staf);
            newTextBoxDiv.after().html('<div class="form-group">'+
                    '<label class="col-sm-3 control-label">ผู้ดูแลคอร์สคนที่ '+counter_training_staf+'</label>'+
                    '<div class="col-sm-9"><input style="width:250px;" class="form-control" placeholder="ผู้ดูแลคอร์ส" id="my_id_staf'+counter_training_staf+'" value="'+id+'"name="id_staf[]" type="text">'+
                    '</div></div>');
            newTextBoxDiv.fadeIn("slow").appendTo("#TextBoxesGroup_training_staf");
            counter_training_staf++;
 }
</script>
<script type="text/javascript">
    function selectData(id, name) {
        // alert(id+"||"+name);
        if (confirm("คุณเลือก supprier " + name)) {
            $("#Course_supprier_id").val(id);
            $("#isupprier_id").val(id);
            $('#myModal').modal("hide");
        }
        // $("#data-info .info").html(name);
        // ;
    }
    function gettDatainfo(id) {
        $.ajax({
            url: '<?= Yii::app()->createUrl('admin/course/getSupprier') ?>',
            type: 'POST',
            cache: false, data: {id: id},
            beforeSend: function() {
            },
            success: function(html) {
                $("#datasup").empty().html(html);
                $("#myModalinfo").modal("show");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus + "ajaxloadcontent");
            }
        });
    }
    function gettDatainfoemployee(id) {
        $.ajax({
            url: '<?= Yii::app()->createUrl('admin/course/getSupprier') ?>',
            type: 'POST',
            cache: false, data: {id: id},
            beforeSend: function() {
            },
            success: function(html) {
                $("#dataemployee").empty().html(html);
                $("#myModalinfoemployee").modal("show");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus + "ajaxloadcontent");
            }
        });
    }

</script>
<?php
Yii::app()->clientScript->registerScript('uid', "
   
");
?>
<?php
Yii::app()->clientScript->registerScript('yiijqform', "
    var Course_dayopencoure='',Course_dayclose='';
   function myAfterValidateFunction(form, data, hasError){
       Course_dayopencoure=$('#Course_dayopencoure').val();
       Course_dayclose=$('#Course_dayclose').val();
      // console.log(typeof $('#my_id_staf1').val()==='undefined');
       if(Course_dayopencoure==''){
        swal('Error...!', 'วันที่เปิดรับสมัครหลักสูตรไม่ควรเป็นค่าว่าง!', 'error');
        $('#Course_dayopencoure').focus();
        return false;
       }else if(Course_dayclose==''){
        swal('Error...!', 'วันที่ปิดรับสมัครหลักสูตรไม่ควรเป็นค่าว่าง!', 'error');
        $('#Course_dayclose').focus();
        return false;
       }else if((new Date(Course_dayopencoure).getTime()>new Date(Course_dayclose).getTime())){
        swal('Error...!', 'วันที่เปิดรับสมัครหลักสูตรไม่ควรมากกว่าวันที่ปิดรับสมัครหลักสูตรค่ะ!', 'error');
        $('#Course_dayopencoure').focus();
         return false;
       }else if(typeof $('#my_id_staf1').val()==='undefined'){
         swal('Error...!', 'ต้องกำหนดผู้ดูแลหนักสูตรอย่างน้อย 1 คนค่ะ!', 'error');
        $('#addButton_training_staf').focus();
         return false;
       }else if($('#mydayfirst').val()=='' || $('#mydayfirsttime').val()=='' || $('#mydaytwottime').val()=='' || $('#mydaydetail').val()==''){
        swal('Error...!', 'กรอกข้อมูลวันจัดอบรมอย่างน้อย 1 วันค่ะ!', 'error');
       // $('#mydayfirst').focus();
         return false;
       }
      return true;
   }
       
", CClientScript::POS_HEAD);
?>
<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'course-form',
    'enableAjaxValidation' => true, 
    'type' => 'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>false,
        'beforeValidate'=>'js:myAfterValidateFunction'
    ),
    'htmlOptions' => array('class' => 'well', 'enctype' => 'multipart/form-data'
    )
        ));
?>
<fieldset>
    <div style="text-align: center;padding-right: 40%;">
        <p class="help-block">โปรดกรอกข้อมูลให้ครบทุกช่อง<span class="required">    *</span> </p>
    </div>
    <?php
    $mylist = Categorycourse::getTypescourse();
    $listcat = CHtml::listData($mylist, 'id', 'name');
    // $Catlist = CHtml::listData(CategoryNews::getmenu(), 'cn_id', 'cn_name');
    //var_dump($listcat);
    ?>
    <div class="well">
        <?php echo $form->switchGroup($model, 'active', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')), array('events' => array('switchChange' => 'js:function(event, state){console.log(this);consold.log(event);console.log(state)}')))); ?>  
        <?php echo $form->errorSummary($model); ?>
        <?php
         $mytrue=TRUE;
         if(!$model->isNewRecord){
         $mytrue=FALSE;   
         }
        ?>
        <input type="hidden" name="timetotal" id="timetotal">
        <input type="hidden" name="pricecourse" id="pricecourse">
        <?php echo $form->textFieldGroup($model, 'cu_id', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;', 'disabled' =>$mytrue)))); ?>
        <?php echo $form->textFieldGroup($model, 'name', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>
        <?php //echo $form->radioButtonListGroup($model, 'categorycourse', array('widgetOptions' => array('data' => $listcat))); ?><!--'  คอมพิวเตอร์', ' จป.วิชาชีพ', ' ควบคุมคุณภาพ ISO', '  การตลาด', ' บัญชี', ' พนักงานใหม่'-->   
        <?php echo $form->dropDownListGroup($model, 'categorycourse', array('widgetOptions' => array('data' => $listcat, 'htmlOptions' => array('prompt' => 'เลือกประเภท course', 'style' => 'width:250px;')))); ?> 
        <?php echo $form->fileFieldGroup($model, 'image', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:190px;')))); ?>
        <?php echo $form->datePickerGroup($model, 'dayopencoure', array('widgetOptions' => array('options' => array(), 'htmlOptions' => array('style' => 'width:200px;')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>')); ?>
        <?php echo $form->datePickerGroup($model, 'dayclose', array('widgetOptions' => array('options' => array(), 'htmlOptions' => array('style' => 'width:200px;')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>')); ?>
        <?php echo $form->textFieldGroup($model, 'time', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:170px;')))); ?>
        <?php echo $form->textAreaGroup($model, 'location', array('widgetOptions' => array('htmlOptions' => array('rows' => 3, 'style' => 'width:300px;')))); ?>
        <?php echo $form->radioButtonListGroup($model, 'typelocation', array('widgetOptions' => array('data' => array(' ภายใน', ' ภายนอก')))); ?>
        <?php echo $form->textAreaGroup($model, 'discription', array('widgetOptions' => array('htmlOptions' => array('rows' => 3, 'style' => 'width:300px;')))); ?>
        <?php echo $form->textFieldGroup($model, 'num_max', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:120px;')))); ?>
        <?php echo $form->textFieldGroup($model, 'price', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:100px;')))); ?>
        <div class="form-group">
        <div class="col-sm-3">
        </div>
        <button type="button" style="margin-left: 5px;" data-toggle="modal" data-target="#costModal" class="btn btn-info">คำนวณราคาคอร์ส </button>
        </div>
        <div id="TextBoxesGroup_training_staf">
               </div>   
        <div style="text-align: center;padding-right: 40%;">
            <button type="button" id="addButton_training_staf" class="btn btn-primary glyphicon glyphicon-plus" data-toggle="modal" data-target="#employeeModal">&nbsp;เพิ่มผู้ดูแลคอร์ส</button>    
            <button type="button" id="removeButton_training_staf" class="btn btn-danger glyphicon glyphicon-minus">&nbsp;ลบผู้ดูแลคอร์ส</button>
        </div> 
    </div>
    <div class="well">
        <legend>เพิ่มข้อมูลวันจัดอบรม</legend>
                   <!-- <tr>
                        <td>วันที่ 1</td> 
                        <td><input style="width:100px;" class="form-control" placeholder="วันที่" name="Course[price]" id="Course_price" type="text"></td> 
                        <td>เวลา</td> 
                        <td><input style="width:100px;" class="form-control" placeholder="เวลา" name="Course[price]" id="Course_price" type="text"></td>
                        <td>ถึง</td>
                        <td><input style="width:100px;" class="form-control" placeholder="ถึงวันที่" name="Course[price]" id="Course_price" type="text"></td>
                    </tr> 
                 <tr>
                     <td colspan="6">
                 <textarea rows="3" class="form-control" placeholder="รายละเอียดการสอน" name="Course[discription]" id="Course_discription"></textarea>
                  </td> </tr>-->
        <div id="TextBoxesGroup_training">
            <div id="TextBoxDiv_training1">
                <table cellpadding="0" cellspacing="0" style="margin: 0 auto 0 10%;" border="0">  
                    <tr>
                        <td>วันที่ 1</td> 
                        <td>
                            <div class="form-group">
                                <div class="input-group"><span class="input-group-addon">
                                        <i class="glyphicon glyphicon-calendar"></i></span>
                                    <input style="width:100px;" id="mydayfirst" class="form-control ct-form-control" type="text"
                                           placeholder="2014-01-01" name="day[]">
                                </div>
                            </div>
                        </td> 
                        <td>เวลา</td> 
                        <td>
                            <div class="form-group">
                                <div class="input-group date form_time col-md-8" data-date="" data-date-format="hh:ii"  data-link-format="hh:ii">
                                    <input style="width:100px;" id="mydayfirsttime" class="form-control" type="text" placeholder="12:00" name="timestart[]" value="">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                </div>
                            </div>
                        </td>
                        <td>ถึง</td>
                        <td>
                            <div class="form-group">
                                <div class="input-group date form_time col-md-8" data-date="" data-date-format="hh:ii"  data-link-format="hh:ii">
                                    <input style="width:100px;" id="mydaytwottime" class="form-control" type="text" placeholder="12:00" name="timeend[]" value="">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                </div>
                            </div>
                        </td>
                    </tr> 
                    <tr>
                        <td colspan="6">
                            <textarea rows="3"  id="mydaydetail" class="form-control" placeholder="รายละเอียดการสอน" name="detailTraining[]"></textarea>
                        </td> </tr>
                </table>   
            </div>
        </div>
        <div style="text-align: center;padding-right: 40%;">
            <button type="button" id="addButton_training" class="btn btn-primary glyphicon glyphicon-plus">&nbsp;เพิ่มวันจัดอบรม</button>    
            <button type="button" id="removeButton_training" class="btn btn-danger glyphicon glyphicon-minus">&nbsp;ลบวันจัดอบรม</button>
        </div>

    </div>
    <div class="well">
<div class="form-group">
<label class="col-sm-3 control-label">วิทยากร</label>
<div class="col-sm-9"><span id="Course_typelocation">
<label class="radio"><input  value="0" type="radio" name="optionssupprier1" id="optionssupprier1">ไม่มี บริษัทรับจัดอบรม</label>
<label class="radio"><input  value="1" type="radio" name="optionssupprier1" id="optionssupprier2">มี บริษัทรับจัดอบรม</label>
</span></div></div>
        <div id='boxonisupprier' style="display: none;">
          <?php echo $form->textFieldGroup($model, 'trainer', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:250px;')))); ?>    
        </div>
          <div id='boxisupprier'style="display: none;">
        <?php echo $form->textFieldGroup($model, 'supprier_id', array('widgetOptions' => array('htmlOptions' => array('style' => 'width:100px;', 'disabled' => true)))); ?>
        <input type="hidden" id="isupprier_id" name="isupprier_id">
        <div class="form-group">
            <label class="col-sm-3 control-label">
            </label>
            <div class="col-sm-9">
                <?php
                $this->widget(
                        'booster.widgets.TbButton', array(
                    'label' => 'ค้นหาบริษัทรับจัดอบรม',
                    'context' => 'primary',
                    'htmlOptions' => array(
                        'data-toggle' => 'modal',
                        'data-target' => '#myModal',
                    ),
                        )
                );
                ?>
            </div></div> 
        </div> 
    </div>
</fieldset>
<div class="well form-actions" style="text-align: center;padding-right: 40%;">
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">รายชื่อ บริษัทรับจัดอบรม </h4>
            </div>
            <div class="modal-body">
                <?php echo $this->renderPartial('Supprier', array('model' => $supprier)); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal info  -->
<div class="modal fade" id="myModalinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">รายชื่อบริษัทรับจัดอบรม </h4>
            </div>
            <div class="modal-body">
                <div id="datasup"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 
<!-- Modal -->
<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">รายชื่อพนักงานแผนกทรัพยากรมนุษย์</h4>
            </div>
            <div class="modal-body">
                <?php echo $this->renderPartial('employee', array('model' => $employee)); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal info empoyee  -->
<div class="modal fade" id="myModalinfoemployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">ข้อมูลพนักงาน </h4>
            </div>
            <div class="modal-body">
            <div id="dataemployee"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 

<!-- Modal cost -->
<div class="modal fade" id="costModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">รายการค่าใช้จ่าย</h4>
            </div>
            <div class="modal-body">
                <?php echo $this->renderPartial('costinfo', array('cost' =>$cost)); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
