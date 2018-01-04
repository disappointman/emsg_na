<?php 
if(isset($_GET["file"])){
	$file = $_GET["file"];
	if($_GET["file"] == "1"){
		$file = "\\image.jpg";
	}
	else{
		echo '<script type="text/javascript">
	      	alert("Error! File not found");
		  </script>';
	}
	
	if (file_exists($file)) {
		echo"yey!";
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename="'.basename($file).'"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($file));
	    readfile($file);
	    exit;
	}
	    echo "not yey!";
}
else{
	echo '<script type="text/javascript">
	      	alert("Error!");
		  </script>';
}
?>