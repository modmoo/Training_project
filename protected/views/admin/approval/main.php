<script type="text/javascript">
    function gettDatainfo(id,cat) {
        $.ajax({
            url: '<?= Yii::app()->createUrl('admin/approval/getusers') ?>',
            type: 'POST',
            cache: false, data: {id: id,cat:cat},
            beforeSend: function() {
            },
            success: function(html) {
                $("#datasup").empty().html(html);
                $("#myModal").modal("show");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus + "ajaxloadcontent");
            }
        });
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
                <div class="h_profiles"><h3>รายชื่อผู้ร้องขอเข้าอบรม</h3></div>
                <div style="margin-left:5px;">
                    <div class="row clearfix">
                        <div class="col-xs-12 column">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td width="300">
                                            <a href="#"> รหัสหลักสูตร: &nbsp;<?= $course->cu_id ?></a> 
                                        </td>
                                        <td>
                                            ชื่อหลักสูตร :&nbsp;<?= $course->name ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            สิ้นสุดการสมัครเมื่อ :&nbsp;<?= $course->dayend ?>
                                        </td>
                                        <td>
                                            จำนวนผู้สมัคร :&nbsp;<?= CourseRegister::model()->checkmax($course->cu_id) ?>&nbsp;คน
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
        <div id="my_box_trainning_history">
            <div class="panel panel-default" style="padding:2px;">
                <div class="panel-heading">รอการอนุมัติ</div>
                <div class="panel-body">
                    <form method="post" style="text-align:center;">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="list-group">
                                <table class="table table-striped">
                                    <thead>
                                        <tr height="50" style="background:#428BCA;color:#fff; padding-top:2px;padding-bottom:2px; height:50px;">
                                            <th>::ID :: </th>
                                            <th>::First Name:: </th>
                                            <th>::Last Name::</th>
                                            <th> : : อนุมัติ : :</th>
                                            <th> : : ไม่อนมัติ : :</th>
                                            <th> : : หมายเหตุ: :</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $oldid = "";
                                        $i = 0;
                                        foreach ($modelregis as $key => $value) {
                                            $i++;
                                            ?>
                                        <tr>  
                                           <td width="100"> <a href="#"><?=$value->employee->idemployee?></a></td>
                                                <td width="100"> <?=$value->employee->firstname?></td>
                                                <td width="100"> <?=$value->employee->lastname?></td>
                                                <td width="100"><input type="radio" name="radiobutton[<?=$i?>]" value="1-<?=$value->id?>"></td>
                                                <td width="100"><input type="radio" name="radiobutton[<?=$i?>]" value="0-<?=$value->id?>"></td>
                                                <td width="100"><input type="text" name="remark[<?=$i?>][<?=$value->id?>]"></td>
                                                <td width="100"><button type="button" title="ประวัติ" onclick="gettDatainfo(<?=$value->id?>,<?=$course->categorycourse?>);" class="btn btn-info">ประวัติ</button></td>
                                            </tr>                  
                                            <?php
                                        }
                                        ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    <?php
                     if(count($modelregis)>0){
                         ?>
                       <button type="submit"  class="btn btn-primary">Save</button> 
                      <?php  
                     }
                    ?>  
                  </form>   
                </div>
            </div>
        </div> 
        <div>
            <?php
            $this->widget('CLinkPager', array(
                'header' => 'หน้า',
                'firstPageLabel' => 'หน้าแรกสุด',
                'prevPageLabel' => 'หน้าก่อนหน้านี้',
                'nextPageLabel' => 'หน้าต่อไป',
                'lastPageLabel' => 'หน้าสุดท้าย',
                'pages' => $pages
            ));
            ?>  
        </div>	  
    </div>
</div><!-- end .row -->
<!-- Modal cost -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">ประวัติการอบรม</h4>
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
 