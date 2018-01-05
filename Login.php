<!DOCTYPE html>
<html>
<head runat="server">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>EMS Group News - Log in</title>
    <link rel="icon" href="assets/images/CCDO Logo.png" />

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/colors.css" rel="stylesheet" type="text/css" />
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/components_modals.js"></script>
    <script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/notifications/bootbox.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="assets/js/core/app.js"></script>
    <!-- /theme JS files -->
</head>

<body class="login-container" style="background-color:#3f51b5;">
    <form id="form1" action="loginFunction.php" method="POST">
        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main content -->
                <div class="content-wrapper">

                    <!-- Content area -->
                    <div class="content pb-20">

                        <div class="panel panel-body login-form">
                           
                            <div class="text-center">
                                <div class="icon">
                                    <img class="image" src="assets/images/logo_light.png" style="width: 50%" /></div>
	                                <h5 class="content-group">Login to your account</h5>
	                                <div class="content-divider text-muted">
	                                	<span><small class="display-block">Enter your Username<!-- Employee ID --> and Password</small></span>
		                            </div>
	                                <br />
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" ID="employeeID" name="employeeID" class="form-control" Placeholder="Username" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" ID="password" name="password" class="form-control" Placeholder="Password" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="content-divider text-muted"><span><small class="display-block"></small></span></div>
                            <br />

                            <div class="form-group">
                            	<input type="submit" class="btn bg-orange btn-block" Text="Log In" value="LOG IN"/>
                                <button id="sweet_success" name="sweet_success" class="btn btn-primary"></button>
                                <button id="sweet_error" name="sweet_error" class="btn btn-primary"></button>
                            </div>

                        </div>

                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->
    </form>
</body>

</html>

<script type="text/javascript">
	function submitLogin(employeeid,password){
		$.ajax({
			type:"POST",
			url: "loginFunction.php",
			data:'password='+password+",employeeid="+employeeID,
			success:function(data){

            }
		});
	}
    // Success alert
    $('#sweet_success').on('click', function() {
        swal({
            title: "Good job!",
            text: "You clicked the button!",
            confirmButtonColor: "#66BB6A",
            type: "success"
        });
    });

    // Error alert
    $('#sweet_error').on('click', function() {
        swal({
            title: "Oops...",
            text: "Something went wrong!",
            confirmButtonColor: "#EF5350",
            type: "error"
        });
    });
</script>
