<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php include "include/header_script.php";?>
	</head>
	
	<body class="navbar-fixed sidebar-fixed" id="body">
		<div class="wrapper">
			<?php 
				include "include/sidenav.php";
			?>
			
			<div class="page-wrapper">
				<?php 
					include "include/topnav.php";
				?>
			
				<div class="content-wrapper">
					<div class="card card-default mx-auto my-auto py-4 px-4" style="margin-top:0; width:90%;">
						<!--<div class="card-header">
							<a class="btn text-light float-right" href="" style="width:fit-content; background:#9e6de2; display:flex; place-self:flex-end"></a>
						</div>-->
						
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="icon">Icon</label>
										<input type="text" class="form-control rounded-0 bg-light" id="icon" placeholder="Enter Icon" value="">
									</div>
									<div id="validicon"></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="iconname">Icon Name</label>
										<input type="text" class="form-control rounded-0 bg-light" id="iconname" placeholder="Enter Icon Name" value="">
									</div>
									<div id="validiconname"></div>
								</div>
						
							</div>
								
							</div>
							
						
						<button type="submit" class="btn btn-info" id="submit">Submit</button>
							
						</div>
					</div>
					
					<footer class="footer mt-auto">
						<div class="copyright bg-white">
						  <p class="text-center">
							&copy; <span id="copy-year"></span> Copyright Web Developer by <a class="text-primary" href="#" target="_blank" >Anjali Kashyap</a>.
						  </p>
						</div>
					</footer>
					
				</div>
			</div>
		</div>
		
    
        <?php 
			include "include/footer_script.php";
		?>
		
		<script>
		
			$(document).ready(function(){
				$("#submit").click(function(){
					var icon = $('#icon').val();
					var iconname = $('#iconname').val();
					
					if(icon == ''){
						$('#validicon').html("Enter your name *");
						$('#validicon').css('color','red');
						return false;
						 
					}else if(iconname == ''){
						$('#validiconname').html("Enter your email *");
						$('#validiconname').css('color','red');
						return false;
					}
					
					var obj = {
						icon : icon,
						iconname : iconname,
						action : "insert"
					}
					
					$.ajax({
					type : "POST",
					url : "ajax/amenities_ajax.php",
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
				});
				
				<!-- $("#update").click(function(){ -->
					<!-- var icon = $('#icon').val(); -->
					<!-- var iconname = $('#iconname').val(); -->
					
					<!-- var obj = { -->
						<!-- icon : icon, -->
						<!-- iconname : iconname, -->
						<!-- action : 'update' -->
					<!-- } -->
					
					<!-- $.ajax({ -->
					<!-- type : "POST", -->
					<!-- url : "ajax/amenities_ajax.php", -->
					<!-- data : obj, -->
					<!-- success : function(resp) -->
						<!-- { -->
							<!-- if(resp == "success"){ -->
								<!-- console.log("successfull"); -->
								<!-- //location.reload(); -->
							<!-- }else{ -->
								<!-- console.log("error");	 -->
							<!-- } -->
						<!-- }  -->
					<!-- }) -->
				<!-- }); -->
				
			})
			
			
		</script>
	
  </body>
</html>
