<?php
require("../emsg_na/config.php");
require("../emsg_na/AccountHandler.php");

$handler = new AccountHandler();
$conn = new Connect();
$con = $conn -> connectDB();

if(isset($_POST["employeeID"]) && isset($_POST["password"])){
	$employeeID= mysqli_real_escape_string($con,stripcslashes(trim($_POST["employeeID"])));
	$password=mysqli_real_escape_string($con,stripcslashes(trim($_POST["password"])));
	$results=$handler->getAccount($employeeID,$password);
	if(isset($results)){
		if(mysqli_num_rows($results)==1){
			foreach($results as $result){
				if($employeeID == $result['employeeNumber'] && $password == $result['password']){
					$_SESSION['id'] = $result['iduser_information'];
					echo "<script> window.location = 'AddAnnouncement.php'; alert('Login Succesful'); </script>";
				}
			}
		}
		else{
			echo "<script> window.location ='Login.php'; alert('Login Failed');</script>";
		}
	}
	else{
		echo "<script> window.location ='Login.php'; alert('Login Failed');</script>";
	}
}else{
	echo "<script> window.location = 'login.php;'; </script>";
}

?>