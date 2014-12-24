<?php
class dataweb {
    public static function getEmployee_degree(){
        return array('ป.6'=>'ป.6','ปวช.'=>'ปวช','ม.3'=>'ม.3','ปวส.'=>'ปวส.','ม.6'=>'ม.6', 'ปริญญาตรี'=>'ปริญญาตรี','ปริญญาโท'=>'ปริญญาโท','ปริญญาเอก'=>'ปริญญาเอก','ไม่ระบุ'=>'ไม่ระบุ');
    }
   public static function getdepartmanets(){
       $mylist=Department::model()->model()->findAll();
       return CHtml::listData($mylist, 'id', 'name');
   }
    public static function getlabeldepartmanets($id){
      $criteria = new CDbCriteria ();
        $criteria->select = array(
            '*'
        );
       //$criteria->condition = 'active=:active';
        $criteria->condition = 'id=:id';
        $criteria->params = array(
            ':id' => $id
        );
        // $criteria->params = array(':category'=>1);
       // $criteria->order = 'start DESC '; // uncomment to order the list
      //  $criteria->limit =4;
       $mylist= Department::model()->model()->find($criteria);
       return  $mylist->name;
   }
   public static function gettype_user(){
       $mylist=  TypeUser::model()->model()->findAll();
       return CHtml::listData($mylist, 'id', 'typename');
   }
   public static function getlabeltype_user($id){
      $criteria = new CDbCriteria ();
        $criteria->select = array(
            '*'
        );
        $criteria->condition = 'id=:id';
        $criteria->params = array(
            ':id' => $id
        );
       $mylist= TypeUser::model()->model()->find($criteria);
       return  $mylist->typename;
   }   
    public static function getcompany(){
       $mylist= Company::model()->model()->findAll();
       return CHtml::listData($mylist, 'id', 'name');
   }
    public static function permisionatstaff(){
        $criteria = new CDbCriteria ();
        $criteria->condition = 'emid=:emid';
        $criteria->params = array(
            ':emid' =>  Yii::app()->user->getuser_id()
        );
        $model=Coursestaf::model()->findAll($criteria);     
        return count($model)>0;     
   }
public static function isshowquestion($idcourse){
//  ค้นหา   
$sql2='SELECT * FROM check_course as cu left join daycoursetraining dt ON cu.course_id=dt.idcourse  '
 .'WHERE idcourse ="'.$idcourse.'" AND  now()>(SELECT MAX(day) AS lastday FROM daycoursetraining WHERE idcourse ="'.$idcourse.'") GROUP BY dt.day;';    
     
$sql='SELECT * FROM check_course as cu left join(
SELECT DISTINCT idcourse, MAX( 
DAY ) AS lastday
FROM daycoursetraining
WHERE idcourse ="'.$idcourse.'"
)day ON cu.course_id=day.idcourse WHERE now()>day.lastday ORDER BY day.lastday;';   
$dbCommand = Yii::app()->db->createCommand($sql);
$data=$dbCommand->query();
 return count($data)>0;     
 }

}
