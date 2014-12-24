<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> Insert Data </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
  <link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
  <link href="/assets/global/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/global/plugins/jquery-multi-select/css/multi-select.css"/>
  <!-- END PAGE LEVEL PLUGIN STYLES -->
  <!-- BEGIN PAGE STYLES -->
  <link href="/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
  <!-- END PAGE STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link href="/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
  <link id="style_color" href="/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
  <link href="/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
  <!-- END THEME STYLES -->
 </head>

 <body class="page-header-fixed page-quick-sidebar-over-content ">
    <div class="row"><span>&nbsp;</span></div>
    <div class="row"><span>&nbsp;</span></div>
    <div class="row">
        <div class="page-sidebar-wrapper">
            <?php include "menu.php"; ?>
        </div>
        <div class="page-content-wrapper">
            <div class="page-content">
                    <div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Bar Chart
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
                                    $mon[] = $row['month'];
                                    $amo[] = $row['amount'];
                                    $row_num++;
                             }                                                         
                        ?>
						<div class="portlet-body">
							<div id="chart_1_1_legendPlaceholder">
							</div>
							<div id="yut" class="chart">
							</div>
						</div>
					</div>
            </div>
        </div>
    </div>
<script src="/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script src="/assets/global/plugins/flot/jquery.flot.min.js"></script>
<script src="/assets/global/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="/assets/global/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="/assets/global/plugins/flot/jquery.flot.stack.min.js"></script>
<script src="/assets/global/plugins/flot/jquery.flot.crosshair.min.js"></script>
<script src="/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/form-samples.js"></script>
<script src="/assets/admin/pages/scripts/components-dropdowns.js"></script>
<!--script src="/assets/admin/pages/scripts/charts.js"></script-->
<script src="/assets/admin/pages/scripts/chartsCustom.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>

    function loadBar() {

            // bar chart:
            var data = GenerateSeries(0);

            function GenerateSeries(added) {
                var data = [];

                var m1 = <?php echo json_encode($mon) ?>;
                var a1 = <?php echo json_encode($amo) ?>; 
                for (i = 0; i <= <?php echo $row_num ?>; i++) {                    
                    data.push([m1[i], a1[i]]);
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
                    barWidth: 0.8,
                    lineWidth: 0, // in pixels
                    shadowSize: 0,
                    align: 'left'
                },

                grid: {
                    tickColor: "#eee",
                    borderColor: "#eee",
                    borderWidth: 1
                }
            };

            if ($('#yut').size() !== 0) {
                $.plot($("#yut"), [{
                    data: data,
                    lines: {
                        lineWidth: 1,
                    },
                    shadowSize: 0
                }], options);
            }
            
    }

jQuery(document).ready(function() {    
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    QuickSidebar.init(); // init quick sidebar
    Demo.init(); // init demo features
   FormSamples.init();
   loadBar();
});
</script>
<!-- END JAVASCRIPTS -->        
 </body>
</html>