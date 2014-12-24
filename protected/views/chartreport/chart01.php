<?php
                             include "dbconnect.php";
                             $yget = $_POST["yrt"];
                             $optstr = "select year(dayopencoure) as year,month(dayopencoure) as month,count(dayopencoure) as amount from course WHERE year(dayopencoure) =".$yget." GROUP BY year(dayopencoure),month(dayopencoure);";
                             $retqry = mysql_query($optstr,$db);
                             $mon = array();
                             $mon2 = array();
                             $amo = array();
                             $yer = array();
                             $row_num = 0;
                             if($retqry){
                                 while($row = mysql_fetch_array($retqry)){
                                         $yer[] = $row['year'];
                                         $mon2[] = $row['month'];
                                         $mon[] = date('F', mktime(0, 0, 0, $row['month'], 10));
                                         $amo[] = $row['amount'];
                                         $row_num++;
                                 }
                             }
                             echo json_encode(array("tm1"=>$mon,"tm2"=>$mon2,"ta1"=>$amo,"tr1"=>$row_num));                                                        
?>