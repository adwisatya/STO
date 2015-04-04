<?php 
	session_start();
	require_once("../connect/connect.php");

	if($_SESSION['username'] == ""){
		header("location: login.php");
	}else{
		$username = $_SESSION['username'];
	}
	$gid = $_POST['groupid'];
	$subkerja = $_POST['subkerja'];
	$m66 = $_POST['senin'].",".$_POST['selasa'].",".$_POST['rabu'].",".$_POST['kamis'].",".$_POST['jumat'].",".$_POST['sabtu'].",".$_POST['minggu'];
	$m67 = $_POST['senin2'].",".$_POST['selasa2'].",".$_POST['rabu2'].",".$_POST['kamis2'].",".$_POST['jumat2'].",".$_POST['sabtu2'].",".$_POST['minggu2'];
	$query = mysql_query("INSERT INTO `kurva_s` (`gid`,`subkerja`,`m66`,`m67`) VALUES('$gid','$subkerja','$m66','$m67')");
	header("location: ../monitoring.php");
?>