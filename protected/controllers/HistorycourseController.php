<?php
class HistorycourseController extends Controller{
public $layout = '//layouts/main_front'; //layout_main_admin
public function filters() {
        return array(
            'accessControl',
        );
    }
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('Detail'),
                'users' => array('@'), 
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }    
    public function actionDetail($id){
        $criteria = new CDbCriteria ();
        $criteria->condition = 'cu_id=:cu_id';
        $criteria->params = array(
            ':cu_id' =>$id
        ); 
        $model= TrainingHistory::model()->find($criteria);
        $this->render('detail',array('model'=>$model));
     }
 
}