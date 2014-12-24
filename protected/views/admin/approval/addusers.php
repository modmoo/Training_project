<?php
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/front/sweetalert/sweet-alert.js');
//$cs->registerScriptFile($baseUrl.'/uploadify/myuploadify.js');
$cs->registerCssFile($baseUrl . '/front/sweetalert/sweet-alert.css');
?>
<script type="text/javascript">
       var counter_training =1;
       var mynum=0; var mymax=<?=$requestcourse['num']?>;
       var myarray=[];
      $(document).ready(function() {
        $("#removeButton_training").click(function() {
            if (counter_training ==1) {
                alert("ไม่มีข้อมูลที่ลบ");
                return false;
            }
            counter_training--;
            $("#TextBoxDiv_training" + counter_training).fadeOut(300, function() {
                $(this).remove();
            });
        }); 
      }); 
    function gettDatainfoemployee(id) {
        $.ajax({
            url: '<?= Yii::app()->createUrl('admin/approval/getuserinfo') ?>',
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
    function selectDataemployee(id, name,lname) {
        // alert(id+"||"+name);
        if (confirm("คุณเลือกพนักงาน " + name)) {
             createemployee(id,name,lname);
            $('#employeeModal').modal("hide");
        }
    }  
 function createemployee(id,name,lname){
          if (counter_training > 20) {
                alert("มากสุด 20");
                return false;
            }
           var mycheck=seachdep(id);
           if(mycheck){
            swal('Error...!', 'ข้อมูลซ้ำค่ะ!', 'error');
             return false;  
           }
           if(counter_training>=mymax+1){
             swal('Error...!', 'ไม่สามารถเพิ่มเกินจำนวนได้ค่ะ!', 'error');
             return false;  
            }
            var idcourse='<?=$requestcourse['cu_id']?>';
            var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv_training' + counter_training);
            newTextBoxDiv.after().html('<table cellpadding="0" cellspacing="0" width="100%" border="0">' +
                                        '<td width="100">คนที่ ' + counter_training + '</td>' +
                                        '<td width="100">'+name+'</td>'+
                                        '<td width="100">'+lname+'</td>'+
                                        '<td width="100"><input type="hidden" name="radiobutton['+counter_training+']" value="'+id+'/'+idcourse+'"></td>'+
                                        '</tr></tbody></table>');
            newTextBoxDiv.fadeIn("slow").appendTo("#TextBoxesGroup_training");
            counter_training++;
            myarray.push(id);
 }
 function seachdep(key){
     for (i = 0; i < myarray.length; i++) { 
       if(myarray[i]==key){
        return true;
       }
     }
 }
</script>
<?php
//var_dump($modelregis[1]->employee->depart->name);
//var_dump($modelregis);
?>
<div class="row">
    <div class="col-xs-12">
        <div id='mainbox_profile'>
            <div id='proimg'>
                <img src="<?= Yii::app()->baseUrl; ?>/images/uploads/course/<?= $course->image ?>">
            </div>
            <div id='profile'>
                <div class="h_profiles"><h3>เพิ่มผู้เรียน</h3></div>
                <div style="margin-left:5px;">
                    <div class="row clearfix">
                        <div class="col-xs-12 column">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td width="300">
                                            <a href="<?= Yii::app()->createUrl('course_detail&id=').$course->cu_id;?> "> รหัสหลักสูตร: &nbsp;<?= $course->cu_id ?></a> 
                                        </td>
                                        <td>
                                            ชื่อหลักสูตร :&nbsp;<?= $course->name ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            อบรมวันที่ :&nbsp;<?= $course->dayend ?>
                                        </td>
                                        <td>
                                            ต้องการจำนวนผู้สมัคร :&nbsp;<?= $requestcourse['num']; ?>&nbsp;คน
                                        </td>
                                        <td></td>
                                    </tr>

                                <td></td>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div style="clear:both;"></div>		  
        </div> 
        <?php
       // var_dump($requestcourse);
        if($requestcourse!=FALSE){
        ?>
        <div id="my_box_trainning_history">
            <div class="panel panel-default" style="padding:2px;">
                <div class="panel-heading">เพิ่มผู้เรียน</div>
                <div class="panel-body">
                    <form method="post" style="text-align:center;">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="list-group">   
                                <div id="TextBoxesGroup_training"></div>   
                                </div>
                            </div>
                        </div>
                        <button type="submit"  class="btn btn-primary">บันทึกข้อมูล</button> 
                    </form>  
                    <div style="text-align: center;margin-top: 20px;">
                        <button type="button" id="addButton_training" data-toggle="modal" data-target="#employeeModal" class="btn btn-success">เพิ่มผู้อบรม</button> 
                        <button type="button" id="removeButton_training" class="btn btn-danger">ลบผู้อบรม</button>    
                    </div>
                </div>
            </div>
        </div>   
        <?php
        }
        ?>
    </div>
</div><!-- end .row -->
 
<!-- Modal -->
<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">รายชื่อ พนักงาน </h4>
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


    <!-- Modal info  -->
<div class="modal fade" id="myModalinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">ข้อมูลพนักงาน </h4>
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