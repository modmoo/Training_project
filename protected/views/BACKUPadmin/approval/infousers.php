<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <div id='mainbox_profile'>
                    <div id='proimg'>
                        <img  style="height: 200px;width: 200px;"src="<?=Yii::app()->baseUrl;?>/images/uploads/employee/<?=$model->image?>" >
                    </div>
                    <div id='profile' style="width: auto;">
                        <div class="h_profiles"><h4>รายละเอียด พนักงาน</h4></div>
                        <div style="margin-left:5px;">
                            <div class="row clearfix">
                                <div class="col-xs-12 column">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td >
                                                    ID: &nbsp;<?= $model->idemployee ?> 
                                                </td>
                                                <td>
                                                    ชื่อ : &nbsp; <?= $model->firstname ?>&nbsp;-&nbsp;<?= $model->lastname ?> 	
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    เบอร์โทร: <?= $model->tel ?> 
                                                </td>
                                                <td>
                                                    Email: <?= $model->email ?> 
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    ที่อยู่: <?= $model->address ?>   
                                                </td>
                                                <td>
                                                    เบอร์โทร: <?= $model->tel ?> 
                                                </td>
                                                <td></td>
                                            </tr>
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

    </div><!-- end .row -->
