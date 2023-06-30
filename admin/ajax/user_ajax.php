<?php
	include "../conn/conn.php";
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$pincode = $_POST['pincode'];
	$password = $_POST['password'];
	$date = date('Y-m-d');
	$action = $_POST['action'];
	
	if($action == "insert"){
	$sql = "insert into user (id, name, email, phone, city, state, pincode, password, status, createddate, type)value('', '".$name."', '".$email."', '".$phone."', '".$city."', '".$state."', '".$pincode."', '".$password."', '1', '".$date."', '1')";
	
	$query = mysqli_query($conn, $sql);
	
	if($query == 1){
		echo "success";
	}else{
		echo "error";
	}
	
	}
	
	if($action == "update"){
		$id = $_POST['id'];
		$sql = "update user set name='".$name."', email='".$email."', phone='".$phone."', city='".$city."', state='".$state."', pincode='".$pincode."', password='".$password."' where id = '$id'";
		
	$query = mysqli_query($conn, $sql);
		
	if($query == 1){
		echo "success";
	}else{
		echo "error";
	}
	
	}
	
?>