            <div class="page-content">
            	<div class="tab-pane" id="tab_2">								
            		<div class="portlet light bg-inverse">
            			<div class="portlet-title">
            				<div class="caption">
            					<i class="icon-equalizer font-green-haze"></i>
            						<span class="caption-subject font-green-haze bold uppercase">Employees Data</span>
            						<span class="caption-helper">Find Employees</span>
            					</div>
            					<div class="tools">
            						<a href="" class="collapse">
            						</a>
            						<a href="#portlet-config" data-toggle="modal" class="config">
            						</a>
            						<a href="" class="reload">
            						</a>
            						<a href="" class="remove">
            						</a>
            					</div>
            				</div>
            				<div class="portlet-body form">
            				<!-- BEGIN FORM-->
            					<form action="<?php echo $_SERVER['PHP_SELF'].'?menu=004'; ?>" class="form-horizontal" method="POST" id="FORM_ID">
            						<div class="form-body">
            						<h3 class="form-section">Course Summary</h3>
            							<div class="row">            								
            								<div class="col-md-6">
            									<div class="form-group">
            										<label class="control-label col-md-3">Column 6</label>
            										<div class="col-md-6">
            											<select action="" class="form-control select2me" data-placeholder="Select..." id="cuinput">
                                                            <?php 
                                                                include "dbconnect.php";
                                                                $optstr = "select cu_id,name from course;";
                                                                $retqry = mysql_query($optstr,$db);
                                                                while($optval = mysql_fetch_array($retqry)){
                                                                    echo '<option value="'.$optval["cu_id"].'">'.$optval["name"].'</option>';
                                                                }
                                                                mysql_close($db);
                                                            ?>
                                                            <option value="100">100</option>
                                                            <option value="500">500</option>
            											</select>
            										</div>
            									</div>
            								</div>
            								<!--/span-->
            							</div>                                        			
            						</div>            						
            					</form>
            					<!-- END FORM-->
            				</div>
            			</div>
            		</div>
                        <?php
                             include "dbconnect.php";
                             $optstr = "select year(dayopencoure) as year,month(dayopencoure) as month,count(dayopencoure) as amount from course GROUP BY year(dayopencoure),month(dayopencoure);";
                             $retqry = mysql_query($optstr,$db);
                             $mon = array();
                             $amo = array();
                             $yer = array();
                             $row_num = 0;
                             while($row = mysql_fetch_array($retqry)){
                                    $yer[] = $row['year'];
                                    $mon2[] = $row['month'];
                                    $mon[] = date('F', mktime(0, 0, 0, $row['month'], 10));
                                    $amo[] = $row['amount'];
                                    $row_num++;
                             }                                                         
                        ?>
                    <script type="text/javascript">
                    function loadBar() {
    
                            // bar chart:
                            //var data = GenerateSeries(0);
                            var m1 = <?php echo json_encode($mon) ?>;
                            var m2 = <?php echo json_encode($mon2) ?>;
                            var a1 = <?php echo json_encode($amo) ?>;
                            var data = [];
                            function GenerateSeries(added) {
                                
                
                                 
                                for (i = 0; i <= <?php echo $row_num ?>; i++) {                    
                                    data.push([a1[i],m1[i]]);
                                }
                                                
                                return data;
                            }
                
                            var options = {
                                series: {
                                    bars: {
                                        show: true
                                    }
                                },
                                bars: {
                                    barWidth: 0.5,
                                    lineWidth: 0, // in pixels
                                    shadowSize: 0,                                    
                                    align: 'left'
                                },
                
                                grid: {
                                    tickColor: "#444",
                                    borderColor: "#999",
                                    borderWidth: 1
                                }
                            };
                
                            if ($('#yut').size() !== 0) {
                                for (i = 0; i <= <?php echo $row_num ?>; i++) {                    
                                    data.push([m2[i],a1[i]]);                              
                                    $.plot($("#yut"), [
                                        {
                                            color: "#8000ff",
                                            label: m1,                                            
                                            data: data,
                                            xaxis: {
                                                mode: "time",
                                                timeformat: "%m"
                                            },
                                            yaxis: 20,                                            
                                            lines: {
                                                lineWidth: 1,
                                            },
                                            shadowSize: 0
                                        }
                                    ], options);
                                }
                            }                                                                                                  
                    }
                    document.getElementById('cuinput').onchange = function(){                        
                        var cuid = this.value;
                        $.ajax({
                			url: 'genchart.php',
                			type: "POST",
                			data: {memid: cuid,search: true},
                			//success: function (response) {//response is value returned from php (for your example it's "bye bye"
                			success: function (data) {               			 
                                $("#grpdisplay").html(data);
                				$("#grpdisplay").css('display','inline');
                                loadBar();
                                $("#grpdisplay2").css('display','inline');
                                //document.writeline(data);
                			}
                		});                                  
                    }
                    </script>
                    <div id="grpdisplay">
                        <span>Sample</span>
                    </div>
                    <div id="grpdisplay2">
                        <div class="portlet-body">
							<div id="chart_1_1_legendPlaceholder">
							</div>
							<div id="yut" class="chart">
							</div>
						</div>
                    </div>
              </div>