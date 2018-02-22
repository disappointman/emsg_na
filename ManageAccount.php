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
$results = $handler->getAccounts();
$num = $results->num_rows;
if($num == 0){
	echo "<script> window.location = 'ManageAccount.php';alert('Account does not exist or already deleted!');</script>";	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREOTEC - Accounts</title>

	<link rel="shortcut icon" type="image/x-icon" href="assets/images/icon.png">
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
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_data_sources.js"></script>
	<script type="text/javascript" src="assets/js/pages/components_modals.js"></script>
	<!-- /theme JS files -->
</head>
<style type="text/css">
	th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
 
    div.container {
        width: 80%;
    }
</style>
<body>
	<!-- Main navbar -->
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
									$resulte= $handler->getNameById($_SESSION['id']);
									echo $resulte;
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
								<li><a href="AddAccount.php"><i class="icon-user"></i> <span>Add Account</span></a></li>
								<li class="active"><a href="ManageAccount.php"><i class="icon-cog5"></i> <span>Manage Accounts</span></a></li>
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
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Manage Accounts</h5>
										<div class="heading-elements">
								   		</div>
									</div>

									<div class="panel-body">
										<table class="table datatable-html" style='font-size: 13px;' name="table1" id="table1">
											<thead style="font-size: 13px;">
												<tr>
													<th>Username</th>
									                <th>Full Name</th>
									                <th>E-mail</th>
									                <th>Contact Number</th>
									                <th class="text-center">Actions</th>
									            </tr>
											</thead>

											<tbody style="font-size: 12px;">
												<?php if($results){
													foreach($results as $result){
													?>
										            <tr>
										            	<td><?php echo $result['username'];?></td>
										                <td><?php echo $result['lastname'].", ". $result['firstname'] . " ".$result['middlename'];?></td>
										                <td><?php echo $result['email'];?></td>
										                <td><?php echo $result['contact_number'];?></td>
														<td class="text-center">
															<a href="EditAccount.php?id=<?php echo $result['iduser'];?>" id="update" name="update" style="color: #2980b9"><i class="icon-pencil" style="margin-right: 3px;"></i>Update</a>
															<a href="#" name="sample" id="sample" style="color: #d35400;" onclick="promptDelete(<?php echo $result['iduser']; ?>)"><i class="icon-trash" style="margin-left: 5px; margin-right: 3px;"></i>Delete</a>
																	
														</td>
										            </tr>
									            <?php }}?>   
									        </tbody>
										</table>
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
		<!-- Page content -->

	</div>
	<!-- Page container -->
	<script type="text/javascript">
	    // Warning alert
		$('#table1').dataTable( {
		  "columnDefs": [ {
			"targets": 2,
			"orderable": false
			} ]
		} );
	    function promptDelete(val){
	    	swal({
	            title: "Are you sure?",
	            text: "You will not be able to recover this information!",
	            type: "warning",
	            showCancelButton: true,
	            confirmButtonColor: "#FF7043",
	            confirmButtonText: "Delete",
	            closeOnConfirm: true,
	            closeOnCancel: true
	       	},
	       	function(isConfirm){
	      		if(isConfirm){
	       			deleteSchool(val);
	       		}
	        });
	    }

	    function deleteSchool(val){
	    	$.ajax({
				type: "POST",
				url: "accountFunction.php",
				data: 'iduser=' + val,
				success: function(data){
					window.location ='ManageAccount.php';
				}
			});
		}
	</script>
</body>
</html>