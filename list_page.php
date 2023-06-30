<?php 

	include "admin/conn/conn.php";
	
	$queryprice = '';
	
	if(isset($_GET['min']) & isset($_GET['max'])){
		$min = $_GET['min']; 
		$max = $_GET['max'];
		$queryprice = "AND price >= ".$min." AND price <= ".$max."";
	}
	
	$id = $_GET['listid'];
	$sql = " select * from hotels where category_id = ".$id." ".$queryprice." ";
	$query = mysqli_query($conn, $sql);
	//print_r($sql);
	
	$querycatsprice = "select * from category where id = '".$id."'";
	$sqlcatsprice = mysqli_query($conn, $querycatsprice);
	//print_r($sqlcatsprice);
	$datacatprice = mysqli_fetch_assoc($sqlcatsprice);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php include "include/header_script.php";?>
	</head>
	<body>
	
		<?php include "include/header.php";?>
		<section style="background: #e0e0e0b5;">
			<div class="container">
				<div class="about">
					<div class="row">
						<div class="col-md-6 col-6">
							<div>
								<ul>
									<li><a href="index.php">Home</a></li>
									<li>/</li>
									<li><a href="list_page.php">List</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-6 col-6">
							<div style="float:right;">
								<h4 class="mb-0">List</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="containers">
				<div class="my-5">
					<div class="row mx-0">
					
						<div class="col-md-3">
							<div style=" border: 1px solid #e0e0e0; padding: 10px 13px; margin-right: 13px; margin-top:20px;">
								<div>
									<h4 class="text-secondary">Categories</h4>
										<div class="categoriesfilter">
											<?php 
												$querycats = "select * from category ORDER by category_name ASC";
												$sqlcats = mysqli_query($conn, $querycats);
												//print_r($sqlcat);
											?>
											<ul class="p-0">
											<?php 
												while($datacats = mysqli_fetch_assoc($sqlcats)){
											?>
											<li><a class="btn text-secondary categoryanchor" href="list_page.php?listid=<?php echo  $datacats['id']; ?>"><?php echo $datacats['category_name']; ?></a></li>
											<?php
												}
											?>
											</ul>
										</div>
								</div>
							
							<div style="margin-bottom:20px;">
								<h4 class="text-secondary">Price</h4>
								<div class="pricefilter">
									<li><a class="btn" href="list_page.php?listid=<?php echo  $datacatprice['id']; ?>&min=0&max=0">Free</a></li>
									<li><a class="btn" href="list_page.php?listid=<?php echo  $datacatprice['id']; ?>&min=0&max=500">0 - 500</a></li>
									<li><a class="btn" href="list_page.php?listid=<?php echo  $datacatprice['id']; ?>&min=501&max=1000">501 - 1000</a></li>
									<li><a class="btn" href="list_page.php?listid=<?php echo  $datacatprice['id']; ?>&min=1001&max=2000">1001 - 2000</a></li>
									<li><a class="btn" href="list_page.php?listid=<?php echo  $datacatprice['id']; ?>&min=<?php echo 2000 ?>&max=<?php echo 10000 ?>">Above 2000</a></li>
								</div>
							</div>
						</div>
						</div>
						
						<div class="col-md-9">
							<div class="container">
								<h4 class="mb-4" style="margin-top:20px;">Delhi Hotels and Places to Stay</h4>
								<?php
									while($row = mysqli_fetch_assoc($query)){
								?>
								<div class="row" style="margin-bottom: 48px; border-bottom: 1px solid black; padding-bottom: 48px;">
									<div  class="col-md-6 col-sm-12 ps-0">
									
										<div class="row">
											<div class="col-md-9 px-0" style="position:relative;">
											<a href="detail_page.php?detail=<?php echo $row['id'] ?>"><div class="blank"></div></a>
												<div class="owl-carousel owl-theme" id="listimageslider">
													<div class="item">
														<div class="listimage">
															<img src="<?php echo 'admin/images/shortimage_a/'.$row['imagea'] ?>" />
														</div>
													</div>
													<div class="item">
														<div class="listimage">
															<img src="<?php echo 'admin/images/shortimage_b/'.$row['imageb'] ?>" />
														</div>
													</div>
													<div class="item">
														<div class="listimage">
															<img src="<?php echo 'admin/images/shortimage_c/'.$row['imagec'] ?>" />
														</div>
													</div>
													<div class="item">
														<div class="listimage">
															<img src="<?php echo 'admin/images/shortimage_d/'.$row['imaged'] ?>" />
														</div>
													</div>
													<div class="item">
														<div class="listimage">
															<img src="<?php echo 'admin/images/shortimage_e/'.$row['imagee'] ?>" />
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-md-3 ps-1">
											<a href="detail_page.php?detail=<?php echo $row['id'] ?>">
												<div class="listimages pb-1">
													<img src="<?php echo 'admin/images/shortimage_a/'.$row['imagea'] ?>" />
												</div>
												<div class="listimages pb-1">
													<img src="<?php echo 'admin/images/shortimage_b/'.$row['imageb'] ?>" />
												</div>
												<div class="listimages pb-1">
													<img src="<?php echo 'admin/images/shortimage_c/'.$row['imagec'] ?>" />
												</div>
												<div class="listimages pb-1">
													<img src="<?php echo 'admin/images/shortimage_d/'.$row['imaged'] ?>" />
												</div>
												<div class="listimages pb-1">
													<img src="<?php echo 'admin/images/shortimage_e/'.$row['imagee'] ?>" />
												</div>
												</a>
											</div>
											
										</div>
									</div>
									
									<div  class="col-md-6">
										<div class="list_detail ">
											<h5><?php echo $row['hotel_name'] ?> - <?php echo $datacatprice['category_name'] ?></h5>
											<p><?php echo $row['hotel_address'] ?> &nbsp; <!--<span> <i class="fa-solid fa-location-dot"></i>  4.5 km</span>--></p>
											<div>
											<?php
												$amenities = $row['amenities'];
												//echo $amenities;
												$sqlamenity = "select * from icons where id IN (".$amenities.")";
												//echo $sqlamenity;
												$queryamenity = mysqli_query($conn, $sqlamenity);
											?>
											<?php
												if($queryamenity){
											?>
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
											<?php
												}
											?>
											</div>
											<div class="pricebook">
												<span class="price"><i class="fa-solid fa-indian-rupee-sign" style="color:#ee2a24;; font-size:21px;"></i> <?php echo $row['price'] ?></span>
												<a href="detail_page.php?detail=<?php echo $row['id'] ?>"><button class="book">Book Now</button></a>
												<button class="view"><a href="detail_page.php?detail=<?php echo $row['id'] ?>">View Details</a></button>
											</div>
										</div>
									</div>	
									
								</div>
								<?php
									}
								?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>

		
       	<?php include "include/footer.php";?>
		<?php include "include/footer_script.php";?>
		
		<script>
			$('#listimageslider, #listimageslidercopy').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			dots:false,
			navText: ['<i class="fa-solid fa-angle-left fa-lg"></i></i>','<i class="fa-solid fa-angle-right fa-lg"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1000:{
					items:1
				}
			}
		});
		</script>
	</body>
</html>
