<?php
session_start();

require_once('config.php');
$connect = new Connect();
$con = $connect ->connectDB();

if(isset($_POST["title"])){
	$title = mysqli_real_escape_string($con,stripcslashes(trim($_POST["title"])));
	$body = mysqli_real_escape_string($con,stripcslashes(trim($_POST["body"])));
	$author = mysqli_real_escape_string($con,stripcslashes(trim($_POST["author"])));
	if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0){
		$image = addslashes(file_get_contents($_FILES['picture']['tmp_name'])); //SQL Injection defence! 
		insert($title,$body,$author,$connect,$image);
	}
	else
		insert($title,$body,$author,$connect);
}else{

}

function insert($title,$body,$author,$connect,$picture = null){
	if($picture != null){
		$query = "INSERT INTO announcement(title,body,author,picture,`dateandtime`,iduser) VALUES('".$title."','".$body."','".$author."','".$picture."','".date("Y-m-d H:i:s")."','".$_SESSION['id']."')";
	}
	else{
		$query = "INSERT INTO announcement(title,body,author,`dateandtime`,iduser) VALUES('".$title."','".$body."','".$author."','".date("Y-m-d H:i:s")."','".$_SESSION['id']."')";
	}

	try{
		$result = $connect->insert($query);
		if($result){
			echo '<script type="text/javascript">
		 			window.location = "AddAnnouncement.php";
		 			alert("Success!");
		 			</script>';
		}else{
			echo '<script type="text/javascript">
		 			window.location = "AddAnnouncement.php";
		 			alert("Failed!");
		 			</script>';
		}
	}
	catch(Exception $ex){
		echo $ex;
	}
}
?>