<?php

class Report3Controller extends Controller {
    public function filters() {
        return array(
            'accessControl', 
        );
    }
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('Index','getdata1','getchart1','getdata2','getchart2'),
                'users' => array('1','2'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    public function actionIndex() {
        $this->render('index');
    }

    public function actiongetdata1() {
        require_once Yii::app()->basePath . '/views/include/connectdb.php';
        $yget = $_POST["memid"];
        $yrsql = "select year(dayopencoure) as year,month(dayopencoure) as month,count(dayopencoure) as amount from course WHERE year(dayopencoure) =" . $yget . " GROUP BY year(dayopencoure),month(dayopencoure);";
        $retsel = mysql_query($yrsql, $dbhandle);
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
        while ($row = mysql_fetch_array($retsel)) {
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

    public function actiongetchart1() {
        require_once Yii::app()->basePath . '/views/include/connectdb.php';
        $yget = $_POST["yrt"];
        $yrsql = "select year(dayopencoure) as year,month(dayopencoure) as month,count(dayopencoure) as amount from course WHERE year(dayopencoure) =" . $yget . " GROUP BY year(dayopencoure),month(dayopencoure);";
        $retsel = mysql_query($yrsql, $dbhandle);
        $mon = array();
        $mon2 = array();
        $amo = array();
        $yer = array();
        $row_num = 0;
        if ($retsel) {
            while ($row = mysql_fetch_array($retsel)) {
                $yer[] = $row['year'];
                $mon2[] = $row['month'];
                $mon[] = date('F', mktime(0, 0, 0, $row['month'], 10));
                $amo[] = $row['amount'];
                $row_num++;
            }
        }
        echo json_encode(array("tm1" => $mon, "tm2" => $mon2, "ta1" => $amo, "tr1" => $row_num));
    }

    public function actiongetdata2() {
        require_once Yii::app()->basePath . '/views/include/connectdb.php';
        //$yget = $_POST["memid"];
        $yrsql = "select * from viewscore;";
        $retsel = mysql_query($yrsql, $dbhandle);
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
        echo '				 Type';
        echo '			</th>';
        echo '			<th>';
        echo '				 Total Employee';
        echo '			</th>';
        echo '			<th>';
        echo '				 Average';
        echo '			</th>';
        echo '			<th>';
        echo '				 Max';
        echo '			</th>';
        echo '			<th>';
        echo '				 Min';
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
        while ($row = mysql_fetch_array($retsel)) {
            echo '		<tr>';
            echo '			<th>';
            echo $i;
            echo '			</th>';
            echo '			<th>';
            echo $row['cu_id'];
            echo '			</th>';
            echo '			<th>';
            echo $row['name'];
            echo '			</th>';
            echo '			<th>';
            echo $row['type'];
            echo '			</th>';
            echo '			<th>';
            echo $row['people'];
            echo '			</th>';
            echo '			<th>';
            echo $row['average'];
            echo '			</th>';
            echo '			<th>';
            echo $row['mxscore'];
            echo '			</th>';
            echo '			<th>';
            echo $row['miscore'];
            echo '			</th>';
            echo '		</tr>';
            //$yer[] = $row['year'];
            //$mon2[] = $row['course'];
            //$mon[] = $row['course'];
            //$amo[] = $row['total'];
            $row_num++;
            $i++;
        }
        echo '		</tbody>';
        echo '		</table>';
        echo '	</div>';
        echo '</div>';
    }

    public function actiongetchart2() {
        require_once Yii::app()->basePath . '/views/include/connectdb.php';
        $yget = $_POST["yrt"];
        $optstr = "select * from totalsummary;";
        $retqry = mysql_query($optstr, $dbhandle);
        $mon = array();
        $mon2 = array();
        $amo = array();
        $yer = array();
        $row_num = 0;
        if ($retqry) {
            while ($row = mysql_fetch_array($retqry)) {
                $yer[] = $row['cuname'];
                $mon2[] = $row['courseday'];
                $mon[] = $row['emp'];
                $amo[] = $row['regis'];
                $row_num++;
            }
        }
        echo json_encode(array("tm1" => $mon, "tm2" => $mon2, "ta1" => $amo, "tr1" => $row_num));
    }

}
