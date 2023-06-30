<?php 
	
	include "admin/conn/conn.php";

	$sqlcat = "select * from category limit 5";
	$querycat = mysqli_query($conn, $sqlcat);

	$sqlhotel = "select * from hotels";
	$queryhotel = mysqli_query($conn, $sqlhotel);
	$rowhotel = mysqli_fetch_assoc($queryhotel);
	
	$uid = null;
	$udata = null;
	
	session_start();
	
	if(isset($_SESSION['frontuser']))
	{
		$uid = $_SESSION['frontuser'];
		$uquery = "select * from user where id = '".$uid."'";
		$usql = mysqli_query($conn, $uquery);
		$udata = mysqli_fetch_assoc($usql);
		//$name = $udata['name'];
		//echo $name;
	}
	
?>

<section class="header">
	<div class="mainheader">
		<div class="container">
			<div class="row mx-0">
				<div class="col-md-3 col-3">
					<div class="logo">
						<a href="index.php"><img src="images/homestay.png" /></a>
					</div>
				</div>
				<div class="col-md-6 col-6">
					<div class="searchinput">
						<input type="search" placeholder="Search" id="search"/>
						<label for="search"><i class="fa-solid fa-magnifying-glass"></i></label>
					</div>
				</div>
				<div class="col-md-3 col-3">
					<?php
						if((isset($_SESSION['frontuser']))){
					?>
						<div class="status">
							<a href="signup.php"><button class="btn-lg btn-danger login">LOGOUT</button></a>
						</div>
					<?php
						}else{
					?>
						<div class="status">
							<a href="signin.php"><button class="btn-lg btn-danger login">LOGIN</button></a>
						</div>
					<?php
						}
					?>
				
				</div>
			</div>
		</div>
	</div>
	<div class="navheader">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<nav>
						<ul>
							<li><a href="index.php">HOME</a></li>
							<li><a href="aboutus.php">ABOUT US</a></li>
							<?php  
								while($rowcat = mysqli_fetch_assoc($querycat)){
							?>
								<li><a href="list_page.php?listid=<?php echo $rowcat['id'] ?>"><?php echo $rowcat["category_name"] ?></a></li>
							<?php							
								}
							?>
							<li><a href="impact.php">IMPACT</a></li>
							<li><a href="contact.php">CONTACT US</a></li>
						</ul>
					</nav>
				</div>
				<div class="col-md-3">
					<button class="btn homestay">LIST MY HOMESTAY</button>
				</div>
			</div>
		</div>
	</div>
	<div class="categorynav">
		<div class="container">
			<div class="row">
					<?php
						while($rowcat = mysqli_fetch_assoc($querycat)){
					?>
						<div class="col-md-2 col-sm-2 col-3">
						<div class="text-center"><a href="list_page.php?listid=<?php echo $rowcat['id'] ?>"><?php echo $rowcat["category_name"] ?></a></div>
						</div>
					<?php					
						}
					?>
			</div>
		</div>
	</div>
</section>
