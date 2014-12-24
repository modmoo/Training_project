<?php

$this->menu = array(
    array('label' => 'List Supprier', 'url' => array('index')),
    array('label' => 'Create Supprier', 'url' => array('create')),
    array('label' => 'Update Supprier', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Supprier', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Supprier', 'url' => array('admin')),
);
?>

<?php

$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'idsuppier',
        'name',
        'tel',
        'email',
        'address',
        'contact',
    ),
));
?>
