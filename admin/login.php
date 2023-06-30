<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Login</title>

  <?php include "include/header_script.php";?>
</head>

  <body class="bg-light-gray" id="body">
          <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
          <div class="d-flex flex-column justify-content-between">
					<div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                      <a class="w-auto pl-0" href="/index.html">
                        <img src="images/logo.png" alt="Mono">
                        <span class="brand-name text-dark">MONO</span>
                      </a>
                    </div>
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-10">
			 <!-- <div class="error bg-info" style="visibility:hidden">jhgkjlhjklgjk</div>-->
                <div class="card card-default py-2" style="border: 1px solid #c3c4c7;">
                  <div class="card-header pb-0">
                   
                  </div>
                  <div class="card-body px-5 pb-5 pt-0">
                      <div class="row">
                        <div class="form-group col-md-12 mb-4">
						<p class="text-dark">Email</p>
                          <input type="email" class="form-control input-lg" style="border: 1px solid #c3c4c7;" id="email" aria-describedby="emailHelp"
                           >
						   <div id="validemail"></div>
                        </div>
						
                        <div class="form-group col-md-12 ">
						<p class="text-dark">Password</p>
                          <input type="text" class="form-control input-lg" id="password" style="border: 1px solid #c3c4c7;">
						  <div id="validpassword"></div>
                        </div>
						
                        <div class="col-md-12">
							<div class="d-flex justify-content-between">

								<div class="custom-control custom-checkbox mr-3 mb-3">
								  <input type="checkbox" class="custom-control-input" id="customCheck2">
								  <label class="custom-control-label mt-2 font-weight-lighter" for="customCheck2">Remember Me</label>
								</div>

								 <button type="submit" id="signin" class="btn btn-primary mb-4">Log In</button>
							</div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		
		<?php include "include/footer_script.php";?>
		
		<script>
			$(document).ready(function(){
				$("#signin").click(function(){
					var email = $('#email').val();
					var password = $('#password').val();
					
					if(email == ''){
						$('#validemail').html("Enter your email *");
						$('#validemail').css('color','red');
						return false;
						 
					}else if(password == ''){
						$('#validpassword').html("Enter your password *");
						$('#validpassword').css('color','red');
						return false;
					}
					
					var obj = {email,password}
					
					$.ajax({
						type : "POST",
						url : "ajax/login_ajax.php",
						data : obj,
						success : function(response)
						{
							if(response == 1){
								//location.reload();
								window.location.href='category.php';
							}else{
								alert('Enter your correct Email and Password');
							}
						}
					})
				})
			})
		</script>

</body>
</html>
