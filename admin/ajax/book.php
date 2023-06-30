<?php

	include "../conn/conn.php";
	
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$uid = $_POST['uid'];
	$hotelid = $_POST['hotelid'];
	$checkin = $_POST['checkin'];
	$checkout = $_POST['checkout'];
	$total = $_POST['total'];
	//$email = $_POST['email'];
	$date = date('Y-m-d');
	
	$sql = "insert into booking (id, user_id, hotel_id, check_in, check_out, room_quantity, price, discount, total_price, status, createddate)values('', '".$uid."', '".$hotelid."',  '".$checkin."', '".$checkout."', '".$quantity."', '".$price."', '".$discount."', '".$total."', '1', '".$date."')";
	$query = mysqli_query($conn, $sql);
	
	if($query == 1){
		$booklastid = mysqli_insert_id($conn);
		echo $booklastid;		
	}else{
		echo "error";
	}
	

?>