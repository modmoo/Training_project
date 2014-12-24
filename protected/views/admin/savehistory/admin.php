 <h3>บันทึกประวัติผู้เรียน</h3>
 <?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'course-register-grid',
'dataProvider'=>$model->listcoursregister(),
'type' => 'striped bordered',  
'columns'=>array(
	    array(
            'name' => 'course_id',
             'htmlOptions' => array(
             'style' => 'width:200px;'
            )),
	    array(
            'name' => 'course.name',
            'header'=>'<span style="color:#428bca;text-align:center;">ชื่อคหลักสูตร</span>',    
             'htmlOptions' => array(
           //  'style' => 'width:100px;'
            )),
	    array(
            'name' => 'course.categorycourse',
            'header'=>'<span style="color:#428bca;text-align:center;">ประเภทหลักสูตร</span>',     
            'value'=>'Categorycourse::getlabelTypescourse($data->course->categorycourse)',
             'htmlOptions' => array(
             'style' => 'width:200px;'
            )), 
          array( 
            'header' => '<span style="color:#428bca;">ดำเนินการ</span>',
            'value' => function($data)
            {
                Yii::app()->controller->renderPartial('_buttonaction', array(
                    'data' => $data
                ));
            },
            'htmlOptions' => array(
                'style' => 'width:200px;'
            )
        ), /*
     array('header' => '<span style="color:#428bca;">ดำเนินการ</span>',
           'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{savehistory}', //    'template'=>'{add} {list} {update} {print_act}',
            'buttons' => array(
             'savehistory' => array(
                    'label' => 'บันทึกประวัติ',
                    'icon' => 'fa fa-floppy-o',
                    'url' => 'Yii::app()->createUrl("admin/employee/savehistory", array("id"=>$data->course_id))',
                    'options' => array(
                        'class' => 'btn btn-small btn-success', 'style' => 'margin:5px;',
                    ),
                     'visible'=>'Daycoursetraining::iscompletecourse($data->course_id)',
                ), 
            ),
            'htmlOptions' => array(
                'style' => 'width:200px;text-align:center;'
            ),
          )*/
        ),
)); ?>
