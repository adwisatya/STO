<?php
	session_start();
	if(file_exists("../connect/connect.php")){
		include("../connect/connect.php");
	}else{
		include("connect/connect.php");
	}
	$query1 = mysql_query("DELETE FROM laporan_mingguan WHERE no=".$_GET['id']);
	header("location: ../laporan-mingguan.php");
?>