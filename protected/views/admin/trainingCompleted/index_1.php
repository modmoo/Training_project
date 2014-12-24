<div id="my_box_trainning_history">
    <div class="panel panel-default" style="padding:2px;">
        <div class="panel-heading">Training The Completed List</div>
        <div class="panel-body">
            <?php
$form = $this->beginWidget('CActiveForm', [
    'id' => 'order-search-form',
    'method' => 'get',
]);
echo '<input type="text" name="year">&nbsp;';
echo CHtml::submitButton('ค้นหา', ['class' => 'btn btn-primary btn-sm']);
$this->endWidget();
            ?>
            <?php
            $oldyear="";$i=0;
            foreach ($modelhistory as $key => $value) {
               if($value['myyear']!=$oldyear){
                   
               }   
            }
            ?>
            
            <div class="row">
                <div class="col-xs-3">
                    <h3>ปี : 2557</h3>
                </div>
                <div class="col-xs-9">
                    <div class="list-group">
                        <table class="table table-striped">
                            <thead>
                                <tr height="50" style="background:#428BCA;color:#fff; padding-top:2px;padding-bottom:2px; height:50px;">
                                    <th>Date</th>
                                    <th>Course ID</th>
                                    <th>Course Name</th>
                                    <th>เอกสารที่ใช้ในการอบรม</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="100"> 22/08/2557</td>
                                    <td width="100"> <a href="<?=Yii::app()->controller->createUrl('coursedetail');?>"> 2111001</a></td>
                                    <td width="100"> Office 2014</td>
                                    <td width="100"><a href="<?=Yii::app()->controller->createUrl('files');?>"> เอกสาร</a></td>


                                </tr>
                                <tr>
                                    <td width="100"> 22/04/2557</td>
                                     <td width="100"> <a href="<?=Yii::app()->controller->createUrl('coursedetail');?>"> 2111001</a></td>
                                    <td width="100"> Office 2014</td>
                                    <td width="100"><a href="<?=Yii::app()->controller->createUrl('files');?>"> เอกสาร</a></td>

                                </tr>
                                <tr>
                                    <td width="100"> 22/01/2557</td>
                                    <td width="100"> <a href="<?=Yii::app()->controller->createUrl('coursedetail');?>"> 2111001</a></td>
                                    <td width="100"> Office 2014</td>
                                    <td width="100"><a href="<?=Yii::app()->controller->createUrl('files');?>"> เอกสาร</a></td>

                                </tr>
                                <tr>

                                    <td width="100"> รวม 28 Course</td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
 
        </div>
    </div>
</div> 