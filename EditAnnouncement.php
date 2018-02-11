<?php
session_start();
if(!isset($_SESSION['id'])){
	echo '<script>window.location = "login.php";</script>';
}

$idannouncement ='';

if(!isset($_GET['id'])){
	echo '<script>window.location = "logoutFunction.php";</script>';
}
else{
	if(isset($_GET['id'])){
		$idannouncement = mysql_real_escape_string($_GET['id']);
		if(!is_numeric($idannouncement)){
			echo "<script> window.location = 'logoutFunction.php'; alert('Error in query string! Redirecting to login page.'); </script>";
		}
	}
}

require_once('config.php');
require("AccountHandler.php");
$conn = new Connect();
$handler = new AccountHandler();
$con = $conn -> connectDB();

$query = "SELECT * FROM announcement WHERE idannouncement = '".$idannouncement."' AND markedasdeleted = 0;";
$result = $conn->select($query);

?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREOTEC - Edit Announcement</title>

	<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">

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
								<li><a href="timeline.php"><i class="icon-newspaper"></i> <span>View Timeline</span></a></li>
								<li class="navigation-header"><span>Publish</span> <i class="icon-menu" title="Publish"></i></li>
								<li class="active"><a href="AddAnnouncement.php"><i class="icon-pencil7"></i> <span>Publish Announcement</span></a></li>
								
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
							<h4> <a href="timeline.php"> <i class="icon-arrow-left52 position-left"></i> </a> <span class="text-semibold">News & Announcements</span></h4>
						</div>
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">
					
					<div class="row">
						<div class="col-lg-12">

							<!-- Basic layout-->
							<form action="announcementFunction.php" method="POST" class="form-validate-jquery" enctype="multipart/form-data">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title"><i class="icon-bubble-lines4" style="margin-right: 10px"></i>Publish Announcement</h5>
										<div class="heading-elements">
					                	</div>
									</div>
										<?php 
											foreach($result as $ann){
										?>


									<div class="panel-body">
										<div class="form-group">
											<label><strong>Title:</strong> </label> 
											<input type="text" class="form-control" value="<?php echo $ann['title']; ?>" id="title" name="title" required>
										</div>

										<div class="form-group">
											<label><strong>Author:</strong> </label>
											<input type="text" class="form-control" value="<?php echo $ann['author']; ?>" id="author" name="author" required>
										</div>

										<div class="form-group">
											<label><strong>Body:</strong></label>
											<textarea rows="5" cols="5" class="form-control" id="body" name="body" required><?php echo $ann['body']; ?></textarea>
										</div>

										<div class="form-group">
											<label><strong>Upload Picture:</strong></label>
											<?php 
												if(!is_null($ann['picture'])){
													echo '<div class="form-group"><a class="lightbox" href="data:image/jpeg;base64,'.base64_encode($ann['picture']).'">
							                		<img class="img-center" src="data:image/jpeg;base64,'.base64_encode($ann['picture']).'"/>
							                		</a></div>';	
												}
											?>
											<input type="file" class="file-styled" id="picture" name="picture" accept="image/*">
										</div>

										<input type="hidden" id="idannouncement" name="idannouncement" value="<?php echo $ann['idannouncement']; ?>" />
										
										<?php
											}
										?>
									</div>

								<div class="panel-footer">
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
									</div>
								</div>

								</div>
							</form>
							<!-- /basic layout -->

						</div>
					</div>

				</div>
				<!-- Content area -->

			</div>
			<!-- /Main content -->

		</div>
		<!-- Page content -->
	</div>
	<!-- Page container -->
</body>
</html>