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
