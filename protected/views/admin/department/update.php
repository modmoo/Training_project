<?php

$this->menu = array(
    array('label' => 'List Department', 'url' => array('index')),
    array('label' => 'Create Department', 'url' => array('create')),
    array('label' => 'View Department', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Department', 'url' => array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>