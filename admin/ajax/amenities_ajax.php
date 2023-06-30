<?php

	include "../conn/conn.php";
	
	$icon = $_POST['icon'];
	$iconname = $_POST['iconname'];
	$date = date('Y-m-d');
	
	$sql = "insert into icons (id, icon, iconname, status, createddate)values('', '".$icon."', '".$iconname."', '1', '".$date."')";
	$query = mysqli_query($conn, $sql);
	
	if($query == 1){
		echo "success";
	}else{
		echo "error";
	}
	

?>