<?php
	include "conn/conn.php";

	$filename = $_POST['image'];
	$category = $_POST['category'];
	$date = date('Y-m-d');
	$action = $_POST['action'];
		
	// echo $image;
	// echo $category;
	
	if($action == "insert"){
		$sql = "insert into category (id, category_name, category_image, status, createddate)value('', '".$category."', '".$filename."', '1', '".$date."')";
	
	//echo $sql;
	
		$query = mysqli_query($conn, $sql);
	
		 if($query == 1){
			 echo 'success';
		 }
		 else{
			 echo 'error';
		 }
	}
	
		if($action == "update"){
		$id = $_POST['id'];
		$sql = "update category set category_name='".$category."', category_image='".$filename."' where id = '".$id."'";
	
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