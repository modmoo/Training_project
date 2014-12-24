<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <div id='mainbox_profile'>
                    <div id='proimg'>
                        <img  style="height: 200px;width: 200px;"src="<?=Yii::app()->baseUrl;?>/images/uploads/supprier/<?=$modelSupprier->image?>" >
                    </div>
                    <div id='profile' style="width: auto;">
                        <div class="h_profiles"><h4>รายละเอียด Supprier</h4></div>
                        <div style="margin-left:5px;">
                            <div class="row clearfix">
                                <div class="col-xs-12 column">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="250">
                                                    ID: &nbsp;<?= $modelSupprier->idsuppier ?> 
                                                </td>
                                                <td>
                                                    ชื่อ : &nbsp; <?= $modelSupprier->name ?> 	
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    เบอร์โทร: <?= $modelSupprier->tel ?> 
                                                </td>
                                                <td>
                                                    Email: <?= $modelSupprier->email ?> 
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    ที่อยู่: <?= $modelSupprier->address ?>   
                                                </td>
                                                <td>
                                                    ผู้ประสานงาน: <?= $modelSupprier->contact ?> 
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
