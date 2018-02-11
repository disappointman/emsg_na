<?php
session_start();

if(!isset($_SESSION['id']) && !isset($_GET['id'])){
	echo "<script>window.location = 'logoutFunction.php';</script>";
}

require("config.php");
$conn = new Connect();
$con = $conn->ConnectDB();

$id = mysql_real_escape_string($_GET['id']);
if(!is_numeric($id)){
	echo "<script>window.location = 'logoutFunction.php'; alert('Error on query string!');</script>";
}

$query = "UPDATE announcement SET markedasdeleted = 1 WHERE idannouncement =". $id. ";";

$results = $conn->select($query);
if($results){
	echo "<script>window.location = 'timeline.php'; alert('Announcement deleted!');</script>";
}else{
	echo "<script>window.location = 'logoutFunction.php'; alert('Deletion Failed!');</script>";
}
?>