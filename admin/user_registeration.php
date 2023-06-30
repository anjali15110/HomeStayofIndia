<?php

	
	include "conn/conn.php";
	
	$userid = null;
	$userdata = null;
	
	if(isset($_GET['id']))
	{
	$userid = $_GET['id'];
	$usersql = "select * from user where id = '$userid'";
	$userquery = mysqli_query($conn, $usersql);
	//print_r($query);
	$userdata = mysqli_fetch_array($userquery);
	//print_r($data);
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
	<?php include "include/header_script.php";?>
	</head>

  <body class="navbar-fixed sidebar-fixed" id="body">
    
    <div class="wrapper">
      <?php include "include/sidenav.php";?>

		<div class="page-wrapper">
			<?php include "include/topnav.php";?>
 
			<div class="content-wrapper">
				<div class="card card-default mx-auto my-auto py-4 px-4" style="margin:40px auto!important; width:80%;">
					<div class="card-header">
						<h1>User Form</h1>
						<a class="btn text-light float-right" href="user_registeration_table.php" style="width:fit-content; background:#9e6de2; display:flex; place-self:flex-end">View List</a>

					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-xl-6">
								<div class="mb-5">
									<label class="text-dark font-weight-medium" for="list">Name</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control bg-light" id="name" value="<?php echo $userdata != null ? $userdata['name'] : '' ?>">
									</div>
									<div id="validname"></div>
								</div>
							</div>
							
							<div class="col-xl-6">
								<div class="mb-5">
									<label class="text-dark font-weight-medium" for="list">Email</label>
									<div class="input-group mb-3">
										<input type="email" class="form-control bg-light" id="email" value="<?php echo $userdata != null ? $userdata['email'] : '' ?>">
									</div>
									<div id="validemail"></div>
								</div>
							</div>
							
							<div class="col-xl-6">
								<div class="mb-5">
									<label class="text-dark font-weight-medium" for="list">Phone</label>
									<div class="input-group mb-3">
										<input type="number" class="form-control bg-light" id="phone" value="<?php echo $userdata != null ? $userdata['phone'] : '' ?>">
									</div>
									<div id="validphone"></div>
								</div>
							</div>
							
							<div class="col-xl-6">
								<div class="mb-5">
									<label class="text-dark font-weight-medium" for="list">City</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control bg-light" id="city" value="<?php echo $userdata != null ? $userdata['city'] : '' ?>">
									</div>
									<div id="validcity"></div>
								</div>
							</div>
							
							<div class="col-xl-6">
								<div class="mb-5">
									<label class="text-dark font-weight-medium" for="list">State</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control bg-light" id="state" value="<?php echo $userdata != null ? $userdata['state'] : '' ?>">
									</div>
									<div id="validstate"></div>
								</div>
							</div>
							
							<div class="col-xl-6">
								<div class="mb-5">
									<label class="text-dark font-weight-medium" for="list">Pincode</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control bg-light" id="pincode" value="<?php echo $userdata != null ? $userdata['pincode'] : '' ?>">
									</div>
									<div id="validpincode"></div>
								</div>
							</div>
							
							<div class="col-xl-12">
								<div class="mb-5">
									<label class="text-dark font-weight-medium" for="list">Password</label>
									<div class="input-group mb-3">
										<input type="password" class="form-control bg-light" id="password" value="<?php echo $userdata != null ? $userdata['password'] : '' ?>">
									</div>
									<div id="validpass"></div>
								</div>
							</div>
							
							<?php
								if($userdata){
							?>
								<button type="submit" class="btn btn-success btn-pill" id="update">Update</button>
							<?php
								}else{
							?>
								<button type="submit" class="btn btn-success btn-pill" id="submit">Submit</button>
							<?php
								}
							?>
						</div>
					</div>
					
				</div>
				
				<footer class="footer mt-auto text-center">
					<div class="copyright bg-white">
					  <p>
						&copy; <span id="copy-year"></span> Copyright Web Developer by <a class="text-primary" href="#" target="_blank" >Kashyap</a>.
					  </p>
					</div>
				</footer>
			  
			</div>
		</div>
    </div>
    
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
					
					//console.log(name);
					
					var obj = {
						name : name,
						email : email,
						phone : phone,
						city : city,
						state : state,
						pincode : pincode,
						password : password,
						action : 'insert'
					}
					//console.log(obj);
					
					$.ajax({
						type : "POST",
						url : "ajax/user_ajax.php",
						data : obj,
						success : function(response)
						{
							if(response == 'success'){
								console.log('successfull');
								location.reload();
							}else{
								console.log('error');	
							} 
						}
					})
					
				})
				
				$('#update').click(function(){
					var id = '<?php echo $userid ?>';
					var name = $('#name').val();
					var email = $('#email').val();
					var phone = $('#phone').val();
					var city = $('#city').val();
					var state = $('#state').val();
					var pincode = $('#pincode').val();
					var password = $('#password').val();
					
					//console.log(name);
					
					var obj = {
						id : id,
						name : name,
						email : email,
						phone : phone,
						city : city,
						state : state,
						pincode : pincode,
						password : password,
						action : 'update'
					}
					//console.log(obj);
					
					$.ajax({
						type : "POST",
						url : "ajax/user_ajax.php",
						data : obj,
						success : function(response)
						{
							if(response == 'success'){
								console.log('successfull');
							}else{
								console.log('error');	
							} 
						}
					})
					
				})
			});
		</script>
		
	</body>
</html>
