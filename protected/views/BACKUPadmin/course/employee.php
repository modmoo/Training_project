<?php 
$model->iddept=4;
$this->widget('booster.widgets.TbGridView',array(
        'id'=>'supprier-grid',
        'dataProvider'=>$model->search(),
        'type' => 'striped bordered',
        'filter'=>$model,
	'columns'=>array(
            array(
            'name' => 'id',
            'header' => 'ID',
            'htmlOptions' => array('style' => 'text-align: center;width: 50px;'),  
            ),
            array(
            'name' => 'idemployee',
            'header' => 'รหัสพนักงาน',
            'htmlOptions' => array('style' => 'text-align: center;width: 150px;'),  
            ),
            array(
            'name' => 'firstname',
            'header' => 'ชื่อ',
            'htmlOptions' => array('style' => 'text-align: center;width: 150px;'),  
            ),
            array(
            'name' => 'lastname',
            'header' => 'นามสกุล',
            'htmlOptions' => array('style' => 'text-align: center;width: 150px;'),  
            ),
           array(
            'name' => 'usertype',
            'value'=>'TypeUser::getlabelusertype($data->usertype)', 
            'htmlOptions' => array('style' => 'text-align: center;width: 150px;'),  
            ), 
        array('header' => '<span style="color:#428bca;">เลือก/ดูข้อมูล</span>',
           'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{insert}{info}', //    'template'=>'{add} {list} {update} {print_act}',
            'buttons' => array(
                'insert' => array(
                    'label' => 'เลือก',
                    'icon' => 'fa fa-check-circle',
                    'options' => array(
                        'class' => 'btn btn-mini btn-success', 'style' => 'margin:5px;',
                        'onclick' => 'selectDataemployee($(this).parent().parent().children(":nth-child(2)").text(),$(this).parent().parent().children(":nth-child(3)").text());',
                    ),
                ),
                'info' => array
                    (
                    'label' => 'ดูข้อมูล',
                    'icon' => 'fa fa-info-circle',
                    'options' => array(
                        'class' => 'btn btn-mini btn-info',
                        'onclick' => 'gettDatainfoemployee($(this).parent().parent().children(":nth-child(2)").text());',
                    ),
                ),
            ),
            'htmlOptions' => array(
                'style' => 'width: 120px;', 'class' => 'text_center'
            ),
        )
	),
));
?>


