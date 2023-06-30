<?php

	include "admin/conn/conn.php";

	$id = $_GET['receiptid'];
	//echo $id;

	$sqlreceipt = "select * from booking where id = '".$id."'";
	$queryreceipt = mysqli_query($conn, $sqlreceipt);
	$fetchreceipt = mysqli_fetch_assoc($queryreceipt);
	$hotel_id = $fetchreceipt['hotel_id'];
	$user_id = $fetchreceipt['user_id'];
	//echo $hotel_id;
	
	$sqlreceipthotel = "select * from hotels where id = '".$hotel_id."'";
	//echo $sqlreceipthotel;
	$queryreceipthotel = mysqli_query($conn, $sqlreceipthotel);
	$fetch = mysqli_fetch_assoc($queryreceipthotel);
	
	$sqlreceiptuser = "select * from user where id = '".$user_id."'";
	//echo $sqlreceipthotel;
	$queryreceiptuser = mysqli_query($conn, $sqlreceiptuser);
	$fetchuser = mysqli_fetch_assoc($queryreceiptuser);
	
	
$In = date("d-m-y", strtotime($fetchreceipt['check_in']));
$Out = date('d-m-y',strtotime($fetchreceipt['check_out']));
?>

<html>
	<head>
		<title>OFFICIAL RECEIPT <?php echo $fetch['hotel_name']; ?></title>	
		<?php include "include/header_script.php";?>
		<style>
			.details tr{
				border:1px solid black;
			}
			.details td{
				border:1px solid black;
				padding:10px;
			}
		</style>
	</head>
	<body style="width:60%; margin:auto;">
	
								
		<h3 class="text-center my-4">OFFICIAL RECEIPT</h3>
		
		<div>		
			<div class="row">
				<div class="col-md-6">
					<div>
						<?php echo $fetch['hotel_name']; ?><br/>
						<?php echo $fetch['hotel_address']; ?><br/>
					</div>
				</div>
				<div class="col-md-6">
					<div style="float:right;">
						Receipt Date: <?php echo date("d-m-y"); ?> <br>
					</div>
				</div>
			</div>
		</div>
		
		<hr>
		<p><strong>DETAIL GUEST & BOOKING ROOM</strong></p>
		<hr>
		
		<center>
			<small class="text-center">THIS IS A COMPUTER PRINT, NOT REQUIRED SIGNTAURE.</small><br>
			<a href="javascript:window.print()" class="mb-4 text-center">Print Report</a><br><br>
		</center>
					
		<table border="1" class="details" align="center" cellpadding="2" cellpadding="4"></td>
			<tr>
				<td width="300">GUEST NAME</td>
				<td width="400"><?php echo $fetchuser['name']; ?></td>
			</tr>
			<tr>
				<td width="300">CHECK IN</td>
				<td width="400"><?php echo $In; ?></td>
			</tr>
			<tr>
				<td width="300">CHECK OUT </td>
				<td width="400"><?php echo $Out; ?></td>
			</tr>
			<tr>
				<td width="300">PRICE OF ONE ROOM</td>
				<td width="400"><?php echo $fetchreceipt['price']; ?>
				</td>
			</tr>
			<tr>
				<td width="300">TOTAL ROOM</td>
				<td width="400"><?php echo $fetchreceipt['room_quantity']; ?>
				</td>
			</tr>
			<tr>
				<td width="300">DISCOUNT OF ONE ROOM</td>
				<td width="400"><?php echo $fetchreceipt['discount']; ?>
				</td>
			</tr>
			<tr>
			<tr>
				<td width="300">TOTAL PAYMENT</td>
				<td width="400"><?php echo $fetchreceipt['total_price'];?><br></td>
			</tr>
		</table>
		</center>
		
		<?php include "include/footer_script.php";?>
	</body>
</html>