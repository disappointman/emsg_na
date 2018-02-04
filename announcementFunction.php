<?php
require_once('config.php');
$connect = new Connect();
$con = $connect ->connectDB();

if(isset($_POST["title"])){
	$title = mysqli_real_escape_string($con,stripcslashes(trim($_POST["title"])));
	$body = mysqli_real_escape_string($con,stripcslashes(trim($_POST["body"])));
	if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0){
		$image = addslashes(file_get_contents($_FILES['picture']['tmp_name'])); //SQL Injection defence!
		insert($title,$body,$connect,$image);
	}
	else
		insert($title,$body,$connect);
}else{

}

function insert($title,$body,$connect,$picture = null){
	if($picture != null){
		$query = "INSERT INTO announcement(title,body,author,picture,`datetime`,iduser) VALUES('".$title."','".$body."','".$author."','".$picture."','".date("Y-m-d H:i:s")."','".$_SESSION['id']."')";
	}
	else{
		$query = "INSERT INTO announcement(title,body,author, `datetime`,iduser) VALUES('".$title."','".$body."','".$author."','".$picture."','".date("Y-m-d H:i:s")."','".$_SESSION['id']."')";
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