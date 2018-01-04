<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREOTEC - Enrollment</title>

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
	<script type="text/javascript" src="assets/js/plugins/forms/wizards/stepy.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/legacy.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/wizard_stepy.js"></script>
	<script type="text/javascript" src="assets/js/pages/picker_date.js"></script>
	<script type="text/javascript" src="assets/js/pages/uploader_bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/plugins/uploaders/fileinput.min.js"></script>
	<!-- /theme JS files -->
</head>

<body>
	<!-- Main navbar -->
	<div class="navbar navbar-default">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php"><img src="assets/images/logo_light.png" alt=""></a>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">
					
					<!-- Wizard with validation -->
		            <div class="panel panel-white">
						<div class="panel-heading">
							<div class="text-center">
								<h2 class="panel-title">Application Form</h6>
							</div>
						</div>

	                	<form class="stepy-validation form-validate-jquery" action="#">
	                		<fieldset title="1">
								<legend class="text-semibold">Batch Code</legend>
								<div class="row">
									<div class="col-md-6 col-md-offset-3">
											<div class="form-group">
												<h5>Enter your Batch Code: <span class="text-danger">*</span></h5>
												<input type="text" id="batchcode" name="batchcode" class="form-control">
											</div>
										</div>
								</div>
							</fieldset>

							<fieldset title="2">
								<legend class="text-semibold">Picture </legend>

								<div class="row">
									<div class="col-lg-6 col-md-offset-3">
										<label class="control-label col-lg-12">Upload your picture:<span class="text-danger">*</span></label>
										<input type="file" id="picture" name="picture" class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
									</div>
								</div>
							</fieldset>

							<fieldset title="3">
								<legend class="text-semibold">General Information</legend>
								<div class="row">
									<legend class="text-bold">Name</legend>
									<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-lg-3">Last Name:<span class="text-danger">*</span></label>
												<input type="text" id="lname" name="lname" class="form-control" required="required">
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-lg-3">First Name:<span class="text-danger">*</span></label>
												<input type="text" id="fname" name="fname" class="form-control" required="required">
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-lg-4">Middle Name:</label>
												<input type="text" class="form-control">
											</div>
										</div>
								</div>

								<div class="row">
									<legend class="text-bold">Address</legend>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label col-lg-3">Province:<span class="text-danger">*</span></label>
											<select class="form-control"></select> 
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label col-lg-6">City / Municipality:<span class="text-danger">*</span></label>
											<select class="form-control"></select> 
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label col-lg-3">Barangay:<span class="text-danger">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-lg-3">Subdivision / Village:</label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-lg-6">House No./ Building No./ St./ Block / Lot</label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>

								<div class="row">
									<legend class="text-bold">School</legend>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-lg-5">School Name:<span class="text-danger">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-lg-5">School Address:<span class="text-danger">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-lg-6">Choose your Strand:<span class="text-danger">*</span></label>
											<select class="form-control">
												<option></option>
											</select> 
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-lg-6">Target Course:<span class="text-danger">*</span></label>
											<select class="form-control">
												<option></option>
											</select> 
										</div>
									</div>
								</div>
							</fieldset>

							<fieldset title="4">
								<legend class="text-semibold">Personal Information</legend>
								<div class="row" style="margin-bottom: 20px;">
									<div class="col-md-6">
										<label class="control-label col-lg-6">Birthdate: <span class="text-danger">*</span></label>
										<input type="text" class="form-control pickadate-accessibility">
									</div>

									<div class="col-md-6">
										<label class="control-label col-lg-3">Sex: <span class="text-danger">*</span></label>
										<select class="select">
											<option Text="" value="0"></option>
											<option Text="Female" value="1"> Female</option>
											<option Text="Male" value="2">Male</option>
										</select>
									</div>
								</div>

								<div class="row" style="margin-bottom: 20px;">
									<div class="col-md-4">
										<label class="control-label col-lg-4">Contact Number: <span class="text-danger">*</span></label>
										<input class="form-control" data-mask="+639-999-999-9999">
									</div>

									<div class="col-md-4">
										<label class="control-label col-lg-4">Nationality: <span class="text-danger">*</span></label>
										<select class="select">
											<option></option>
										</select>
									</div>

									<div class="col-md-4">
										<label class="control-label col-lg-4">Religion: <span class="text-danger">*</span></label>
										<select class="select">
											<option></option>
										</select>
									</div>
								</div>
							</fieldset>

							<fieldset title="5">
								<legend class="text-semibold">Guardian Information</legend>
								<div class="row">
									<legend class="text-bold">Guardian Name</legend>
									<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-lg-3">Last Name:<span class="text-danger">*</span></label>
												<input type="text" class="form-control">
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-lg-3">First Name:<span class="text-danger">*</span></label>
												<input type="text" class="form-control">
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-lg-4">Middle Name:</label>
												<input type="text" class="form-control">
											</div>
										</div>
								</div>

								<div class="row">
									<legend class="text-bold">Personal Infomation</legend>
									<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-lg-6">Relationship: <span class="text-danger">*</span></label>
												<select class="select">
													<option></option>
												</select>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-lg-6">Contact Number:<span class="text-danger">*</span></label>
												<input type="text" class="form-control" data-mask="+639-999-999-9999">
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-lg-6">Email Address:</label>
												<input type="email" class="form-control">
											</div>
										</div>
								</div>

								<div class="row">
									<legend class="text-bold">Address</legend>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label col-lg-3">Province:<span class="text-danger">*</span></label>
											<select class="form-control"></select> 
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label col-lg-6">City / Municipality:<span class="text-danger">*</span></label>
											<select class="form-control"></select> 
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label col-lg-3">Barangay:<span class="text-danger">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-lg-3">Subdivision / Village:</label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-lg-6">House No./ Building No./ St./ Block / Lot</label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>

							</fieldset>

							<button type="submit" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button>
						</form>
		            </div>
		            <!-- /wizard with validation -->

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