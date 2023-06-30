<?php
	
	include '../conn/conn.php';
	
	$category = $_POST['category'];
	$hotel_name = $_POST['hotel_name'];
	$hotel_address = $_POST['hotel_address'];
	$description = $_POST['description'];
	$amenities = $_POST['amenities'];
	$policies = $_POST['policies'];
	$price = $_POST['price'];
	$imagea = $_POST['imagea'];
	$imageb = $_POST['imageb'];
	$imagec = $_POST['imagec'];
	$imaged = $_POST['imaged'];
	$imagee = $_POST['imagee'];
	$discount = $_POST['discount'];
	$area = $_POST['area'];
	$date = date('Y-m-d');
	$action = $_POST['action'];

	if($action == "insert"){
		$sql = "insert into hotels(id, category_id, hotel_name, hotel_address, description, amenities, policies, price, discount, area, imagea, imageb, imagec, imaged, imagee, status, createddate)values('', '".$category."', '".$hotel_name."', '".$hotel_address."', '".$description."', '".$amenities."', '".$policies."', '".$price."', '".$discount."', '".$area."', '".$imagea."', '".$imageb."', '".$imagec."', '".$imaged."', '".$imagee."', '1', '".$date."')";
		
		$query = mysqli_query($conn, $sql);
		
		if($query == 1){
			echo "success";
		}else{
			echo "error";
		}
	}
	
	if($action == "update"){
		$id = $_POST['id'];
		$sql = "update hotels set category_id='".$category."', hotel_name='".$hotel_name."', hotel_address='".$hotel_address."', description='".$description."', amenities='".$amenities."', policies='".$policies."', price='".$price."', discount='".$discount."', area='".$area."', imagea='".$imagea."', imageb='".$imageb."', imagec='".$imagec."', imaged='".$imaged."', imagee='".$imagee."' where id = '".$id."'";
	
	//echo $sql;
	
		$query = mysqli_query($conn, $sql);
	
		 if($query == 1){
			 echo 'success';
		 }
		 else{
			 echo 'error';
		 }
	}
	
?>