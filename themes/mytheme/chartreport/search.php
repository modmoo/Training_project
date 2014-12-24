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
            					<form action="<?php echo $_SERVER['PHP_SELF'].'?menu=004'; ?>" class="form-horizontal" method="POST">
            						<div class="form-body">
            						<h3 class="form-section">Search Employees</h3>
            							<div class="row">
            								<div class="col-md-6">
            									<div class="form-group">
            										<label class="control-label col-md-3">Employees ID</label>
            										<div class="col-md-9">
            											<input type="text" class="form-control" placeholder="Eight Digit" name="empid" />
            												<span class="help-block">
            												</span>
            										</div>
            									</div>
            								</div>
            								<!--/span-->
            								<div class="col-md-6">
            									<div class="form-group">
            										<div class="col-md-offset-3 col-md-9">
            											<input type="submit" class="btn blue-steel " name="search" value="Search" />            											
                                                        <button type="reset" class="btn default ">Cancel</button>
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
                        if(isset($_POST['search'])){								
                            include 'dbconnect.php';
                            if ($_POST['empid'] == ' '){
                                $sqlstr = "SELECT * FROM employees WHERE pernr = '".$_POST["empid"]."';";    
                            }else {
                                $sqlstr = "SELECT * FROM employees;";
                            }
                            $result = mysql_query($sqlstr,$db);                            
        						echo '<div class="portlet-body">';
        						echo '	<div class="table-scrollable">';
        						echo '		<table class="table table-striped table-hover">';
        						echo '		<thead>';
        						echo '		<tr>';
        						echo '			<th>';
        						echo '				 #';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 First Name';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 Last Name';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 Birthday';
        						echo '			</th>';
        						echo '			<th>';
        						echo '				 Gender';
        						echo '			</th>';
        						echo '		</tr>';
        						echo '		</thead>';
        						echo '		<tbody>';
                                $i = 1;
                                while($row = mysql_fetch_array($result)){
                                    echo '		<tr>';
            						echo '			<th>';
            						echo $i;
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['fname'];
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['lname'];
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['birthdate'];
            						echo '			</th>';
            						echo '			<th>';
            						echo $row['gender'];
            						echo '			</th>';
            						echo '		</tr>'; 
                                    $i++;
                                }
        						echo '		</tbody>';
        						echo '		</table>';
        						echo '	</div>';
        						echo '</div>';
                        }
                    ?>
              </div>