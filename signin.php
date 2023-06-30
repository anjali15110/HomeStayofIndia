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
  <?php include "include/header.php";?>
          <div class="container d-flex align-items-center justify-content-center my-3 mt-4">
          <div class="d-flex flex-column justify-content-between" style="margin-bottom:58px;"> 
					<div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                        <h2>Sign In</h2>
                    </div>
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-10">
                <div class="card card-default py-2 pt-4" style="border: 1px solid #c3c4c7; background: #858585a6;">
          
                  <div class="card-body px-5 pb-5 pt-0">
                      <div class="row">
                        <div class="form-group col-md-12 mb-4">
						<p class="text-light">Email</p>
                          <input type="email" class="form-control input-lg" style="border: 1px solid #c3c4c7;" id="email" aria-describedby="emailHelp"
                           >
						   <div id="validemail"></div>
                        </div>
                        <div class="form-group col-md-12 ">
						<p class="text-light">Password</p>
                          <input type="text" class="form-control input-lg" id="password" style="border: 1px solid #c3c4c7;">
						  <div id="validpassword"></div>
                        </div>
                        <div class="col-md-12">
							<div class="d-flex justify-content-between">

								<div class="custom-control custom-checkbox mt-4">
									<p class="text-light"> &emsp; If you have no account <a href="front_user_registeration.php"> <span> Register</span></a></p>
								</div>

							</div>
                        </div>
					
						 <button type="submit" id="signin" class="btn btn-primary mt-4" style="width:100%; background: #0d6efd87;">Log In</button>
						 
                      </div>
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
						url : "admin/ajax/sign_ajax.php",
						data : obj,
						success : function(response)
						{
							if(response == 1){
								//location.reload();
								
								//history.back();
								window.history.go(-1);
								
								//window.location.href='detail_page.php';
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
