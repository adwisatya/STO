<?php
	if(file_exists("../connect/connect.php")){
		include("../connect/connect.php");
	}else{
		include("connect/connect.php");
	}
	Class Register{
		/* OK */
		function addUser($username, $password, $email){
			$query = mysql_query("INSERT INTO user (username, password, email, active) VALUES('$username','".md5($password)."','$email','1')");
		}
		/* OK */
		function delUser($no){
			$query = mysql_query("DELETE FROM user WHERE no = '$no'");
		}
		/* OK */
		function activateUser($username){
			$query = mysql_query("UPDATE user SET active=1 WHERE username='$username'");
		}
		/* OK */
		function updateInfo($username, $password,$email){
			$query = mysql_query("UPDATE user SET email='$email',password='".md5($password)."' WHERE username='$username'");
		}
		/* OK */
		function showUser(){
			$query = mysql_query("SELECT * from user");
			echo '
				<table width="600px">
					<tr>
						<td width="150px">Username</td>
						<td width="50px">Status</td>
						<td width="150px">Action</td>
					</tr>
			';
			while($hasil = mysql_fetch_array($query)){
				$no = $hasil['no'];
				echo '<tr>
					<td>'.
						$hasil['username'].'
					</td>
					<td>'.
						$hasil['status'].'
					</td>
					<td>
						<a href="bin/mregister.php?cmd=del&id='.$no.'">Delete</a> | 
						<a href="bin/mregister.php?cmd=edit&id='.$no.'">Edit</a>
					</td>
				</tr>';
			}
			echo '</table>';
		}
		function getData($username,$var){
			$query = mysql_query("SELECT $var from user WHERE username='$username'");
			while($hasil = mysql_fetch_array($query)){
				$returnVal = $hasil[$var];
			}
			return $returnVal;
		}
	}
?>