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
}

function insert($title,$body,$connect,$picture = null){
	if($picture != null){
		$query = "INSERT INTO information(title,body,picture,`datetime`,type,iduser_information) VALUES('".$title."','".$body."','".$picture."','".date("Y-m-d H:i:s")."','1',1)";
	}
	else{
		$query = "INSERT INTO information(title,body,`datetime`,type,iduser_information) VALUES('".$title."','".$body."','".date("Y-m-d H:i:s")."','1',1)";
	}

	try{
		$lastId = $connect->insertWithLastId($query);
	}
	catch(Exception $ex){
		echo $ex;
	}

	if($lastId !=null){
		$query ="INSERT INTO announcement(idinformation) VALUES(".$lastId.")";
		$result = $connect->insert($query);
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
?>