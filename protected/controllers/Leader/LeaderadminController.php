<?php
class LeaderadminController extends Controller {
    public function filters() {
        return array(
            'accessControl',
        );
    }
    public function accessRules() {
        return array(
            array('allow', 
                'actions' => array('index'),
                'users' => array('2'), //admin
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    public function actionIndex() {
        $this->render('index');
    }
 
}
