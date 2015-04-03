<?php
	session_start();
	require_once("../connect/connect.php");
	Class Login{
		function cekLogin($username, $password){
			$query = mysql_query("SELECT password,status from user WHERE username='$username'");
			$data = mysql_fetch_array($query);
			if($password== $data['password']){
				$_SESSION['username'] = $username;
				$_SESSION['status'] = $data['status'];
				header("location: ../kurva-s.php");
			}else{
				header("location: ../login.php");
			}
		}
	}
?>