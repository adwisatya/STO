<?php 
	require_once("login.php");
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$loginer = new Login();
	
	$loginer->cekLogin($username,$password);
?>