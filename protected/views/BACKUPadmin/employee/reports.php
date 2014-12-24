<?php
require_once Yii::app()->basePath . '/views/include/connectdb.php';
//require_once Yii::app()->basePath . '/views/include/tcpdf/tcpdf.php';
$sql='SELECT cr.approval,cr.course_id,cr.time,em.*,cu.name FROM course_register cr LEFT JOIN course cu ON cr.course_id=cu.cu_id LEFT JOIN  employee em ON cr.employee_id=em.idemployee WHERE cr.approval=1  AND em.iddept='.Yii::app ()->user->getdepartments().'';
$result = mysql_query($sql) or die("mysql_query");
?>
<?php
 echo '<a href="'.Yii::app()->createUrl('admin/employee/Exportpdf',array('id'=>'export')).'" class="btn btn-info btn-sm" role="button"><i class="glyphicon glyphicon-print"></i>&nbsp; print</a>
       <div style="margin-bottom: 5px;"></div>';
 $mytbtr="";
 ?>

<?php
$mytbheader='<table align="center" class="table table-bordered table-hover">
      <thead>
      <tr><td colspan="4">รายชื่อผู้อบรมแผนก '.Department::getlabeldepartmanets(Yii::app ()->user->getdepartments()).'</td></tr>
        <tr>
          <th>รหัส</th>
          <th>ชื่อ - นามสกุล</th>
          <th>หลักสูตร</th>
          <th>วันที่อบรม</th>
        </tr>
      </thead><tbody>';
$mytbfooter='</tbody></table>';

 while ($row = mysql_fetch_array($result)) {
$dayall=Daycoursetraining::getdayallcourse($row['course_id']);
 $mytbtr .= '
          <tr>
          <td style="border: 1px solid #000000; width=120px;">' . $row['idemployee'] . '</td>
          <td style="border: 1px solid #000000; width=180px;">' .$row['firstname'].'-'.$row['lastname']. '</td>
          <td style="border: 1px solid #000000;width=230px;">' .$row['name'] . '</td>
         <td style="border: 1px solid #000000; width=100px;">
          '.marge($dayall).'
         </td>
          </tr>
          ';
 }
 echo $mytbheader,$mytbtr,$mytbfooter;
 ?>
<?php
 function marge($dayall){
     $st=""; $i=0;$br="";
   $mydata=explode(',',$dayall);  
   foreach ($mydata as $value) {
       $i++;
       if($i==1){
       $br=="";    
       }else{
       $br="<br />";    
       }
     $st.=$br.$value;   
   }
   return $st;
 }

//close the connection
mysql_close($dbhandle);
?>
 