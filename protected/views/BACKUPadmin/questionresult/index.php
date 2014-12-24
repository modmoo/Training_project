<?php
     $score1="";$i1="";
     $ex1="";$ex2="";  $datarray=array(); $valbeup=""; $valibelempty="";
     $trainner=""; $idcourse="";
        $mysql1="SELECT ans.*,cs.cu_id,cs.name,sp.name as spname FROM ansquestion ans,course cs,supprier sp WHERE ans.idcourse='".$_GET['id']."' AND cs.supprier_id=sp.id";//ans.idgroup=1 AND ans.idside=1 AND cs.supprier_id=sp.id
        $dbCommand = Yii::app()->db->createCommand($mysql1);
        $data1 = $dbCommand->queryAll();
        if(count($data1)>0){
        foreach ($data1 as $key => $value) {
            $trainner=$value['spname'];    
            $idcourse=$value['cu_id'];
            array_push($datarray, $value['ans_qvalue']); 
          $score1+=$value['ans_qvalue'];
          $value['ans_qvalue']*$value['ans_qvalue'];
          $i1++;  
         }
        foreach ($datarray as $key => $value1) {
            $valbeup+=$value1*$value1;
        }
        $upperscore=$score1*$score1;
        $mydatato=(($i1*$valbeup)-$upperscore)/($i1*($i1-1));    
        
        
        $mysql2="SELECT ans.*,cs.name,sp.name FROM ansquestion ans,course cs,supprier sp WHERE ans.idcourse='".$_GET['id']."' AND ans.idgroup=1 AND ans.idside=1 AND cs.supprier_id=sp.id";//
        $dbCommand = Yii::app()->db->createCommand($mysql2);
        $data2 = $dbCommand->queryAll();
        ///var_dump($data2);exit();
        $score2="";$avg2="";$i2=0;
        foreach ($data2 as $key => $value) {
           $i2++; $score2+=$value['ans_qvalue'];
        }
        $mysql3="SELECT ans.*,cs.name,sp.name FROM ansquestion ans,course cs,supprier sp WHERE ans.idcourse='".$_GET['id']."' AND ans.idgroup=1 AND ans.idside=2 AND cs.supprier_id=sp.id";//
        $dbCommand = Yii::app()->db->createCommand($mysql3);
        $data3 = $dbCommand->queryAll();
        ///var_dump($data2);exit();
        $score3="";$avg3="";$i3=0;
        foreach ($data3 as $key => $value) {
           $i3++; $score3+=$value['ans_qvalue'];
        }
       $mysql4="SELECT ans.*,cs.name,sp.name FROM ansquestion ans,course cs,supprier sp WHERE ans.idcourse='".$_GET['id']."' AND ans.idgroup=1 AND ans.idside=3 AND cs.supprier_id=sp.id";//
        $dbCommand = Yii::app()->db->createCommand($mysql4);
        $data4 = $dbCommand->queryAll();
        ///var_dump($data2);exit();
        $score4="";$avg4="";$i4=0;
        foreach ($data4 as $key => $value) {
           $i4++; $score4+=$value['ans_qvalue'];
        }
       $mysql5="SELECT ans.*,cs.name,sp.name FROM ansquestion ans,course cs,supprier sp WHERE ans.idcourse='".$_GET['id']."' AND ans.idgroup=2 AND ans.idside=1 AND cs.supprier_id=sp.id";//
        $dbCommand = Yii::app()->db->createCommand($mysql5);
        $data5 = $dbCommand->queryAll();
        ///var_dump($data2);exit();
        $score5="";$avg5="";$i5=0;
        foreach ($data4 as $key => $value) {
           $i5++; $score5+=$value['ans_qvalue'];
        } 
       $mysql6="SELECT ans.*,cs.name,sp.name FROM ansquestion ans,course cs,supprier sp WHERE ans.idcourse='".$_GET['id']."' AND ans.idgroup=2 AND ans.idside=2 AND cs.supprier_id=sp.id";//
        $dbCommand = Yii::app()->db->createCommand($mysql6);
        $data6 = $dbCommand->queryAll();
        ///var_dump($data2);exit();
        $score6="";$i6=0;
        foreach ($data6 as $key => $value) {
           $i6++; $score6+=$value['ans_qvalue'];
        }  
       $mysql7="SELECT ans.*,cs.name,sp.name FROM ansquestion ans,course cs,supprier sp WHERE ans.idcourse='".$_GET['id']."' AND ans.idgroup=2 AND ans.idside=3 AND cs.supprier_id=sp.id";//
        $dbCommand = Yii::app()->db->createCommand($mysql7);
        $data7 = $dbCommand->queryAll();
        $score7="";$i7=0;
        foreach ($data7 as $key => $value) {
           $i7++; $score7+=$value['ans_qvalue'];
        }  
   ?>
<table class="table table-bordered table-hover">
    <thead>
        <tr >
            <th style="text-align: center;font-size: medium;" colspan="5">สรุปผลการประเมินความพึงพอใจของหลักสูตร <?=Course::getnamecourse($_GET['id'])?></th>
        </tr>
    </thead>   
    <thead>
        <tr>
            <th>ลำดับที่</th>
            <th>ด้าน</th>
            <th>คะแนน</th>
            <th>คะแนนเฉลี่ย</th>
        </tr>
    </thead>
    <tbody>
    <tr>    
    <td>1</td>
    <td>ความรู้เนื้อหาที่อบรม</td>
    <td><?=$score2?></td>
    <td><?=$score2/$i2;?></td>
   </tr> 
    <tr>    
    <td>2</td>
    <td>วิธีและเทคนิคการสอน</td>
    <td><?=$score3?></td>
    <td><?=$score3/$i3;?></td>
   </tr> 
    <tr>    
    <td>3</td>
    <td>บุคลิกภาพของวิทยากร</td>
    <td><?=$score4?></td>
    <td><?=$score4/$i4;?></td>
   </tr> 
    <tr>    
    <td>4</td>
    <td>เจ้าหน้าที่ผู้ให้บริการ/วิทยากร/ผู้ประสานงาน</td>
    <td><?=$score5?></td>
    <td><?=$score5/$i5;?></td>
   </tr> 
     <tr>    
    <td>5</td>
    <td>การอำนวยความสะดวก</td>
    <td><?=$score6?></td>
    <td><?=$score6/$i6;?></td>
   </tr> 
    <tr>    
    <td>6</td>
    <td>ความรู้ที่ได้หลังการอบรม</td>
    <td><?=$score7?></td>
    <td><?=$score7/$i7;?></td>
   </tr> 
    <tr>    
    <td>ค่าเฉลี่ยคะแนนรวม</td>
    <td colspan="3"><?=number_format($score1/$i1,2);?></td>
   </tr>
   <tr>    
    <td>ค่าเบี่ยงเบนมาตรฐาน</td>
    <td colspan="3"><?=number_format(sqrt($mydatato),2);?></td>
   </tr>
    </tbody>
</table>     
<?php
   }else{
   ?>
<table width=""100%">
    <tr>
        <td> ไม่พบข้อมูลการประเมิน</td>  
    </tr>
</table>
 <?php
   }
?>