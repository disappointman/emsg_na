<?php
session_start();

require_once('config.php');
$connect = new Connect();
$con = $connect ->connectDB();

if(isset($_POST['idannouncement'])){
	$id = mysqli_real_escape_string($con,stripcslashes(trim($_POST["idannouncement"])));
	$type = mysqli_real_escape_string($con,stripcslashes(trim($_POST["dropdownFor"])));
	$title = mysqli_real_escape_string($con,stripcslashes(trim($_POST["title"])));
	$body = mysqli_real_escape_string($con,stripcslashes(trim($_POST["body"])));
	$author = mysqli_real_escape_string($con,stripcslashes(trim($_POST["author"])));
	if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0){
		$image = addslashes(file_get_contents($_FILES['picture']['tmp_name'])); //SQL Injection defence! 
		update($id,$type,$title,$body,$author,$connect,$image);
	}
	else
		update($id,$type,$title,$body,$author,$connect);
} else if(isset($_POST["title"])){
	$title = mysqli_real_escape_string($con,stripcslashes(trim($_POST["title"])));
	$type = mysqli_real_escape_string($con,stripcslashes(trim($_POST["dropdownFor"])));
	$body = mysqli_real_escape_string($con,stripcslashes(trim($_POST["body"])));
	$author = mysqli_real_escape_string($con,stripcslashes(trim($_POST["author"])));
	if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0){
		$image = addslashes(file_get_contents($_FILES['picture']['tmp_name'])); //SQL Injection defence! 
		insert($type,$title,$body,$author,$connect,$image);
	}
	else
		insert($type,$title,$body,$author,$connect);
} else{
	echo "boboness";
}

function insert($type,$title,$body,$author,$connect,$picture = null){
	if($picture != null){
		$query = "INSERT INTO announcement(announcementtype,title,body,author,picture,`dateandtime`,iduser) VALUES('".$type."','".$title."','".$body."','".$author."','".$picture."','".date("Y-m-d H:i:s")."','".$_SESSION['id']."')";
	}
	else{
		$query = "INSERT INTO announcement(announcementtype,title,body,author,`dateandtime`,iduser) VALUES('".$type."','".$title."','".$body."','".$author."','".date("Y-m-d H:i:s")."','".$_SESSION['id']."')";
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

function update($id,$type,$title,$body,$author,$connect,$picture = null){
	if($picture != null){
		$query = "UPDATE announcement SET announcementtype = '".$type."', title = '".$title."', body = '".$body."', author = '".$author."', picture = '".$picture."', dateandtime = '".date("Y-m-d H:i:s")."' WHERE idannouncement = '". $id ."';";
	}
	else{		
		$query = "UPDATE announcement SET announcementtype = '".$type."', title = '".$title."', body = '".$body."', author = '".$author."', dateandtime = '".date("Y-m-d H:i:s")."' WHERE idannouncement = '". $id ."';";
	}

	try{
		$result = $connect->insert($query);
		if($result){
			echo '<script type="text/javascript">
		 			window.location = "timeline.php?type='.$type.'";
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