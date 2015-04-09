<?php
	require_once("file.php");
	require_once("../connect/connect.php");
	$minggu = $_POST['minggu'];
	$file = str_replace(".php",".php.txt",$_FILES['userfile']['name']);
	$target = "../img/laporan/";
	$path = $target.md5($_FILES['userfile']['name']).".".pathinfo($file, PATHINFO_EXTENSION);
	if(move_uploaded_file($_FILES['userfile']['tmp_name'],$path)){
		$fileHandler = new File();
		$fileHandler->addToDB2($minggu, md5($_FILES['userfile']['name']).".".pathinfo($file, PATHINFO_EXTENSION));
		//echo "<script>alert('File Uploaded Successfully');</script>";
		header("location: ../laporan-mingguan.php");
	}else{
		header("location: ../laporan-mingguan.php");

	}
?>