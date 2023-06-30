<?php  

	include "admin/conn/conn.php";

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
						<div class="col-md-6">
							<div>
								<ul>
									<li><a href="index.php">Home</a></li>
									<li>/</li>
									<li><a href="aboutus.php">Contact</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-6">
							<div style="float:right;">
								<h4 class="mb-0">Contact</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="left-inner-contact">
							<h2 class="contact">Contact Info</h2>
							<p><b>Home Stays of India </b><p>
							<br>
							<p><i class="fa-solid fa-location-dot"></i> B-140, Rama Park, Near Dwarka Mor Metro Station. New Delhi – 110059</p>
							<p><i class="fa-solid fa-envelope"></i> info@homestaysofindia.com</p>
							<p>Booking: +91-81783 35056</p>
							<p>Homestay Listing: +91-81783 35056</p>
							<p>Suggestions: +91-81783 35056</p>
							<p><b>Branch Office</b></p>
							<p><i class="fa-solid fa-location-dot"></i> Aurora Waterfront, Floor 16, Unit 20 GN-34/1, GN Block, Sector V, Bidhannagar, Kolkata, West Bengal - 700091</p>
						</div>
					 </div>
					<div class="col-md-6">
					  <div class="right-inner-contact">
							<input  type="text" id="namecontact" placeholder="Name *" value="" />
							<div id="validname"></div>
							<input type="email" id="emailcontact" placeholder="Email *" value="" />
							<div id="validemail"></div>
							<input type="text" id="companycontact" placeholder="Company *"  value=""/>
							<div id="validcompany"></div>
							<div style="position:relative">
								<input type="number" id="phonecontact" placeholder="Phone *" value="" />
								<div id="validphone"></div>
								<div class="phonehide"></div>
							</div>
							<textarea rows="4" id="msg" placeholder="Message *" value=""></textarea>
							<div id="validmsg"></div>
							<button id="submit" class="btn btn-secondary btn-pill">Submit</button>
					  </div>
					</div>
				</div>
			</div>
		</section>
		
       	<?php include "include/footer.php";?>
		<?php include "include/footer_script.php";?>
		
		<script>
			$(document).ready(function(){
				
				$('#submit').click(function(){
					var name = $('#namecontact').val();
					var email = $('#emailcontact').val();
					var company = $('#companycontact').val();
					var phone = $('#phonecontact').val();
					var msg = $('#msg').val();

					if(name == ''){
						$('#validname').html("Enter your name *");
						$('#validname').css('color','red');
						return false;
						 
					}else if(email == ''){
						$('#validemail').html("Enter your email *");
						$('#validemail').css('color','red');
						return false;
					}else if(company == ''){
						$('#validcompany').html("Enter your company *");
						$('#validcompany').css('color','red');
						return false;
					}else if(phone == ''){
						$('#validphone').html("Enter your phone *");
						$('#validphone').css('color','red');
						return false;
					}else if(msg == ''){
						$('#validmsg').html("Enter your massage *");
						$('#validmsg').css('color','red');
						return false;
					}
					
					var obj = {
						name : name,
						email : email,
						company : company,
						phone : phone,
						msg : msg,
					}
					
					// console.log(obj);
					
					$.ajax({
					type : "POST",
					url : "admin/ajax/contact_ajax.php",
					data : obj,
					success : function(resp)
						{
							if(resp == "success"){
								console.log("successfull");
								location.reload();
							}else{
								console.log("error");	
							}
						} 
					})
					
				})
			});
		</script>
	</body>
</html>
