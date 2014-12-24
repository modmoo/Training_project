<?php
$this->widget('booster.widgets.TbButtonGroup', array(
    'toggle' => 'radio',
    'buttons' => array(
        array(
            'label' => ucwords(Daycoursetraining::STATUS_check),
            'type' => ($data->isSTATUS_check()) ? 'info' : '','value'=>1,
            'url' => Yii::app()->createUrl('admin/news/publish', array('id' => $data->id)),
            'htmlOptions' => array(
                'id' => 'status' . $data->id,
                'class' => ($data->isSTATUS_check()) ? 'toggleStatus disabled' : 'toggleStatus',
            ),
            'active' => ($data->isSTATUS_check()) ? true : false,
        ),
        array(
            'label' => ucwords(Daycoursetraining::STATUS_uncheck),
            'type' => ($data->isSTATUS_uncheck()) ? 'info' : '',
            'url' => Yii::app()->createUrl('admin/news/draft', array('id' => $data->id)),
            'htmlOptions' => array(
                'id' => 'status' . $data->id,
                'class' => ($data->isSTATUS_uncheck()) ? 'toggleStatus disabled' : 'toggleStatus',
            ),
            'active' => ($data->isSTATUS_uncheck()) ? true : false,
        ),
    )
));
?>