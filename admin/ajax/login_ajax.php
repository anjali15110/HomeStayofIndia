<?php

	include "../conn/conn.php";
	
	session_start();
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	//echo $email;
	
	$user_sql = "select * from user where email='".$email."' AND password='".$password."'";
	$user_query = mysqli_query($conn, $user_sql);
	
	//print_r($user_query);
	
	if($user_query->num_rows > 0){
		$row = mysqli_fetch_assoc($user_query);
		$_SESSION['token'] = $row['id'];
		$_SESSION['type'] = $row['type'];
		echo 1;
	}else{
		echo 2;
	}

?>