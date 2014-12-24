<?php 
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
            'name' => 'idsuppier',
            'header' => 'รหัส Suppier',
            'htmlOptions' => array('style' => 'text-align: center;width: 130px;'),  
            ),
            'name',
            'tel',
           // 'address',
            'contact',
        array('header' => '<span style="color:#428bca;">เลือก/ดูข้อมูล</span>',
           'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{insert}{info}', //    'template'=>'{add} {list} {update} {print_act}',
            'buttons' => array(
                'insert' => array(
                    'label' => 'เลือก',
                    'icon' => 'fa fa-check-circle',
                    'options' => array(
                        'class' => 'btn btn-mini btn-success', 'style' => 'margin:5px;',
                        'onclick' => 'selectData($(this).parent().parent().children(":nth-child(1)").text(),$(this).parent().parent().children(":nth-child(3)").text());',
                    ),
                ),
                'info' => array
                    (
                    'label' => 'ดูข้อมูล',
                    'icon' => 'fa fa-info-circle',
                    'options' => array(
                        'class' => 'btn btn-mini btn-info',
                        'onclick' => 'gettDatainfo($(this).parent().parent().children(":nth-child(1)").text());',
                    ),
                ),
            ),
            'htmlOptions' => array(
                'style' => 'width: 120px;', 'class' => 'text_center'
            ),
        )
            /*
            array(
                'class'=>'CButtonColumn',
                'template' => '{insert}','{delete}',
                'buttons' => array(
                    "insert" => array(
                        'label' => 'เลือก',
                        'options' => array(
                            'class' => 'btn btn-mini btn-success',
                            'onclick' => 'selectData($(this).parent().parent().children(":nth-child(1)").text(),$(this).parent().parent().children(":nth-child(3)").text());',
                        )
                    ),
                )
            ),*/
	),
));
?>


