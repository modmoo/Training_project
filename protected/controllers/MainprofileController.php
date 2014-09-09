<?php
class MainprofileController extends Controller {
    public $layout = '//layouts/main_front'; //layout_main_admin
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
    public function actionIndex() {
        $id='2014000001';
        $model=null; 
        $model=Employee::model()->findByAttributes(array('idemployee'=>$id));  
        $emid='1';
        $modelhistory=null; 
        $criteria = new CDbCriteria();
        $criteria->condition = 'employee_id=:id';
        $criteria->params = array(':id'=>$emid);
        $criteria->order = "start DESC";
        $modelhistory = TrainingHistory::model()->findAll($criteria);  
        //var_dump($modelhistory);
        $this->render('index',array('model'=>$model,'modelhistory'=>$modelhistory));
    }    
}
