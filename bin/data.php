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
	$m68 = $_POST['senin3'].",".$_POST['selasa3'].",".$_POST['rabu3'].",".$_POST['kamis3'].",".$_POST['jumat3'].",".$_POST['sabtu3'].",".$_POST['minggu3'];
	$query = mysql_query("INSERT INTO `kurva_s` (`gid`,`subkerja`,`m66`,`m67`,`m68`) VALUES('$gid','$subkerja','$m66','$m67','$m68')");
	header("location: ../monitoring.php");
?>