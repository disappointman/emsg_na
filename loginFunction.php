<?php
session_start();
require("../emsg_na/config.php");
require("../emsg_na/AccountHandler.php");

$handler = new AccountHandler();
$conn = new Connect();
$con = $conn -> connectDB();

if(isset($_POST["employeeID"]) && isset($_POST["password"])){
	$username= mysqli_real_escape_string($con,stripcslashes(trim($_POST["employeeID"])));
	$password=mysqli_real_escape_string($con,stripcslashes(trim($_POST["password"])));
	$results=$handler->getAccount($username,$password);
	if(isset($results)){
		if(mysqli_num_rows($results)==1){
			foreach($results as $result){
				if($username == $result['username'] && $password == $result['password']){
					$_SESSION['id'] = $result['iduser'];
					$_SESSION['emp_type'] = $result['accountype'];
					echo "<script> window.location = 'timeline.php?type=1'; alert('Login Succesful'); </script>";
				}else{
					echo "<script> window.location ='Login.php'; alert('Login Failed');</script>";
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
	// echo "<script> window.location = 'login.php;'; </script>";
}

?>