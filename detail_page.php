<?php  

	include "admin/conn/conn.php";
	
	$detailid = $_GET['detail'];
	//echo $detailid;
	$sqldetail = "select * from hotels where id = '".$detailid."'";
	$querydetail = mysqli_query($conn, $sqldetail);
	$fetchdetail = mysqli_fetch_assoc($querydetail);
	//print_r($fetchdetail);
	$hotelid = $fetchdetail['id'];
	//echo $hotelid;
	
	$amenities = $fetchdetail['amenities'];
	//echo $amenities;
	$sqlamenity = "select * from icons where id IN (".$amenities.")";
	//echo $sqlamenity;
	$queryamenity = mysqli_query($conn, $sqlamenity);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php include "include/header_script.php";?>
			<link rel="stylesheet" href="css/sweetalert2.min.css">
			<script src="js/sweetalert2.all.min.js"></script>
	</head>
	<body>
	
		<?php include "include/header.php";?>
		
		<?php
			$udata = "";
			
			if(isset($_SESSION['frontuser']))
			{
				$uid = $_SESSION['frontuser'];
				$uquery = "select * from user where id = '".$uid."'";
				$usql = mysqli_query($conn, $uquery);
				$udata = mysqli_fetch_assoc($usql);
				//$name = $udata['name'];
				//$userid = $udata['id'];
				//echo $name;
				//echo $userid;
			}
		?>
		
		<section style="background: #e0e0e0b5;">
			<div>
				<div class="owl-carousel owl-theme" id="detail_image">
					<div class="item">
						<div class="detail_images">
							<div class="detailimage">
								<img src="<?php echo 'admin/images/shortimage_a/'.$fetchdetail['imagea'] ?>" />
							</div>
						</div>
					</div>
					<div class="item">
						<div class="detail_images">
							<div class="detailimage">
								<img src="<?php echo 'admin/images/shortimage_b/'.$fetchdetail['imageb'] ?>" />
							</div>
						</div>
					</div>
					<div class="item">
						<div class="detail_images">
							<div class="detailimage">
								<img src="<?php echo 'admin/images/shortimage_c/'.$fetchdetail['imagec'] ?>" />
							</div>
						</div>
					</div>
					<div class="item">
						<div class="detail_images">
							<div class="detailimage">
								<img src="<?php echo 'admin/images/shortimage_d/'.$fetchdetail['imaged'] ?>" />
							</div>
						</div>
					</div>
					<div class="item">
						<div class="detail_images">
							<div class="detailimage">
								<img src="<?php echo 'admin/images/shortimage_e/'.$fetchdetail['imagee'] ?>" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="detail_container">
				<div class="row mx-0">
					<div class="col-md-8 col-sm-7">
						<div class="my-5 details">
							<h2><b><?php echo $fetchdetail['hotel_name'] ?></b></h2>
							<p class="address"><?php echo $fetchdetail['hotel_address'] ?></p>
							
							<div class="rating">
								<p><span>5.0 <i class="fa-solid fa-star"></i> Check-in rating <i class="fa-solid fa-greater-than"></i> </span> Delightful experience</p>
							</div>
							
							<h5 class="mb-2 mt-4"><b>Description</b></h5>
							<p class="text-secondary mb-4"><i><?php echo $fetchdetail['description'] ?></i></p>
							<div id="selectid"></div>
							<h5><b>Amenities</b></h5>
							<div class="amenities">
							<div class="row">
							<?php
								while($rowamenity = mysqli_fetch_assoc($queryamenity)){
							?>
								<div class="col-md-4 col-4">
								<p><i class="<?php echo $rowamenity['icon'] ?>"></i> <?php echo $rowamenity['iconname'] ?></p>
								</div>
							<?php
								}
							?>
							</div>
							</div>
							
							<div class="mb-5">
								<p class="selectcats"> <i class="fa-solid fa-star"></i> SELECTED CATEGORY</p>
								<div class="selectcat">
									<div class="row">
										<div class="col-md-9 col-9">
											<h4><b> Classic</b> <i class="fa-regular fa-circle-check"></i> </h4>
											<p>Toom size: <?php echo $fetchdetail['area'] ?></p>
											
										</div>
										<div class="col-md-3 col-3">
											<img src="<?php echo 'admin/images/shortimage_a/'.$fetchdetail['imagea'] ?>" width="100%" />
										</div>
									</div>
								</div>
								<div class="priceselect">
									<div class="row">
										<div class="col-md-9 col-9">
											<h5 class="mt-3"><b><span class="blockquote" style="font-size:20px;"><i class="fa-solid fa-indian-rupee-sign" style="font-size:17px;"></i> <?php echo $fetchdetail['price'] ?></span></b> <h5>
										</div>
										<div class="col-md-3 col-3">
											<button class="btn selectedbtn"> <i class="fa-regular fa-circle-check"></i> SELECTED</button>
										</div>
									</div>
								</div>
							</div>
							
							<h5><b>Hotel policies</b></h5>
							<ul class="policies">
								<li style="list-style-type: none;">
									<div class="d-flex">
										<div class="checkin">
											<div style="margin-bottom:13px;">Check-in</div>
											<div class="checkouttop"></div>
											<div class="checktime">12:00 PM</div>
										</div>
										<div  class="checkout">
											<div  style="margin-bottom:13px;">Check-out</div>
											<div class="checkouttop"></div>
											<div class="checktime">11:00 AM</div>
										</div>
									</div>
								</li>
								<div class="policies text-secondary"><?php echo $fetchdetail['policies'] ?></div>
								
							</ul>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-5">
						<div class="booking my-5">
							<div style=" border: 1px solid #e0e0e0; padding: 10px 13px; margin-right: 13px; border-radius: 7px;">
								<h5><b>Price<span class="blockquote" style="font-size:20px; float:right;"><i class="fa-solid fa-indian-rupee-sign" style="font-size:17px;"></i> <?php echo $fetchdetail['price'] ?></span></b> <h5>
								<p class="tax">inclusive of all taxes</p>
								<div class="row">
									<div class="col-md-6">
										<div>
											<label for="guest" class="mb-2" style="font-size: 16px;">Guest</label>
											<input type="number" class="guest" id="guest" min="1" step="1" value="1">
										</div>
									</div>
									<div class="col-md-6">
										<div>
										<label for="quantity" class="mb-2" style="font-size: 16px;">Room</label>
											<input type="number" class="room" id="quantity" step="1" min="1" value="1">
										</div>
									</div>
									<div class="col-md-12">
										<div  class="my-3">
										<label for="check_in" style="font-size: 16px;">Check-in</label>
											<input type="date" min="<?php echo date("Y-m-d"); ?>" class="mt-2" style="width:100%;" id="check_in" value="">
										</div>
									</div>
									<div class="col-md-12">
										<div class=" my-2">
										<label for="check_out" style="font-size: 16px;">Check-out</label>
											<input type="date" min="<?php echo date("Y-m-d"); ?>" class="mt-2" style="width:100%;" id="check_out" value="">
										</div>
									</div>
									</div>
									
									<div class="classic">
										<div class="row">
											<div class="col-md-6">
												<p> <i class="fa-solid fa-door-closed"></i> Classic</p>
											</div>
											<div class="col-md-6">
												<div class="pencil">
													<a href="#selectid"><i class="fa-solid fa-pencil"></i></a>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-5 col-sm-12">
											<div class="mt-4">
												<p style="font-size:15px;"><span style="font-size:15px;">Subtotal </span> <i class="fa-solid fa-indian-rupee-sign" style="font-size:14px;"></i> <span id ="subtotal"><?php echo $fetchdetail['price']?></span></p>
											</div>
										</div>
										<div class="col-md-7 col-sm-12">
											<div class="mt-4">
												<p style="font-size:15px;" class="discount"><span style="font-size:15px;">Discount </span> <i class="fa-solid fa-indian-rupee-sign" style="font-size:14px;"></i><span> <?php echo $fetchdetail['discount'] ?></span> /- room</p>
												<input type="hidden"/>
											</div>
										</div>
									</div>
									
									
									<p class="mb-3 mt-2">Total = <i class="fa-solid fa-indian-rupee-sign" style="font-size:17px;"></i> <span id="total"><?php echo $fetchdetail['price']?></span></p>
									<div class="row">
										<div class="col-md-6 col-6">
										<?php
											if(isset($_SESSION['frontuser'])){
										?>
										<div>
											<a class="btn btn-success" id="book">Book</a>
										</div>
										<?php
											}else{
										?>
										<div>
											<a class="btn btn-success" href="signin.php">Book</a>
										</div>
										<?php
											}
										?>
											
										</div>
										<div class="col-md-6 col-6">
											<div class="cancel">
												<a class="btn btn-danger" href="detail_page.php?detail=<?php echo $fetchdetail['id'] ?>">Cancel</a>
											</div>
										</div>
									</div>
								</div>
								
						</div>
					</div>
					
				</div>
			</div>
		</section>
		
       	<?php include "include/footer.php";?>
		<?php include "include/footer_script.php";?>
		
		<script>
			$('#detail_image').owlCarousel({
				loop:true,
				margin:3,
				dots:false,
				stagePadding:60,
				nav:true,
				navText: ['<i class="fa-solid fa-angle-left fa-lg"></i></i>','<i class="fa-solid fa-angle-right fa-lg"></i>'],
				responsive:{
					0:{
						items:1
					},
					600:{
						items:2
					},
					1000:{
						items:2
					}
				}
			});
		
		// $("#check_out").datepicker({
			// defaultDate: "+1w",
			// changeMonth: false,
			// numberOfMonths: 1,
			// prevText: '<i class="fa fa-chevron-left"></i>',
			// nextText: '<i class="fa fa-chevron-right"></i>',			
			// onClose: function( selectedDate ) {
				// $( "#checkin" ).datepicker( "option", "maxDate", selectedDate );
			// }
		// });
		
		$(document).ready(function(){
						
			$("#quantity").change(function(){
				var quantity = $(this).val();
				var price = "<?php echo $fetchdetail['price'];?>"
				var discount = "<?php echo $fetchdetail['discount'];?>"
					discount = Number(discount);
					price = Number(price);
				var subtotal = price * quantity;
					//console.log(subtotal);
				var discounts = quantity * discount;
					//console.log(discounts);
				var total = subtotal - discounts;
					//console.log(total);
				
					$("#subtotal").html(subtotal);
					$("#total").html(total);
			})

			$('#book').click(function(){
				var quantity = $('#quantity').val();
				var price = "<?php echo $fetchdetail['price']?>";
				var discount = "<?php echo $fetchdetail['discount']?>";
				var uid = "<?php echo $udata != null ? $udata['id'] : '' ?>";
				var hotelid = "<?php echo $fetchdetail['id']?>";
				var checkin = $('#check_in').val();
				var checkout = $('#check_out').val();
				var total = $("#total").html();
				// console.log(quantity);
				// console.log(price);
				// console.log(discount);
				// console.log(uid);
				// console.log(hotelid);
				// console.log(checkin);
				// console.log(checkout);
				// console.log(total);
				
				var obj = {
						quantity : quantity,
						price : price,
						discount : discount,
						uid : uid,
						hotelid : hotelid,
						checkin : checkin,
						checkout : checkout,
						total : total
					}
					
					//console.log(obj);
							
					$.ajax({
						type : 'POST',
						url : 'admin/ajax/book.php',
						data : obj,
						success : function(resp){
							swal(
								'Success',
								'You clicked the <b style="color:green;">Book</b> button!',
								'success'
							)
							window.location.href = "receipt.php?receiptid=" +resp;
						}
							
						})
				
				})			
				
			})
		</script>
	</body>
</html>
