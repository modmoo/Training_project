<?php

class ChartreportController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actiongetdata1(){
       require_once Yii::app()->basePath . '/views/include/connectdb.php';
                 $yget = $_POST["memid"];
                 $yrsql = "select year(dayopencoure) as year,month(dayopencoure) as month,count(dayopencoure) as amount from course WHERE year(dayopencoure) =".$yget." GROUP BY year(dayopencoure),month(dayopencoure);";
                 $retsel = mysql_query($yrsql,$dbhandle);
                                echo '<div class="portlet-body">';
        						echo '	<div class="table-scrollable">';
        						echo '		<table class="table table-striped table-hover">';
        						echo '		<thead>';
        						echo '		<tr>';
        						echo '			<th>';
        						echo '				 #';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 Year';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 Mounth';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 Amount';
        						echo '			</th>';
        						echo '		</tr>';
        						echo '		</thead>';
        						echo '		<tbody>';
                                $i = 1;
                                $mon = array();
                                $amo = array();
                                $yer = array();
                                $row_num = 0;
                                while($row = mysql_fetch_array($retsel)){
                                    echo '		<tr>';
            						echo '			<th>';
            						echo $i;
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['year'];
            						echo '			</th>';
            						echo '			<th>';
            						echo date("F", mktime(0, 0, 0, $row['month'], 10));
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['amount'];
            						echo '			</th>';
            						echo '		</tr>';
                                    $yer[] = $row['year'];
                                    $mon[] = $row['month'];
                                    $amo[] = $row['amount'];
                                    $row_num++; 
                                    $i++;
                                }
        						echo '		</tbody>';
        						echo '		</table>';
        						echo '	</div>';
        						echo '</div>';    
       }
       public function actiongetchart1(){
            require_once Yii::app()->basePath . '/views/include/connectdb.php';
                 $yget = $_POST["yrt"];
                 $yrsql = "select year(dayopencoure) as year,month(dayopencoure) as month,count(dayopencoure) as amount from course WHERE year(dayopencoure) =".$yget." GROUP BY year(dayopencoure),month(dayopencoure);";
                 $retsel = mysql_query($yrsql,$dbhandle);
                 $mon = array();
                 $mon2 = array();
                 $amo = array();
                 $yer = array();
                 $row_num = 0;
                 if($retsel){
                     while($row = mysql_fetch_array($retsel)){
                        $yer[] = $row['year'];
                        $mon2[] = $row['month'];
                        $mon[] = date('F', mktime(0, 0, 0, $row['month'], 10));
                        $amo[] = $row['amount'];
                        $row_num++;
                     }
                 }
                 echo json_encode(array("tm1"=>$mon,"tm2"=>$mon2,"ta1"=>$amo,"tr1"=>$row_num));                                     
       }
       public function actiongetdata2(){
            require_once Yii::app()->basePath . '/views/include/connectdb.php';
                 $yget = $_POST["memid"];
                 $yrsql = "select year(c1.dayopencoure) as year ,	c2.name as course,	count(c1.categorycourse) as total from course c1 inner join categorycourse c2 on c1.categorycourse = c2.id where year(c1.dayopencoure) = ".$yget." group by year(c1.dayopencoure),c2.name;";
                 $retsel = mysql_query($yrsql,$dbhandle);
                                echo '<div class="portlet-body">';
        						echo '	<div class="table-scrollable">';
        						echo '		<table class="table table-striped table-hover">';
        						echo '		<thead>';
        						echo '		<tr>';
        						echo '			<th>';
        						echo '				 #';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 Year';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 Topic';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 Total';
        						echo '			</th>';
        						echo '		</tr>';
        						echo '		</thead>';
        						echo '		<tbody>';
                                $i = 1;
                                $mon = array();
                                $mon2 = array();
                                $amo = array();
                                $yer = array();
                                $row_num = 0;
                                while($row = mysql_fetch_array($retsel)){
                                    echo '		<tr>';
            						echo '			<th>';
            						echo $i;
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['year'];
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['course'];
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['total'];
            						echo '			</th>';
            						echo '		</tr>';
                                    $yer[] = $row['year'];
                                    $mon2[] = $row['course'];
                                    $mon[] = $row['course'];
                                    $amo[] = $row['total'];
                                    $row_num++; 
                                    $i++;
                                }
        						echo '		</tbody>';
        						echo '		</table>';
        						echo '	</div>';
        						echo '</div>';
       }
       public function actiongetchart2(){
            require_once Yii::app()->basePath . '/views/include/connectdb.php';
                $yget = $_POST["yrt"];
                             $optstr = "select year(c1.dayopencoure) as year ,	c2.name as course,	count(c1.categorycourse) as total from course c1 inner join categorycourse c2 on c1.categorycourse = c2.id where year(c1.dayopencoure) = ".$yget." group by year(c1.dayopencoure),c2.name;";
                             $retqry = mysql_query($optstr,$dbhandle);
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
       }
}