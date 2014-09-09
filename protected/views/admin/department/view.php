<?php

$this->menu = array(
    array('label' => 'List Department', 'url' => array('index')),
    array('label' => 'Create Department', 'url' => array('create')),
    array('label' => 'Update Department', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Department', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Department', 'url' => array('admin')),
);
?>
<?php

$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'iddepartment',
        'name',
    ),
));
?>
