            <div class="page-content">
            	<div class="tab-pane" id="tab_2">								
            		<div class="portlet light bg-inverse">
            			<div class="portlet-title">
            				<div class="caption">
            					<i class="icon-equalizer font-green-haze"></i>
            						<span class="caption-subject font-green-haze bold uppercase">Employees Data</span>
            						<span class="caption-helper">insert-delete</span>
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
            					<form action="process.php" class="form-horizontal" method="POST">
            						<div class="form-body">
            						<h3 class="form-section">Person Info</h3>
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
            										<label class="control-label col-md-3">Job ID</label>
            										<div class="col-md-9">
            											<input type="text" class="form-control" placeholder="Ten Digit" name="orgid" />
            											<span class="help-block">
            											</span>
            										</div>
            									</div>
            								</div>
            								<!--/span-->
            							</div>
                                        <div class="row">
            								<div class="col-md-6">
            									<div class="form-group">
            										<label class="control-label col-md-3">First Name</label>
            										<div class="col-md-9">
            											<input type="text" class="form-control" placeholder="Kavin" name="empfname" />
            												<span class="help-block">
            												</span>
            										</div>
            									</div>
            								</div>
            								<!--/span-->
            								<div class="col-md-6">
            									<div class="form-group">
            										<label class="control-label col-md-3">Last Name</label>
            										<div class="col-md-9">
            											<input type="text" class="form-control" placeholder="Claire" name="emplname" />
            											<span class="help-block">
            											</span>
            										</div>
            									</div>
            								</div>
            								<!--/span-->
            							</div>
            							<!--/row-->
            							<div class="row">
            								<div class="col-md-6">
            									<div class="form-group">
            										<label class="control-label col-md-3">Gender</label>
            										<div class="col-md-9">
            											<select class="form-control" name="empgender">
            												<option value="Male">Male</option>
            												<option value="Female">Female</option>
            											</select>
            											<span class="help-block">
            												Select your gender. </span>
            										</div>
            									</div>
            								</div>
            								<!--/span-->
            								<div class="col-md-6">
            									<div class="form-group">
            										<label class="control-label col-md-3">Date of Birth</label>
            										<div class="col-md-9">
            											<input type="text" class="form-control" placeholder="dd/mm/yyyy" name="empbirth" />
            										</div>
            									</div>
            								</div>
            								<!--/span-->
            							</div>						
            						</div>
            							<div class="form-actions">
            								<div class="row">
            									<div class="col-md-6">
            										<div class="row">
            											<div class="col-md-offset-3 col-md-9">
            												<input type="submit" class="btn blue-steel " name="insert" value="Submit" />
            												<input type="submit" class="btn red-sunglo " name="delete" value="Delete" />
                                                            <button type="reset" class="btn default ">Cancel</button>
            											</div>
            										</div>
            									</div>
            									<div class="col-md-6">
            									</div>
            								</div>
            							</div>
            					</form>
            					<!-- END FORM-->
            				</div>
            			</div>
            		</div>
              </div>