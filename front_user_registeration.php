<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
	<?php include "include/header_script.php";?>
	</head>

  <body class="navbar-fixed sidebar-fixed" id="body">
	<?php include "include/header.php";?>
    
    <div class="wrapper">
 
		<div class="content-wrapper" style="padding-top:80px; padding-bottom:80px;">
			<div class="card card-default mx-auto  py-4 px-4" style="
			margin-top: 110px;
			background: hsl(0deg 0% 38.04%);
			margin-inline: auto!important;
			width: 68%;
			backdrop-filter: blur(30px);
			">
				<h1 style="text-align:center;" class=" font-weight-bolder text-light">Registeration</h1>
				<div class="card-body">
					<div class="row">
						<div class="col-xl-6">
							<div class="mb-5">
								<div class="input-group mb-3">
									<input type="text" class="form-control bg-light" id="name" placeholder="Name" >
								</div>
								<div id="validname"></div>
							</div>
						</div>
						
						<div class="col-xl-6">
							<div class="mb-5">
								<div class="input-group mb-3">
									<input type="email" class="form-control bg-light" id="email" placeholder="Email">
								</div>
								<div id="validemail"></div>
							</div>
						</div>
						
						<div class="col-xl-6">
							<div class="mb-5">
								<div class="input-group mb-3" style="position:relative">
									<input type="number" class="form-control bg-light" id="phone" placeholder="Phone">
									<div class="userphonehide"></div>
								</div>
								<div id="validphone"></div>
							</div>
						</div>
						
						<div class="col-xl-6">
							<div class="mb-5">
								<div class="input-group mb-3">
									<input type="text" class="form-control bg-light" id="city" placeholder="City">
								</div>
								<div id="validcity"></div>
							</div>
						</div>
						
						<div class="col-xl-6">
							<div class="mb-5">
								<div class="input-group mb-3">
									<input type="text" class="form-control bg-light" id="state" placeholder="State">
								</div>
								<div id="validstate"></div>
							</div>
						</div>
						
						<div class="col-xl-6">
							<div class="mb-5">
								<div class="input-group mb-3">
									<input type="text" class="form-control bg-light" id="pincode" placeholder="Pincode">
								</div>
								<div id="validpincode"></div>
							</div>
						</div>
						
						<div class="col-xl-12">
							<div class="mb-5">
								<div class="input-group mb-3">
									<input type="password" class="form-control bg-light" id="password" placeholder="Password">
								</div>
								<div id="validpass"></div>
							</div>
						</div>
						<button type="submit" id="submit" style="background:#b3cbff; width:fit-content; margin-left:10px;" class="btn text-secondary mb-4">
						  Submit
						</button>
						<p class="text-light text-center">Not a member? &nbsp; <a href="signin.php" class="text-light"> Signin</a></p>
						<div class="text-center">
							<p class="text-light">or sign up with:</p>
							<button type="button" class="btn btn-link btn-floating mx-1">
								<i class="fab fa-facebook-f text-light"></i>
							</button>

							<button type="button" class="btn btn-link btn-floating mx-1">
								<i class="fab fa-google text-light"></i>
							</button>

							<button type="button" class="btn btn-link btn-floating mx-1">
								<i class="fab fa-twitter text-light"></i>
							</button>

							<button type="button" class="btn btn-link btn-floating mx-1">
								<i class="fab fa-github text-light"></i>
							</button>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
    
		<?php include "include/footer.php";?>
        <?php include "include/footer_script.php";?>
		
		<script>
			$(document).ready(function(){
				$('#submit').click(function(){
					var name = $('#name').val();
					var email = $('#email').val();
					var phone = $('#phone').val();
					var city = $('#city').val();
					var state = $('#state').val();
					var pincode = $('#pincode').val();
					var password = $('#password').val();
					
					if(name == ''){
						$('#validname').html("Enter your name *");
						$('#validname').css('color','red');
						return false;	 
					}else if(email == ''){
						$('#validemail').html("Enter your email *");
						$('#validemail').css('color','red');
						return false;
					}else if(phone == ''){
						$('#validphone').html("Enter your phone *");
						$('#validphone').css('color','red');
						return false;
					}else if(city == ''){
						$('#validcity').html("Enter your city *");
						$('#validcity').css('color','red');
						return false;
					}else if(state == ''){
						$('#validstate').html("Enter your state *");
						$('#validstate').css('color','red');
						return false;
					}else if(pincode == ''){
						$('#validpincode').html("Enter your pincode *");
						$('#validpincode').css('color','red');
						return false;
					}else if(password == ''){
						$('#validpass').html("Enter your password *");
						$('#validpass').css('color','red');
						return false;
					}
					
					var obj = {
						name : name,
						email : email,
						phone : phone,
						city : city,
						state : state,
						pincode : pincode,
						password : password,
					}
					$.ajax({
						type : "POST",
						url : "admin/ajax/front_user_ajax.php",
						data : obj,
						success : function(response)
						{
							if(response == 'success'){
								console.log('success');
							}else{
								console.log('error');	
							} 
						}
					})
					
				});
			});
		</script>
		
	</body>
</html>
