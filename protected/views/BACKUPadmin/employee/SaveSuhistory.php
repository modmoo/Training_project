 
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>FALSE,
)); ?>

  <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => 'บันทึกข้อมูล',
    ));
    ?>
<?php $this->endWidget(); ?>
<table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>ลำดับที่</th>
          <th>ชื่อ - นามสกุล</th>
          <th>ผลการเรียน</th>
          <th>คะแนน</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $i=0;
       foreach ($model as $key => $value) {
           $i++;
           
      ?>
      <tr>
          <td><?=$i?></td>
          <td><?=$value['firstname']?> - <?=$value['lastname']?></td>
          <td><?=TrainingUsershistory::getstatusleaning($value['resulttraining'])?></td>
          <td><?=intval($value['score'])?></td>
        </tr>   
      <?php    
       }
      ?>
      </tbody>
    </table>