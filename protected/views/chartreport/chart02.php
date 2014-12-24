<?php
                             include "dbconnect.php";
                             $yget = $_POST["yrt"];
                             $optstr = "select year(c1.dayopencoure) as year ,	c2.name as course,	count(c1.categorycourse) as total from course c1 inner join categorycourse c2 on c1.categorycourse = c2.id where year(c1.dayopencoure) = ".$yget." group by year(c1.dayopencoure),c2.name;";
                             $retqry = mysql_query($optstr,$db);
                             $mon = array();
                             $mon2 = array();
                             $amo = array();
                             $yer = array();
                             $row_num = 0;
                             if($retqry){
                                 while($row = mysql_fetch_array($retqry)){
                                         $yer[] = $row['year'];
                                         $mon2[] = $row['course'];
                                         $mon[] = $row['course'];
                                         $amo[] = $row['total'];
                                         $row_num++;
                                 }
                             }
                             echo json_encode(array("tm1"=>$mon,"tm2"=>$mon2,"ta1"=>$amo,"tr1"=>$row_num));                                                        
?>