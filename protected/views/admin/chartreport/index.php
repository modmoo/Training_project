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
    jQuery(document).ready(function () {
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
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?menu=004'; ?>" class="form-horizontal" method="POST" id="FORM_ID">
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
                                            $retqry = mysql_query($optstr, $dbhandle);
                                            while ($optval = mysql_fetch_array($retqry)) {
                                                echo '<option value="' . $optval["y1"] . '">' . $optval["y1"] . '</option>';
                                            }
                                            mysql_close($dbhandle);
                                            ?>                                                           
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

    <script type="text/javascript">
        function loadBar(m1, m2, a1, r1) {

            // bar chart:

            var data = [];
            var ndat = [];
            var data = GenerateSeries(0);
            function GenerateSeries(added) {



                for (i = 0; i <= r1; i++) {
                    ndat.push([m2[i], a1[i]]);
                    data[i] = {
                        label: m1[i],
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
                legend: {
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
        function loadBar2(mm1, mm2, aa1, rr1) {


            var data = [];
            var ndat = [];
            var data = GenerateSeries(0);
            function GenerateSeries(added) {



                for (i = 0; i <= rr1; i++) {
                    //ndat.push([mm2[i],aa1[i]]);
                    data[i] = {
                        label: mm1[i],
                        data: aa1[i]
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
                legend: {
                    show: false
                }
            };

            if ($('#yut2').size() !== 0) {
                //for (i = 0; i <= ; i++) {                    
                //data.push([m2[i],a1[i]]);                              
                $.plot($("#yut2"), data, options);
                //}
            }
        }
        document.getElementById('cuinput').onchange = function () {
            var cuyear = this.value;
            $.ajax({
                url: 'index.php?r=admin/chartreport/getdata1',
                //url: 'genchart.php',
                type: "POST",
                data: {memid: cuyear, search: true},
                //success: function (response) {//response is value returned from php (for your example it's "bye bye"
                success: function (data) {
                    $("#grpdisplay").html(data);
                    $("#row01").css('display', 'inline');
                    $("#row02").css('display', 'inline');
                    //alert(data);
                }
            });
            $.ajax({
                url: 'index.php?r=admin/chartreport/getchart1',
                //url: 'genchart.php',
                type: "POST",
                data: {yrt: cuyear, search: true},
                //success: function (response) {//response is value returned from php (for your example it's "bye bye"
                success: function (data) {
                    var d1 = JSON.parse(data);
                    loadBar(d1.tm1, d1.tm2, d1.ta1, d1.tr1);
                    //alert(data);
                }
            });
            $.ajax({
                url: 'index.php?r=admin/chartreport/getdata2',
                type: "POST",
                data: {memid: cuyear, search: true},
                //success: function (response) {//response is value returned from php (for your example it's "bye bye"
                success: function (data) {
                    $("#grpdisplay2").html(data);
                    $("#row02").css('display', 'inline');
                    //alert(data);
                }
            });
            $.ajax({
                url: 'index.php?r=admin/chartreport/getchart2',
                type: "POST",
                data: {yrt: cuyear, search: true},
                //success: function (response) {//response is value returned from php (for your example it's "bye bye"
                success: function (data) {
                    var d1 = JSON.parse(data);
                    //loadBar(d1.tm1,d1.tm2,d1.ta1,d1.tr1);
                    loadBar2(d1.tm1, d1.tm2, d1.ta1, d1.tr1);
                    //  alert(d1);                                
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
                        <i class="fa fa-cogs"></i>กราฟสรุปหลักสูตรรายเดือน
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
                        <i class="fa fa-cogs"></i>สรุปหลักสูตรรายปี
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
                    <div id="grpdisplay2">
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
                        <i class="fa fa-cogs"></i>กราฟสรุปหลักสูตรรายปี
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
                    <div id="yut2" class="chart">
                    </div>
                </div>
            </div>
            <!-- END ALERTS PORTLET-->
        </div>
    </div>
</div>