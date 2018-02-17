<?php
session_start();
if(isset($_SESSION['counter'])){
	if(isset($_GET['type'])){
		$_SESSION['counter'] = $_SESSION['counter'] + 3;
		echo "<script>window.location = 'timeline.php?type=".$_GET['type']."';</script>";	
	}
	else{
		echo "<script>window.location = 'logoutFunction.php';</script>";		
	}
}else{
	$_SESSION['counter'] = 0;
}
?>