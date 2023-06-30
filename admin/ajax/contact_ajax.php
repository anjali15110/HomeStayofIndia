<?php
	include "../conn/conn.php";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$company = $_POST['company'];
	$msg = $_POST['msg'];
	$phone = $_POST['phone'];
	$date = date('Y-m-d');

	$sql = "insert into contact (id, name, email, company, phone, message, status, createddate)value('', '".$name."', '".$email."', '".$company."', '".$phone."', '".$msg."', '1', '".$date."')";

	$query = mysqli_query($conn, $sql);

	 if($query == 1){
		 echo 'success';
	 }
	 else{
		 echo 'error';
	 }
		
	
?>