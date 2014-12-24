<?php

class ReportSumByMonthController extends Controller
{
	public function actionIndex()
	{
                $s1 = date('m');
                $q1 = Yii::app()->db->createCommand()
                        ->select('month(dayopencoure) as mon,count(month(dayopencoure)) as cnt')
                        ->from('course')
                        ->where('month(dayopencoure)<>0')
                        ->group('month(dayopencoure)')
                        ->queryAll();
		$this->render('index',array('data'=>$q1));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}