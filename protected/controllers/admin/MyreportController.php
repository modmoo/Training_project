<?php

class MyreportController extends Controller
{
	    public function filters() {
        return array(
            'accessControl',
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('Report2', 'Report1'),
                'users' => array('*'), //admin
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
	public function actionReport2()
	{
		$this->render('report2');
	}

	public function actionReport1()
	{
		$this->render('report1');
	}

}