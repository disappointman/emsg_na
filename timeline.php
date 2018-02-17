<?php
session_start();

if(!isset($_GET['type'])){
	echo "<script> window.location = 'logoutFunction.php';</script>";
}

$anntype = mysql_real_escape_string($_GET['type']);
if(!is_numeric($anntype)){
	echo "<script> window.location = 'logoutFunction.php';</script>";	
}
else{
	if($anntype != "1" && $anntype != "2")
	{
		echo "<script> window.location = 'logoutFunction.php';</script>";	
	}
	if($anntype == "2" && !isset($_SESSION['id']))
	{
		echo "<script> window.location = 'logoutFunction.php';</script>";	
	}
}

if(!isset($_SESSION['counter'])){
	$_SESSION['counter'] = 3;
}
if($_SESSION['counter']!=0)
	$counter = $_SESSION['counter'];
else
	$counter = 3;

require_once('config.php');
require("AccountHandler.php");
$conn = new Connect();
$handler = new AccountHandler();
$con = $conn -> connectDB();
$query = "SELECT * FROM announcement WHERE markedasdeleted = 0 AND announcementtype = '".$anntype."' ORDER BY dateandtime DESC LIMIT $counter";
$announcements = $conn->select($query);
$visible = 'block';

if($counter > mysqli_num_rows($announcements)){
	$visible = 'none';
}

?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREOTEC - Announcement Feed</title>

	<link rel="shortcut icon" type="image/x-icon" href="assets/images/icon.png">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="assets/css/gallery-clean.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
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
	<script type="text/javascript" src="assets/js/pages/timelines.js"></script>
	<!-- /theme JS files -->

	<style type="text/css">
		
		.center{
		    display:block;
		    margin:auto;
		}

	</style>
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
				<li><a style="display:<?php if(!isset($_SESSION['id'])) echo 'none;'; else echo 'block;'; ?>" class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					</li>
					<!-- if logged in -->
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
			<div class="sidebar sidebar-main sidebar-default" <?php if(!isset($_SESSION['id'])) echo 'style=display:none;'; ?> >
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible" >
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main"></i></li>
								<li <?php if($anntype == "1") echo "class='active'"; ?> ><a href="timeline.php?type=1"><i class="icon-newspaper"></i> <span>View Timeline</span></a></li>
								<li <?php if($anntype == "2") echo "class='active'"; ?> ><a href="timeline.php?type=2"><i class="icon-newspaper"></i> <span>View Employee's Timeline</span></a></li>
								<li class="navigation-header"><span>Publish</span> <i class="icon-menu" title="Publish"></i></li>
								<li><a href="AddAnnouncement.php"><i class="icon-pencil7"></i> <span>Publish Announcement</span></a></li>
								
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
							<h4> <span class="text-semibold">News & Announcements</span> - Timeline</h4>
						</div>
					</div>
				</div>

				<div class="panel-body">

					<!-- Timeline -->
					<div class="timeline timeline-left">
						<div class="timeline-container">

							<!-- Announcement -->
						    <?php 
						    if($announcements){
								foreach($announcements as $info){?>

								<div class="timeline-row">
									<div class="timeline-icon" title="Announcement">
										<div class="bg-info-400">
											<i class="icon-bubble-lines4"></i>
										</div>
									</div>

									<div class="panel panel-white timeline-content">
										<div class="panel-heading">
											<h3 class="panel-title"><?php echo $info['author'];?></h3>
											<div class="heading-elements">
												<h3 class="panel-title text-muted"><?php echo date("M. d, Y - H:i A", strtotime($info['dateandtime']));?></h3>
						                	</div>
										</div>

										<div class="panel-body">
											<div class="col-lg-8">
												<h3 class="text-semibold"><?php echo $info['title'];?></h3>
												<p class="content-group"><?php if(strlen($info['body']) > 140) echo substr($info['body'], 0, 140)."..."; else echo $info['body']; ?></p>
											</div>

											<div class="col-lg-4">
												<div class="gallery-container">
												    <div class="tz-gallery">
												        <div class="row">
												        	<center>
												        		<div class="col-sm-6 col-md-6">
												        		<?php  
												        			if(!is_null($info['picture'])){
													                	echo '<img style="max-width: 100%; max-height: 100%; vertical-align: middle;		    padding-bottom: 20px;" src="data:image/jpeg;base64,'.base64_encode($info['picture']).'"/>';
													                }
													             ?>
													            </div>
													            <!-- <div class="col-sm-3 col-md-3">
													                <a class="lightbox" href="assets/images/backgrounds/3.jpg">
													                    <img src="assets/images/backgrounds/3.jpg">
													                </a>
													            </div>
													            <div class="col-sm-3 col-md-3">
													                <a class="lightbox" href="assets/images/backgrounds/4.jpg">
													                    <img src="assets/images/backgrounds/4.jpg">
													                </a>
													            </div>
													            <div class="col-sm-3 col-md-3">
													                <a class="lightbox" href="assets/images/backgrounds/3.jpg">
													                    <img src="assets/images/backgrounds/3.jpg">
													                </a>
													            </div>
													            <div class="col-sm-3 col-md-3">
													                <a class="lightbox" href="assets/images/backgrounds/4.jpg">
													                    <img src="assets/images/backgrounds/4.jpg">
													                </a>
													            </div>
													            <div class="col-sm-3 col-md-3">
													                <a class="lightbox" href="assets/images/backgrounds/3.jpg">
													                    <img src="assets/images/backgrounds/3.jpg">
													                </a>
													            </div>
													            <div class="col-sm-3 col-md-3">
													                <a class="lightbox" href="assets/images/backgrounds/5.jpg">
													                    <img src="assets/images/backgrounds/5.jpg">
													                </a>
													            </div> -->
												            </center>
												        </div>
												    </div>
												</div>
											</div>
										</div>

										<div class="panel-footer">
											<div class="heading-elements">
												<span class="heading-btn pull-right"> 
													<a href='ViewAnnouncement.php?id=<?php echo $info["idannouncement"];?>' class="btn btn-link">Read post <i class="icon-arrow-right14 position-right"></i></a>
													<a href='EditAnnouncement.php?id=<?php echo $info["idannouncement"];?>' <?php if(!isset($_SESSION['id'])) echo 'style=display:none;'; ?> class="btn btn-link">Edit post <i class="icon-pencil7 position-right"></i></a>
													<!-- <a href="#" class="btn btn-link"><i class="icon-share2 position-right"></i> Share</a> -->
												</span>
											</div>
										</div>
									</div>

								</div>
									
							<?php }
							} else{
								echo "<script> alert('Nothing posted!');</script>";
							}
							?>
							<!-- /Annoucement -->

						</div>
					</div>
					<!-- Timeline -->
					
					<!-- Load More -->
			        <div class="row">
					    <div class="text-center" style='display:<?php echo $visible; ?>'>
					        <a class="btn btn-link" <?php echo 'href="counterSetter.php?type='.$_GET['type'].'"'; ?> >Load More...</a>
					        <label> </label>
					    </div>
					    <div class="text-center" style='display:<?php if($visible == "none") { echo "block"; } else { echo "none"; }?>'>
					        <label> Nothing follows... </label>
					    </div>
					    
					</div>
					<!-- Load More -->

				</div>
			</div>
			<!-- /Main content -->
		</div>
		<!-- Page content -->
	</div>
	<!-- Page container -->
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>