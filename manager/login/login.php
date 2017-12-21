<?php
    include("../config.php");
	$type = $_POST['type'];
	
	if($type == 'login') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql="SELECT * FROM member where username='$username' and password='$password'";
		$result=mysqli_query($con,$sql);
		$data=mysqli_fetch_assoc($result);
		if($data != NULL) {
			echo "success";
			session_start();
			$_SESSION["username"] = $username;
			$_SESSION["nameLogin"] = $data['name'];
			$_SESSION["role"] = $data['role'];
		} else {
			echo "error";
		}
	} else if($type == 'logout'){
		session_start();
		unset($_SESSION["username"]);
		unset($_SESSION["nameLogin"]);
		unset($_COOKIE['role']);
	}
?>