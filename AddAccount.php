<?php
session_start();

if(!isset($_SESSION['id'])){
	echo "<script> window.location = 'login.php';</script>";
}

if($_SESSION['emp_type'] == "2"){
	echo "<script> window.location = 'login.php';</script>";
}

require("config.php");
require("AccountHandler.php");
$handler = new AccountHandler();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREOTEC - Accounts</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_validation.js"></script>
	<!-- /theme JS files -->

</head>
<body>
	<div class="navbar navbar-default">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					</li>
					<li class="dropdown dropdown-user" style="display:<?php if(!isset($_SESSION['id'])) echo 'none;'; else echo 'block;'; ?>">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<span>
								<?php 
								if(isset($_SESSION['id'])){
									$results= $handler->getNameById($_SESSION['id']);
									echo $results;
								}
								?>
							</span>
							<i class="caret"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<!-- <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li> -->
							<li><a href="logoutFunction.php"><i class="icon-switch2"></i> Logout</a></li>
						</ul>
					</li>
					
					<!-- if not logged in -->
					<li style="display:<?php if(!isset($_SESSION['id'])) echo 'block;'; else echo 'none;'; ?>">
						<a href="login.php"><i class="icon-switch2"></i> Log in</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								
								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main"></i></li>
								<li><a href="timeline.php?type=1"><i class="icon-newspaper"></i> <span>View Timeline</span></a></li>
								<li><a href="timeline.php?type=2"><i class="icon-newspaper"></i> <span>View Employee's Timeline</span></a></li>
								<li class="navigation-header"><span>Publish</span> <i class="icon-menu" title="Publish"></i></li>
								<li><a href="AddAnnouncement.php"><i class="icon-pencil7"></i> <span>Publish Announcement</span></a></li>
								<li class="navigation-header"><span>Accounts</span> <i class="icon-user" title="Accounts"></i></li>
								<li class="active"><a href="AddAccount.php"><i class="icon-user"></i> <span>Add Account</span></a></li>
								<li><a href="ManageAccount.php"><i class="icon-cog5"></i> <span>Manage Accounts</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /main navigation -->
				</div>
			</div>
			<!-- /main sidebar -->

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
                <div class="page-header page-header-default">
                	<div class="page-header-content">
                    	<div class="page-title">
                        	<h4><span class="text-semibold">Accounts</span></h4>
                        </div>
                    </div>
                </div>
                <!-- /page header -->

                <!-- Content area -->
                <div class="content">
                	<div class="row">
                    	<div class="col-lg-12">
                        	<div class="panel panel-white">

                            	<div class="panel-heading">
                                	<div class="panel-title">
                                    	<h3 class="panel-title">Add Account</h3>
                                    </div>


                                    <div class="heading-elements">
                                    	<div class="heading-btn-group">
                                        </div>
                                   </div>
                                </div>

                                <div class="panel-body">
                                	<form class="form-validate-jquery" action="accountfunction.php" method="POST">
	                                	<fieldset class="content-group">
	                                    	<legend>
	                                        	<h5 class="text-bold"><i class="icon-vcard" style="margin-right: 10px"></i>Personal Information</h5>
	                                        </legend>
	                                        
	                                        <div class="col-lg-12">
	                     						<div class="row">
	                                            	<div class="col-md-4">
	                                                	<div class="form-group has-feedback">
	                                                    	<label><span class="text-danger">* </span><strong>Last Name:</strong></label>
	                                                        <input ID="txtLastName" name="txtLastName" class="form-control" required="required" maxlength="45" ></input>
	                                                    </div>
	                                                </div>

	                                                <div class="col-md-4">
	                                                	<div class="form-group has-feedback">
	                                                    	<label><span class="text-danger">* </span><strong>First Name:</strong></label>
	                                                        <input ID="txtFirstName" name="txtFirstName" class="form-control" required="required" maxlength="45"></input>
	                                                    </div>
	                                                </div>

	                                                <div class="col-md-4">
	                                                	<div class="form-group has-feedback">
	                                                    	<label><span class="text-danger">* </span><strong>Middle Name:</strong></label>
	                                                        <input ID="txtMiddleName" name ="txtMiddleName" class="form-control" maxlength="45"></input>
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            <div class="row">
	                                            	<div class="col-md-3">
	                                                	<div class="form-group has-feedback">
	                                                    	<label><span class="text-danger">* </span><strong>Cellphone Number:</strong></label>
	                                                        <input type="text" id="txtCellphoneNumber" name="txtCellphoneNumber" class="form-control" data-mask="(+63)999-999-9999" maxlength="17" placeholder="(+63)999-999-9999">
	                                                    </div>
	                                                </div>

	                                                <div class="col-md-3">
	                                                	<div class="form-group has-feedback">
	                                                    	<label><span class="text-danger">* </span><strong>Email Address:</strong></label>
	                                                        <input type="email" id="txtEmail" name="txtEmail" class="form-control" maxlength="45">
	                                                    </div>
													</div>
												</div>	
	                                        </div>

		                                    <legend>
		                                    	<h5 class="text-bold"><i class="icon-user-lock" style="margin-right: 10px"></i>Account Information</h5>
		                                    </legend>
											<div class="col-lg-12">
	                                        	<div class="row">
	                                            	<div class="col-md-6">
	                                                	<div class="form-group has-feedback">
	                                                    	<label><span class="text-danger">* </span><strong>Username:</strong></label>
	                                                        <input ID="txtUsername" name="txtUsername" class="form-control" MinLength="6" maxlength="20" required="required"></input>
	                                                        
	                                                        <div class="form-control-feedback">
	                                                        	<i class=" icon-user text-muted"></i>
	                                                        </div>
	                                                    </div>
	                                                </div>

	                                                <div class="col-md-6">
	                                                	<div class="form-group has-feedback">
	                                                    	<label><span class="text-danger">* </span><strong>Password:</strong></label>
	                                                        <input ID="txtPassword" name="txtPassword" class="form-control" type="password" maxlength="20" required="required" MinLength="6"></input>
	                                                        
	                                                        <div class="form-control-feedback">
	                                                        	<i class=" icon-lock text-muted"></i>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row">
		                                           	<div class="col-md-6">
		                                           	</div>
		                                           	<div class="col-md-6">
	                                                    <div class="form-group has-feedback">
	                                                    	<label><span class="text-danger">* </span><strong>Re-enter Password:</strong></label>
	                                                        <input ID="txtRepeatPassword" name="txtRepeatPassword" class="form-control" type="password" MinLength="6"  maxlength="20" required="required" equalTo="#txtPassword"></input>
	                                                        <div class="form-control-feedback">
	                                                        	<i class="icon-lock text-muted"></i>
	                                                        </div>
	                                                    </div>
	                                                </div>
												</div>
	                                        </div>
		                                </fieldset>
		                                <div class="text-right">
											<button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
											<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</form>                  
            	                </div>
                	        </div>
                    	</div>
                	</div>           
				</div>
            	<!-- /Content area -->
			</div>
			<!-- /Main content -->
		</div>
		<!-- Page content -->
	</div>
	<!-- Page container -->
</body>
</html>