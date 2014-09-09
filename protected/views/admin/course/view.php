<?php
$this->menu = array(
    array('label' => 'List Course', 'url' => array('index')),
    array('label' => 'Create Course', 'url' => array('create')),
    array('label' => 'Update Course', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Course', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Course', 'url' => array('admin')),
);
?>

<h1>View Course #<?php echo $model->id; ?></h1>

<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'cu_id',
        'name',
        'image',
        'start',
        'dayend',
        'dayopencoure',
        'dayclose',
        'time',
        'location',
        'typelocation',
        'discription',
        'num_max',
        'price',
        'trainer',
        'active',
        'categorycourse',
        'supprier_id',
    ),
));
?>
