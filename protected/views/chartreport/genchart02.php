<?php
                 include "dbconnect.php";
                 $yget = $_POST["memid"];
                 $yrsql = "select year(c1.dayopencoure) as year ,	c2.name as course,	count(c1.categorycourse) as total from course c1 inner join categorycourse c2 on c1.categorycourse = c2.id where year(c1.dayopencoure) = ".$yget." group by year(c1.dayopencoure),c2.name;";
                 $retsel = mysql_query($yrsql,$db);
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
                    /*echo '<div class="portlet box blue">';
					echo '	<div class="portlet-title">';
					echo '		<div class="caption">';
					echo '			<i class="fa fa-gift"></i>Bar Chart';
					echo '		</div>';
					echo '		<div class="tools">';
					echo '			<a href="javascript:;" class="collapse">';
					echo '			</a>';
					echo '			<a href="#portlet-config" data-toggle="modal" class="config">';
					echo '			</a>';
					echo '			<a href="javascript:;" class="reload">';
					echo '			</a>';
					echo '			<a href="javascript:;" class="remove">';
					echo '			</a>';
					echo '		</div>';
					echo '	</div>';
					echo '	<div class="portlet-body">';
					echo '		<div id="chart_1_1_legendPlaceholder">';
					echo '		</div>';
					echo '		<div id="yut" class="chart">';
					echo '		</div>';
					echo '	</div>';
					echo '</div>';*/                                     
?>