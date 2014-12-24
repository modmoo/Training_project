<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <div class="course-subb">
            <h3 class="glyphicon glyphicon-th">&nbsp;Result of Register List</h3>	
        </div>
    </div>

    <div class='profile'>
        <div class="row clearfix">
            <div class="col-xs-12 column">
                <table class="table table-striped">
                    <tbody>
                  <?php
                    foreach ($data as $key => $value) {
                        ?>
                        <tr>
                            <td width="100"><b>  Course ID: </b>&nbsp;<?=$value['cu_id']?></td>
                            <td width="100"><b> Course Name:</b>&nbsp;<?=$value['name']?></td>		
                            <td width="100"><a href="<?=  Yii::app()->createUrl('admin/result_of_register_detail',array('id'=>$value['cu_id']))?>"> รายละเอียด</a></td>
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