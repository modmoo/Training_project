<?php
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/jquery.blockui.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/jquery.cokie.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/uniform/jquery.uniform.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/bootstrap-select/bootstrap-select.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/select2/select2.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/flot/jquery.flot.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/flot/jquery.flot.resize.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/flot/jquery.flot.pie.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/flot/jquery.flot.stack.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/flot/jquery.flot.crosshair.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/plugins/flot/jquery.flot.categories.min.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/admin/pages/scripts/form-samples.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/admin/pages/scripts/components-dropdowns.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/admin/pages/scripts/charts.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/admin/pages/scripts/chartsCustom.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/admin/pages/scripts/form-samples.js');
$cs->registerScriptFile($baseUrl . '/chartreport/assets/global/scripts/metronic.js');

$cs->registerCssFile($baseUrl . '/chartreport/assets/global/plugins/font-awesome/css/font-awesome.min.css');
$cs->registerCssFile($baseUrl . '/chartreport/assets/global/plugins/simple-line-icons/simple-line-icons.min.css');
$cs->registerCssFile($baseUrl . '/chartreport/assets/global/plugins/uniform/css/uniform.default.css');
$cs->registerCssFile($baseUrl . '/chartreport/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');
$cs->registerCssFile($baseUrl . '/chartreport/assets/global/plugins/gritter/css/jquery.gritter.css');
$cs->registerCssFile($baseUrl . '/chartreport/assets/global/plugins/jqvmap/jqvmap/jqvmap.css');
$cs->registerCssFile($baseUrl . '/chartreport/assets/global/plugins/bootstrap-select/bootstrap-select.min.css');
$cs->registerCssFile($baseUrl . '/chartreport/assets/global/plugins/select2/select2.css');
$cs->registerCssFile($baseUrl . '/chartreport/assets/global/plugins/jquery-multi-select/css/multi-select.css');
$cs->registerCssFile($baseUrl . '/chartreport/assets/global/css/components.css');
$cs->registerCssFile($baseUrl . '/chartreport/assets/global/css/plugins.css');
?>
<script>
jQuery(document).ready(function() {    
   // initiate layout and plugins
  Metronic.init(); // init metronic core components
//Layout.init(); // init current layout
//QuickSidebar.init(); // init quick sidebar
//Demo.init(); // init demo features
   FormSamples.init();
   Charts.init();
   Charts.initCharts();
   Charts.initPieCharts();
   Charts.initBarCharts();
});
</script>
            <div class="page-content">
            	<div class="tab-pane" id="tab_2">								
            		<div class="portlet light bg-inverse">
            			<div class="portlet-title">
            				 
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
            						<h3 class="form-section">กราฟสรุปแสดงผลหลักสูตร</h3>
            							<div class="row">            								
            								<div class="col-md-6">
            									<div class="form-group">
            										<label class="control-label col-md-3">เลือกข้อมูล</label>
            										<div class="col-md-6">
            										 <select action="" class="form-control select2me" data-placeholder="Select..." id="cuinput">
                                                            <?php 
                                                                require Yii::app()->basePath . '/views/include/connectdb.php';
                                                                 $optstr = "select YEAR(dayopencoure) as y1 from course group by YEAR(dayopencoure);";
                                                                $retqry = mysql_query($optstr,$dbhandle);
                                                                while($optval = mysql_fetch_array($retqry)){
                                                                    echo '<option value="'.$optval["y1"].'">'.$optval["y1"].'</option>';
                                                                }
                                                                mysql_close($dbhandle);
                                                                
                                                            ?>
                                                            <option value="2013">2013</option>                                                            
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
                         require Yii::app()->basePath . '/views/include/connectdb.php';
                             $optstr = "select year(dayopencoure) as year,month(dayopencoure) as month,count(dayopencoure) as amount from course GROUP BY year(dayopencoure),month(dayopencoure);";
                             $retqry = mysql_query($optstr,$dbhandle);
                             $mon = array();
                             $amo = array();
                             $yer = array();
                             $row_num = 0;
                           //  var_dump($retqry);
                             if ($retqry){
                                 while($row = mysql_fetch_array($retqry)){
                                        $yer[] = $row['year'];
                                        $mon2[] = $row['month'];
                                        $mon[] = date('F', mktime(0, 0, 0, $row['month'], 10));
                                        $amo[] = $row['amount'];
                                        $row_num++;
                                 }
                             }                                                         
                        ?>
                    <script type="text/javascript">
                    function loadBar() {
    
                            // bar chart:
                            
                            var m1 = <?php echo json_encode($mon) ?>;
                            var m2 = <?php echo json_encode($mon2) ?>;
                            var a1 = <?php echo json_encode($amo) ?>;
                            var data = [];
                            var ndat = [];
                            var data = GenerateSeries(0);
                            function GenerateSeries(added) {
                                
                
                                 
                                for (i = 0; i <= <?php echo $row_num ?>; i++) { 
                                    ndat.push([m2[i],a1[i]]);
                                    data[i] = {
                                        label:  m1[i],
                                        data: ndat[i]
                                    };
                                }
                                                
                                return data;
                            }
                
                            var options = {
                                series: {
                                    pie: {
                                        show: true
                                    }
                                },
                                legend : {
                                    show: false
                                }
                            };
                
                            if ($('#yut').size() !== 0) {
                                //for (i = 0; i <= ; i++) {                    
                                    //data.push([m2[i],a1[i]]);                              
                                    $.plot($("#yut"), data, options);
                                //}
                            }                                                                                                  
                    }
                    document.getElementById('cuinput').onchange = function(){                        
                        var cuyear = this.value;
                        $.ajax({
                			url: 'index.php?r=admin/chartreport/getdata',
                			type: "POST",
                			data: {memid: cuyear,search: true},
                			//success: function (response) {//response is value returned from php (for your example it's "bye bye"
                			success: function (data) {               			 
                                $("#grpdisplay").html(data);
                                $("#row01").css('display','inline');
                                $("#row02").css('display','inline');
                				//$("#grpdisplay").css('display','inline');
                                loadBar();
                                //$("#grpdisplay2").css('display','inline');
                                //document.writeline(data);
                			}
                		});                                  
                    }
                    </script>                    
                    <div class="row" id="row01" style="display: none;">
        				<div class="col-md-6">
        					<!-- BEGIN ALERTS PORTLET-->
        					<div class="portlet purple box">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-cogs"></i>สรุปหลักสูตรรายเดือน
        							</div>
        							<div class="tools">
        								<a href="javascript:;" class="collapse">
        								</a>
        								<a href="#portlet-config" data-toggle="modal" class="config">
        								</a>
        								<a href="javascript:;" class="reload">
        								</a>
        								<a href="javascript:;" class="remove">
        								</a>
        							</div>
        						</div>
        						<div class="portlet-body">
        							<div id="grpdisplay">
                                    </div>
        						</div>
        					</div>
        					<!-- END ALERTS PORTLET-->
        				</div>
        				<div class="col-md-6">
        					<!-- BEGIN ALERTS PORTLET-->
        					<div class="portlet yellow box">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-cogs"></i>สรุปหลักสูตรรายเดือน
        							</div>
        							<div class="tools">
        								<a href="javascript:;" class="collapse">
        								</a>
        								<a href="#portlet-config" data-toggle="modal" class="config">
        								</a>
        								<a href="javascript:;" class="reload">
        								</a>
        								<a href="javascript:;" class="remove">
        								</a>
        							</div>
        						</div>
        						<div class="portlet-body">
        							<div id="chart_1_1_legendPlaceholder">
        							</div>
        							<div id="yut" class="chart">
        							</div>
        						</div>
        					</div>
        					<!-- END ALERTS PORTLET-->
        				</div>
        			</div>
                    <div class="row" id="row02" style="display: none;">
        				<div class="col-md-6">
        					<!-- BEGIN ALERTS PORTLET-->
        					<div class="portlet purple box">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-cogs"></i>Table
        							</div>
        							<div class="tools">
        								<a href="javascript:;" class="collapse">
        								</a>
        								<a href="#portlet-config" data-toggle="modal" class="config">
        								</a>
        								<a href="javascript:;" class="reload">
        								</a>
        								<a href="javascript:;" class="remove">
        								</a>
        							</div>
        						</div>
        						<div class="portlet-body">
        							<div id="grpdisplay">
                                    </div>
        						</div>
        					</div>
        					<!-- END ALERTS PORTLET-->
        				</div>
        				<div class="col-md-6">
        					<!-- BEGIN ALERTS PORTLET-->
        					<div class="portlet yellow box">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-cogs"></i>Graph
        							</div>
        							<div class="tools">
        								<a href="javascript:;" class="collapse">
        								</a>
        								<a href="#portlet-config" data-toggle="modal" class="config">
        								</a>
        								<a href="javascript:;" class="reload">
        								</a>
        								<a href="javascript:;" class="remove">
        								</a>
        							</div>
        						</div>
        						<div class="portlet-body">
        							<div id="chart_1_1_legendPlaceholder">
        							</div>
        							<div id="yut" class="chart">
        							</div>
        						</div>
        					</div>
        					<!-- END ALERTS PORTLET-->
        				</div>
        			</div>
              </div>