<?php

$this->menu = array(
    array('label' => 'List Supprier', 'url' => array('index')),
    array('label' => 'Create Supprier', 'url' => array('create')),
    array('label' => 'View Supprier', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Supprier', 'url' => array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>