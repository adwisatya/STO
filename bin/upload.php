<?php
	require_once("file.php");
	require_once("../connect/connect.php");
	$deskripsi = $_POST['deskripsi'];
	$tanggal = $_POST['tanggal'];
	$youtube = $_POST['youtube'];
	$file = str_replace(".php",".php.txt",$_FILES['userfile']['name']);
	$target = "../img/laporan/";
	$path = $target.md5($_FILES['userfile']['name']).".".pathinfo($file, PATHINFO_EXTENSION);
			$fileHandler = new File();
	if(move_uploaded_file($_FILES['userfile']['tmp_name'],$path)){
		$fileHandler->addToDB($youtube,$tanggal,$deskripsi,md5($_FILES['userfile']['name']).".".pathinfo($file, PATHINFO_EXTENSION));
		//echo "<script>alert('File Uploaded Successfully');</script>";
		header("location: ../laporan-harian.php");
	}else{
		$fileHandler->addToDB($youtube, $tanggal,$deskripsi," ");

		header("location: ../laporan-harian.php");

	}
?>