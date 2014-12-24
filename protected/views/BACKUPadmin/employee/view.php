<?php

$this->menu = array(
    array('label' => 'List Employee', 'url' => array('index')),
    array('label' => 'Create Employee', 'url' => array('create')),
    array('label' => 'Update Employee', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Employee', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Employee', 'url' => array('admin')),
);
?>

<?php

$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'idemployee',
        'firstname',
        'lastname',
        'username',
        'password',
        'sex',
        'image',
        'tel',
        'department',
        'startdate',
        'birtthday',
        'degree',
        'address',
        'email',
        'usertype',
        'active',
        'at_lastvisit',
        'at_counter',
        'company_id',
    ),
));
?>
