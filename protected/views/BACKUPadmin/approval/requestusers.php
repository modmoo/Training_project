<div class="row">
    <div class="col-xs-12">
        <div id='mainbox_profile'>
            <div id='profile' >
                <div class="h_profiles" style="width: 400px;"><h4><i class="fa fa-envelope-o"></i>&nbsp;รายการหลักสูตรเพิ่มผู้เรียนแผนก&nbsp;<?=dataweb::getlabeldepartmanets(Yii::app ()->user->getdepartments())?></h4></div>
                <div style="margin-left:5px;">
                    <div class="row clearfix">
                        <div class="col-xs-12 column">
                            <table class="table table-striped">
                                <tbody>
                                    <?php
                                    foreach ($data as $value) {
                                        ?>
                                        <tr>
                                            <td width="100">  Course ID: &nbsp;<?= $value['cu_id'] ?></td>
                                            <td width="100"> Course Name:<?= $value['name'] ?></td>		
                                            <td width="100"><a  class="btn btn-success glyphicon glyphicon-pencil" href="<?= Yii::app()->createUrl('admin/approval/addusers', array('id' => $value['cu_id'])) ?>"> เพิ่มผู้เรียน</a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div style="clear:both;"></div>		  
        </div> 
    </div> 
</div> 