<?php
session_start();
require("config.php");
require("AccountHandler.php");
$connect = new Connect();
$con = $connect ->connectDB();
$handler = new AccountHandler();

if(isset($_POST['edit'])){
	$id = mysqli_real_escape_string($con,stripcslashes(trim($_POST['edit'])));
	$fn = mysqli_real_escape_string($con,stripcslashes(trim($_POST['txtFirstName'])));
	$mn = mysqli_real_escape_string($con,stripcslashes(trim($_POST['txtMiddleName'])));
	$ln = mysqli_real_escape_string($con,stripcslashes(trim($_POST['txtLastName'])));
	$em = mysqli_real_escape_string($con,stripcslashes(trim($_POST['txtEmail'])));
	$cn = mysqli_real_escape_string($con,stripcslashes(trim($_POST['txtCellphoneNumber'])));
	$un = mysqli_real_escape_string($con,stripcslashes($_POST['txtUsername']));

	if(isset($_POST['txtPassword'])){
		$pw = mysqli_real_escape_string($con,stripcslashes($_POST['txtPassword']));
		$rpw = mysqli_real_escape_string($con,stripcslashes($_POST['txtRepeatPassword']));
		if($pw == $rpw && $pw != ""){
			$result = updateAccountPass($id, $pw);
			if(!$result){
				echo "<script>window.location='editaccount.php?id=".$id."';alert('Account update failed!');</script>";
			}
		}
	}

	$id_ui = mysqli_real_escape_string($con,stripcslashes(trim($_POST['iduser_info'])));
	$hasSame = $handler->getAccountByUsername($un);
	if($hasSame!=""){
		$resulter = updateAccount($id_ui, $fn, $mn, $ln, $em, $cn);	
		if(!$resulter){
			echo "<script>window.location='editaccount.php?id=".$id."';alert('Account update failed!');</script>";
		}
	}else{
		echo "<script>window.location='editaccount.php?id=".$id."';alert('Account update failed! The username is not found!');</script>";
	}

	echo "<script>window.location='editaccount.php?id=".$id."';alert('Account update success!');</script>";

}else{
	if(isset($_POST['txtUsername'])){
		$fn = mysqli_real_escape_string($con,stripcslashes(trim($_POST['txtFirstName'])));
		$mn = mysqli_real_escape_string($con,stripcslashes(trim($_POST['txtMiddleName'])));
		$ln = mysqli_real_escape_string($con,stripcslashes(trim($_POST['txtLastName'])));
		$em = mysqli_real_escape_string($con,stripcslashes(trim($_POST['txtEmail'])));
		$cn = mysqli_real_escape_string($con,stripcslashes(trim($_POST['txtCellphoneNumber'])));
		$un = mysqli_real_escape_string($con,stripcslashes($_POST['txtUsername']));
		$pw = mysqli_real_escape_string($con,stripcslashes($_POST['txtPassword']));
		$rpw = mysqli_real_escape_string($con,stripcslashes($_POST['txtRepeatPassword']));

		if($pw == $rpw){
			$hasSame = $handler->getAccountByUsername($un);
			if($hasSame==""){
				$result = insertAccount($un, $pw, $fn, $mn, $ln, $em, $cn);	
				if($result != ""){
					echo "<script>window.location='addaccount.php';alert('Account creation success!');</script>";
				}else{
					echo "<script>window.location='addaccount.php';alert('Account creation failed!');</script>";
				}
			}else{
				echo "<script>window.location='addaccount.php';alert('Account creation failed! The username is already taken!');</script>";
			}
		}else{
			echo "<script>window.location='addaccount.php';alert('Passwords does not match!');</script>";
		}
	}else{
		if(isset($_POST['iduser'])){
			$result = deleteAccount($_POST['iduser']);
			return $result;
		}else{
			echo "<script>window.location='addaccount.php';alert('Account creation failed no passed values!');</script>";
		}
	}
}

function insertAccount($username, $password, $firstname, $middlename, $lastname, $email, $contact_number){
	$conn = new Connect();
	
	$query = "INSERT INTO user_information (firstname, middlename, lastname, email, contact_number) VALUES ('".$firstname."', '".$middlename."', '".$lastname."', '".$email."', '".$contact_number."');";
	$lastId = $conn->insertWithLastId($query);

	if($lastId != ""){
		$query = "INSERT INTO user (iduser_information, username, password, accounttype) VALUES ('".$lastId."', '".$username."', '".$password."', 2);";
		$result = $conn->insert($query);
		return $result;	
	}else{
		return "";
	}
}
function deleteAccount($iduser){
	$conn = new Connect();
	$query = "UPDATE user SET status = 10 WHERE iduser = ".$iduser.";";
	$result = $conn->select($query);
	return $result;
}
function updateAccount($iduser, $firstname, $middlename, $lastname, $email, $contact_number){
	$conn = new Connect();
	$query = "UPDATE user_information SET firstname = '".$firstname."', middlename = '".$middlename."', lastname = '".$lastname."', email = '".$email."', contact_number = '".$contact_number."' WHERE iduser_information = ".$iduser.";";
	$result = $conn->select($query);
	return $result;	
}

function updateAccountPass($iduser, $password){
	$conn = new Connect();
	$query = "UPDATE user SET password = '".$password."' WHERE iduser = ".$iduser.";";
	$result = $conn->select($query);
	return $result;	
}
?>