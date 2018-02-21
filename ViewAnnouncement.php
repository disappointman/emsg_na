<?php
session_start();
$id = "";
if(!isset($_GET['id'])){
	echo "<script> window.location = 'timeline.php';</script>";
}else{
	$id = mysql_real_escape_string($_GET['id']);
	if(!is_numeric($id)){
		echo "<script> window.location = 'timeline.php'; alert('Error in ID number.');</script>";
	}
}
require_once('config.php');
$connect = new Connect();
$query = "SELECT * FROM announcement WHERE idannouncement =".$id;
$announcements = $connect->select($query);

?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREOTEC - View Announcements</title>

	<link rel="shortcut icon" type="image/x-icon" href="assets/images/icon.png">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="assets/css/structure.css" rel="stylesheet" type="text/css">
	<link href="assets/css/animate.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
				<li><a style="display:<?php if(!isset($_SESSION['id'])) echo 'none;'; else echo 'block;'; ?>" class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					</li>
					<li class="dropdown dropdown-user" style="display:<?php if(!isset($_SESSION['id'])) echo 'none;'; else echo 'block;'; ?>">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<span>
								<?php 
								if(isset($_SESSION['id'])){
									$query = "SELECT * FROM user, user_information WHERE user.iduser_information = user_information.iduser_information AND iduser =".$_SESSION['id'];
									$accounts = $connect -> select($query);
									foreach($accounts as $account){
										echo $account['lastname'].", ". $account['firstname']." ". $account['middlename'];
									}
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
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
									<?php
	   									foreach($announcements as $anntype){
									?>
								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main"></i></li>
								<li <?php if($anntype['announcementtype'] == "1") echo "class='active'"; ?> ><a href="timeline.php?type=1"><i class="icon-newspaper"></i> <span>View Timeline</span></a></li>
								<li <?php if($anntype['announcementtype'] == "2") echo "class='active'"; ?> ><a href="timeline.php?type=2"><i class="icon-newspaper"></i> <span>View Employee's Timeline</span></a></li>
								<li class="navigation-header" <?php if($_SESSION['emp_type'] == "2") echo "style='display:none;'"; ?> ><span>Publish</span> <i class="icon-menu" title="Publish"></i></li>
								<li <?php if($_SESSION['emp_type'] == "2") echo "style='display:none;'"; ?> ><a href="AddAnnouncement.php"><i class="icon-pencil7"></i> <span>Publish Announcement</span></a></li>
								
									<?php 
									}?>
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
							<h4> <a href="timeline.php"> <i class="icon-arrow-left52 position-left"></i> </a> <span class="text-semibold">News & Announcements</span><!--  - Announcement --></h4>
						</div>
					</div>
				</div>				
				<div class="container" style="width: 90%;">
  					<div class="row">
  						<!-- to middle the mid -->
  						<div class="col-md-1">
  						</div>
  						<!-- to middle the mid -->
  						<div class="col-md-10">
	   						<div class="singlepost_area">
	   							<div class="singlepost_content"> 
	   								<?php
	   									foreach($announcements as $ann){
									?>

					        		 <span class="stuff_category">
					        		 	<?php
					        		 	$date = $ann['dateandtime'];
					        		 	echo date("h:i A", strtotime($date));
					        		 	?>
					        		 </span> 
					        		
					              	<span class="stuff_date"><?php 
					        			echo date("M", strtotime($date));

					        		?> <strong> <?php 
					        			echo date("d", strtotime($date));
					        		?> </strong></span>

					                <h2><?php 
					                	$title = $ann['title'];
					                	echo $title;
					                ?></h2>
					                <label class="stuff_category">By: <?php
					                	$author = $ann['author'];
					                	echo $author;
					                ?>
					                </label>
					                
					                <?php
					                $image = $ann['picture'];
					                if(!is_null($image)){
					                	echo '<a class="lightbox" href="data:image/jpeg;base64,'.base64_encode($image).'">
					                		<img style="max-width: 100%; max-height: 100%; vertical-align: middle; padding-bottom: 20px;" class="img-center" src="data:image/jpeg;base64,'.base64_encode($image).'"/>
					                		</a>';
					                }
					                ?>

					                <p>
					                	<?php
					                		$body = $ann['body'];
					                		echo nl2br(htmlspecialchars($body));
					                	?>
					                </p>

					                <!-- <blockquote>Donec volutpat nibh sit amet libero ornare non laoreet arcu luctus. Donec id arcu quis mauris euismod placerat sit amet ut metus. Sed imperdiet fringilla sem eget euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque adipiscing, neque ut pulvinar tincidunt, est sem euismod odio, eu ullamcorper turpis nisl sit amet velit. Nullam vitae nibh odio, non scelerisque nibh. Vestibulum ut est augue, in varius purus.</blockquote> -->
					               
					               <!-- pagination -->
					               <!-- <div class="singlepage_pagination"> <a class="previous_btn" href="#">Previous</a> <a class="next_btn" href="#">Next</a> </div> -->
					               
					                <!-- share link -->
					                <div class="social_area wow fadeInLeft" <?php if($ann['announcementtype'] == "2") echo "style='display:none;'"; ?> >
					                	<h5>Share via:</h5>
					                <?php
					                	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					                 ?>

					                  <ul>
					                    <li><a href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link; ?>" target="_blank"><span class="fa fa-facebook"></span> <!-- <img src="assets/images/somacro/facebook.png" alt="facebook"/> --></a></li>
					                    <li><a href="https://twitter.com/share?url=<?php echo $actual_link; ?>&amp;text=Announcement!%20Check%20this%20out!&amp;hashtags=CREOTEC"><span class="fa fa-twitter"></span> <!--<img src="assets/images/somacro/twitter.png" alt="twitter"/>--> </a></li>
					                    <li><a href="https://plus.google.com/share?url=<?php echo $actual_link; ?>" class="fa fa-google-plus"> <!-- <img src="assets/images/somacro/google.png" alt="google+"/> --></a></li>
					                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $actual_link; ?>"> <span class="fa fa-linkedin"></span> <!-- <img src="assets/images/somacro/linkedin.png" alt="linked in"/> --></a></li>
					                  	<!--  <li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><span class="fa fa-pinterest"></span><img src="assets/images/somacro/pinterest.png" alt="pinterest"/></a></li>-->
					                  </ul>
					                </div>

					                <!-- author -->
					                <!-- <div class="author"> <a href="#"><img src="../images/100x100.jpg" alt=""></a>
					                  <div class="author_details">
					                    <h3><a href="#">Author Name</a></h3>
					                    <p>About Author Content lobortis. Proin ut nibh quis felis auctor ornare. Cras ultricies, nibh at mollis faucibus, justo eros porttitor mi, quis auctor lectus arcu sit amet nunc. Vivamus gravida vehicula arcu, vitae vulputate augue lacinia faucibus</p>
					                  </div>
					                </div> -->

					                <div class="author" <?php if(!isset($_SESSION['id']) || $_SESSION['emp_type'] == "2") echo 'style="display:none;";'; ?>>
					                  <div class="author_details">
					                    <h5>Administrative Tools:</h5>
					                    <span class="heading-btn pull-right"> 
											<a href='deleteannouncement.php?id=<?php echo $ann["idannouncement"];?>' onclick="confirm('Are you sure you want to delete this post?');" class="btn btn-link">Delete post <i class="icon-cog5 position-right"></i></a>
											<a href='EditAnnouncement.php?id=<?php echo $ann["idannouncement"];?>' class="btn btn-link">Edit post <i class="icon-pencil7 position-right"></i></a>
											</span>
					                  </div>
					                </div>

	   							<?php

	   							}
	   							?>
				              </div>
				            </div>
				        </div>
  						<!-- to middle the mid -->
  						<div class="col-md-1">
  						</div>
  						<!-- to middle the mid -->
				    </div>
				</div>
			</div>
			<!-- /Main content -->
		</div>
		<!-- Page content -->
	</div>
	<!-- Page container -->
</body>
</html>