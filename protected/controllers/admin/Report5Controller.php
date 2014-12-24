<?php

class Report2Controller extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    public function actiongetdata1(){
       require_once Yii::app()->basePath . '/views/include/connectdb.php';
                 $yget = $_POST["memid"];
                 $yrsql = "select * from viewcoursepass;";
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
        						echo '				 Course';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 Pass';
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
            						echo $row['name'];
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['pass'];
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
                 $yrsql = "select * from viewstdard;";
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
        						echo '				 Course ID';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 Course Name';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 XBAR';
        						echo '			</th>';
                                echo '			<th>';
        						echo '				 S.D.';
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
            						echo $row['couse_id'];
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['name'];
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['xbar'];
            						echo '			</th>';
                                    echo '			<th>';
            						echo $row['strd'];
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
                             $optstr = "select * from totalsummary;";
                             $retqry = mysql_query($optstr,$dbhandle);
                             $mon = array();
                             $mon2 = array();
                             $amo = array();
                             $yer = array();
                             $row_num = 0;
                             if($retqry){
                                 while($row = mysql_fetch_array($retqry)){
                                         $yer[] = $row['cuname'];
                                         $mon2[] = $row['courseday'];
                                         $mon[] = $row['emp'];
                                         $amo[] = $row['regis'];
                                         $row_num++;
                                 }
                             }
                             echo json_encode(array("tm1"=>$mon,"tm2"=>$mon2,"ta1"=>$amo,"tr1"=>$row_num)); 
       }
}