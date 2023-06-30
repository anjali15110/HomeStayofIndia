<?php

	include "../conn/conn.php";
	
	session_start();
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	//echo $email;
	
	$usersql = "select * from user where email='".$email."' AND password='".$password."'";
	$userquery = mysqli_query($conn, $usersql);
	
	//print_r($userquery);
	
	if($userquery->num_rows > 0){
		$row = mysqli_fetch_assoc($userquery);
		$_SESSION['frontuser'] = $row['id'];
		echo 1;
	}else{
		echo 2;
	}

?>