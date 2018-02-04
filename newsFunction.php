<?php
require_once('config.php');
$connect = new Connect();
$con = $connect ->connectDB();
if(isset($_POST["title"])){
	$company =mysqli_real_escape_string($con,stripcslashes(trim($_POST["company"])));
	$title = mysqli_real_escape_string($con,stripcslashes(trim($_POST["title"])));
	$body = mysqli_real_escape_string($con,stripcslashes(trim($_POST["body"])));
	if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0){
		$image = addslashes(file_get_contents($_FILES['picture']['tmp_name'])); //SQL Injection defence!
		insert($title,$body,$connect,$company,$image);
	}
	else
		insert($title,$body,$connect,$company);
}else{
	echo '<script type="text/javascript">
	window.location ="AddAnnouncement.php"
</script>';
}


function insert($title,$body,$connect,$company,$picture = null){
	if($picture != null){
		$query = "INSERT INTO information(title,body,picture,`datetime`,type,iduser_information) VALUES('".$title."','".$body."','".$picture."','".date("Y-m-d H:i:s")."','1',1)";
	}
	else{
		$query = "INSERT INTO information(title,body,`datetime`,type,iduser_information) VALUES('".$title."','".$body."','".date("Y-m-d H:i:s")."','1',1)";
	}
	$lastId = $connect->insertWithLastId($query);
	if($lastId !=null){
		$query ="INSERT INTO news(idinformation,idCompany) VALUES(".$lastId.",".$company.")";
		$result = $connect->insert($query);
		echo '<script type="text/javascript">
					window.location = "AddNews.php";
					alert("Success!");
					</script>';
	}
}
?>