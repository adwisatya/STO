<?php 
	require_once("register.php");
	$registrator = new Register();
	
	switch ($_GET['cmd']){
		case "add": 	
				$username = 	$_POST['username'];
				$password =		$_POST['password'];
				$email	= 	$_POST['email'];
				$registrator->addUser($username,$password,$email);
				header("location: ../login.php");
				break;
		case "del": 
				$no = 	$_GET['id'];
				$registrator->delUser($no);
				header("location: ../admin.php");

				break;
		case "edit":
				$username = 	$_POST['username'];
				$password =		$_POST['password'];
				$email	= 	$_POST['email'];
				$registrator->updateInfo($username,$password,$email);
				header("location: ../account.php");

				break;
		case 4:
				$registrator->showUser();
				break;	
	}
?>