<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('companyid')); ?>:</b>
    <?php echo CHtml::encode($data->companyid); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('tel')); ?>:</b>
    <?php echo CHtml::encode($data->tel); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
    <?php echo CHtml::encode($data->address); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
    <?php echo CHtml::encode($data->fax); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('discription')); ?>:</b>
      <?php echo CHtml::encode($data->discription); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('department')); ?>:</b>
      <?php echo CHtml::encode($data->department); ?>
      <br />

     */ ?>

</div>