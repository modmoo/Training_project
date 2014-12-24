<div class="row">
    <div class="col-xs-12">
        <div id='mainbox_profile'>
            <!-- <div id='proimg'>
                  <img src="front/images/111.jpg" >
            </div>-->
            <div id='profile' >
                <div class="h_profiles" style="width: 400px;"><h4><i class="fa fa-envelope-o"></i>&nbsp;หลักสูตรเรียนรอการอณุมัติแผนก&nbsp;<?=dataweb::getlabeldepartmanets(Yii::app ()->user->getdepartments())?></h4></div>
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
                                            <td width="100"><a  class="btn btn-success glyphicon glyphicon-pencil" href="<?= Yii::app()->createUrl('admin/approval/main', array('id' => $value['cu_id'])) ?>"> อณุมัติคอร์ส</a></td>
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