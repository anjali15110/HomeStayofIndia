<?php

	session_start();
	
	if(!isset($_SESSION['token']) || ($_SESSION['token'] == '') || ($_SESSION['type'] == 0)){
		header("Location: login.php");
	}
	
	
	include "conn/conn.php";
	
	$id = null;
	$row = null;
	
	if(isset($_GET['id'])){
	$id = $_GET['id'];
	//echo $id;
	$sql = "select * from hotels where id = '".$id."'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);
	//print_r($row);
	}
	
	$catquery = "select id, category_name from category";
	$run = mysqli_query($conn, $catquery);
	
	$amenitiessql = "select * from icons";
	$amenitiesquery = mysqli_query($conn, $amenitiessql);
	//print_r($amenitiesquery);


?>

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
						<div class="card-header">
							<a class="btn text-light float-right" href="hotel_table.php" style="width:fit-content; background:#9e6de2; display:flex; place-self:flex-end">View List</a>
						</div>
						
						
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="hotel_name">Amenities Name</label>
										
										<?php
											if($row != null){
										?>
										<div class="row">
											<?php
												while($amenitiesrow = mysqli_fetch_assoc($amenitiesquery)){
												
														$editarray = explode(',', $row['amenities']);
														$isarray = in_array($amenitiesrow['id'], $editarray);
											?>
												<div class="col-md-2">
													<input type="checkbox" class="rounded-0 bg-light mb-3 amenities" value="<?php echo $amenitiesrow['id']; ?>" <?php echo $isarray ? 'checked' : ''; ?> /> <?php echo $amenitiesrow['iconname']; ?>
												</div>
												<div id="validamenities"></div>
											<?php										
												}
											?>
										</div>
										<?php
											}else{
										?>
										<div class="row">
											<?php
												while($amenitiesrow = mysqli_fetch_assoc($amenitiesquery)){
												
											?>
												<div class="col-md-2">
													<input type="checkbox" class="rounded-0 bg-light mb-3 amenities" value="<?php echo $amenitiesrow['id']; ?>" /> <?php echo $amenitiesrow['iconname']; ?>
												</div>
												
											<?php										
												}
											?>
										</div>
										<?php
											}
										?>
											
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="category">Category Name</label>
										<select class="form-control bg-light" id="category">
												<option value="">---Select Category---</option>
												<?php
													while($data = mysqli_fetch_assoc($run)){
														$select = $data['id'] == $row['category_id'] ? true : false;
												?>
													<option value="<?php echo $data['id']?>" <?php echo $select ? 'selected' : '' ?>> <?php echo $data['category_name']; ?></option>
												<?php
													}
												?>
										</select>
										<div id="validcategory"></div>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="hotel_name">Hotel Name</label>
										<input type="text" class="form-control rounded-0 bg-light" id="hotel_name" placeholder="Enter Name" value="<?php echo $row !=null ? $row['hotel_name'] : '' ?>">
									</div>
									<div id="validname"></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="hotel_address">Hotel Address</label>
										<input type="text" class="form-control rounded-0 bg-light" id="hotel_address" placeholder="Enter address" value="<?php echo $row !=null ? $row['hotel_address'] : '' ?>">
									</div>
									<div id="validaddress"></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="description">Description</label>
										<input type="text" class="form-control rounded-0 bg-light" id="description" placeholder="Enter description" value="<?php echo $row !=null ? $row['description'] : '' ?>">
									</div>
									<div id="validdescription"></div>
								</div>

								<div class="col-md-6">								
									<div class="form-group">
										<label for="policies">Hotel policies</label>
										<textarea id="policies" name="content" class="form-control rounded-0 bg-light"><?php echo $row !=null ? $row['policies'] : '' ?></textarea>
										<!--<input type="text" class="form-control rounded-0 bg-light" id="policies" placeholder="Enter Name" value="<?php echo $row !=null ? $row['policies'] : '' ?>">-->
									</div>
									<div id="validpolicies"></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="price">Price</label>
										<input type="text" class="form-control rounded-0 bg-light" id="price" placeholder="Enter price" value="<?php echo $row !=null ? $row['price'] : '' ?>">
									</div>
									<div id="validprice"></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="discount">Discount</label>
										<input type="text" class="form-control rounded-0 bg-light" id="discount" placeholder="Enter discount" value="<?php echo $row !=null ? $row['discount'] : '' ?>">
									</div>
									<div id="validdiscount"></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="area">Area</label>
										<input type="text" class="form-control rounded-0 bg-light" id="area" placeholder="Enter area" value="<?php echo $row !=null ? $row['area'] : '' ?>">
									</div>
									<div id="validarea"></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="shortimagea">Small_Image1</label>
										<?php
											if($row){
										?>
											<div id="shortimagea" class="mb-3" style="width:100px; height:100px;"><img src="<?php echo 'images/shortimage_a/'.$row['imagea']; ?>" style="width:100%; height:100%;" /></div>
										<?php	
											}else{
										?>
											<div id="shortimagea" class="mb-3"></div>
										<?php	
											}
										?>
										<input type="file" class="form-control rounded-0 bg-light" id="image_a" placeholder="" value="<?php echo $row !=null ? $row['imagea'] : '' ?>">
										<input type="hidden" class="form-control rounded-0 bg-light" id="imagea" placeholder="" value="<?php echo $row !=null ? $row['imagea'] : '' ?>">
									</div>
									<div id="validimagea"></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="shortimageb">Small_Image2</label>
										<?php
											if($row){
										?>
											<div id="shortimageb" class="mb-3" style="width:100px; height:100px;"><img src="<?php echo 'images/shortimage_b/'.$row['imageb']; ?>" style="width:100%; height:100%;" /></div>
										<?php	
											}else{
										?>
											<div id="shortimageb" class="mb-3"></div>
										<?php	
											}
										?>
										<input type="file" class="form-control rounded-0 bg-light" id="image_b" placeholder="" value="<?php echo $row !=null ? $row['imageb'] : '' ?>">
										<input type="hidden" class="form-control rounded-0 bg-light" id="imageb" placeholder="" value="<?php echo $row !=null ? $row['imageb'] : '' ?>">
									</div>
									<div id="validimageb"></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="shortimagec">Small_Image3</label>
										<?php
											if($row){
										?>
											<div id="shortimagec" class="mb-3" style="width:100px; height:100px;"><img src="<?php echo 'images/shortimage_c/'.$row['imagec']; ?>" style="width:100%; height:100%;" /></div>
										<?php	
											}else{
										?>
											<div id="shortimagec" class="mb-3"></div>
										<?php	
											}
										?>
										<input type="file" class="form-control rounded-0 bg-light" id="image_c" placeholder="" value="<?php echo $row !=null ? $row['imagec'] : '' ?>">
										<input type="hidden" class="form-control rounded-0 bg-light" id="imagec" placeholder="" value="<?php echo $row !=null ? $row['imagec'] : '' ?>">
									</div>
									<div id="validimagec"></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="shortimaged">Small_Image4</label>
										<?php
											if($row){
										?>
											<div id="shortimaged" class="mb-3" style="width:100px; height:100px;"><img src="<?php echo 'images/shortimage_d/'.$row['imaged']; ?>" style="width:100%; height:100%;" /></div>
										<?php	
											}else{
										?>
											<div id="shortimaged" class="mb-3"></div>
										<?php	
											}
										?>
										<input type="file" class="form-control rounded-0 bg-light" id="image_d" placeholder="" value="<?php echo $row !=null ? $row['imaged'] : '' ?>">
										<input type="hidden" class="form-control rounded-0 bg-light" id="imaged" placeholder="" value="<?php echo $row !=null ? $row['imaged'] : '' ?>">
									</div>
									<div id="validimaged"></div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="shortimagee">Small_Image5</label>
										<?php
											if($row){
										?>
											<div id="shortimagee" class="mb-3" style="width:100px; height:100px;"><img src="<?php echo 'images/shortimage_e/'.$row['imagee']; ?>" style="width:100%; height:100%;" /></div>
										<?php	
											}else{
										?>
											<div id="shortimagee" class="mb-3"></div>
										<?php	
											}
										?>
										<input type="file" class="form-control rounded-0 bg-light" id="image_e" placeholder="" value="<?php echo $row !=null ? $row['imagee'] : '' ?>">
										<input type="hidden" class="form-control rounded-0 bg-light" id="imagee" placeholder="" value="<?php echo $row !=null ? $row['imagee'] : '' ?>">
									</div>
									<div id="validimagee"></div>
								</div>
								
							</div>
							
							<?php
								if($row != null){
							?>
								<button type="submit" class="btn btn-info update">Update</button>
							<?php
								}else{
							?>
								<button type="submit" class="btn btn-info submit">Submit</button>
							<?php
								}
							?>
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
		
			$( 'textarea#policies' ).ckeditor();
		
			// Get the editor data.
			var data = $( 'textarea#policies' ).val();
			// Set the editor data.
			$( 'textarea#policies' ).val(data);
			
		</script>
		
		<script>
		
			$(document).ready(function(){
				$("#image_a").change(function(){
					var filename = $("#imagea").val();
					var imagea = $(this)[0].files[0];
					//console.log(imagea);
					var formdata = new FormData();
					formdata.append('imagename', imagea);
					formdata.append('filename', filename);
					
					$.ajax({
						url : "ajax/upload_image_a.php",
						type : "POST",
						data : formdata,
						processData: false,
						contentType: false,
						success : function(resp){
							//console.log(resp);
							if(resp != ''){
								var path = 'images/shortimage_a/'+resp;
								console.log(path);
								$('#shortimagea').html('<img src="'+path+'" width="100px" height="100px"/>');
								$("#imagea").val(resp);
							}
						}	
					})
					
				});
				
				$("#image_b").change(function(){
					var filenamea = $("#imageb").val();
					var imageb = $(this)[0].files[0];
					//console.log(imagea);
					var formdata = new FormData();
					formdata.append('imagenamea', imageb);
					formdata.append('filenamea', filenamea);
					
					$.ajax({
						url : "ajax/upload_image_b.php",
						type : "POST",
						data : formdata,
						processData: false,
						contentType: false,
						success : function(resp){
							//console.log(resp);
							if(resp != ''){
								var path = 'images/shortimage_b/'+resp;
								console.log(path);
								$('#shortimageb').html('<img src="'+path+'" width="100px" height="100px"/>');
								$("#imageb").val(resp);
							}
						}	
					})
					
				});
				
				
				$("#image_c").change(function(){
					var filenamec = $("#imagec").val();
					var imagec = $(this)[0].files[0];
					//console.log(imagea);
					var formdata = new FormData();
					formdata.append('imagenamec', imagec);
					formdata.append('filenamec', filenamec);
					
					$.ajax({
						url : "ajax/upload_image_c.php",
						type : "POST",
						data : formdata,
						processData: false,
						contentType: false,
						success : function(resp){
							//console.log(resp);
							if(resp != ''){
								var path = 'images/shortimage_c/'+resp;
								console.log(path);
								$('#shortimagec').html('<img src="'+path+'" width="100px" height="100px"/>');
								$("#imagec").val(resp);
							}
						}	
					})
					
				});
				
				$("#image_d").change(function(){
					var filenamed = $("#imaged").val();
					var imaged = $(this)[0].files[0];
					//console.log(imagea);
					var formdata = new FormData();
					formdata.append('imagenamed', imaged);
					formdata.append('filenamed', filenamed);
					
					$.ajax({
						url : "ajax/upload_image_d.php",
						type : "POST",
						data : formdata,
						processData: false,
						contentType: false,
						success : function(resp){
							//console.log(resp);
							if(resp != ''){
								var path = 'images/shortimage_d/'+resp;
								console.log(path);
								$('#shortimaged').html('<img src="'+path+'" width="100px" height="100px"/>');
								$("#imaged").val(resp);
							}
						}	
					})
					
				});
				
				
				$("#image_e").change(function(){
					var filenamee = $("#imagee").val();
					var imagee = $(this)[0].files[0];
					//console.log(imagea);
					var formdata = new FormData();
					formdata.append('imagenamee', imagee);
					formdata.append('filenamee', filenamee);
					
					$.ajax({
						url : "ajax/upload_image_e.php",
						type : "POST",
						data : formdata,
						processData: false,
						contentType: false,
						success : function(resp){
							//console.log(resp);
							if(resp != ''){
								var path = 'images/shortimage_e/'+resp;
								console.log(path);
								$('#shortimagee').html('<img src="'+path+'" width="100px" height="100px"/>');
								$("#imagee").val(resp);
							}
						}	
					})
					
				});
				
			
				
				$(".submit").click(function(){
					var category = $('#category').val();
					var hotel_name = $('#hotel_name').val();
					var hotel_address = $('#hotel_address').val();
					var description = $('#description').val();
					var policies = $('#policies').val();
					var price = $('#price').val();
					var imagea = $('#imagea').val();
					var imageb = $('#imageb').val();
					var imagec = $('#imagec').val();
					var imaged = $('#imaged').val();
					var imagee = $('#imagee').val();
					var discount = $('#discount').val();
					var area = $('#area').val();
					//var amenities = $('.amenities');
					var i = '';
					   var array = [];
					   $('.amenities:checked').each(function () {
						   array[i++] = $(this).val();
					   }); 
						//console.log(array, 'array');
						var join = array.join();						
						//console.log(join, 'join');					   
				
					if(category == ''){
						$('#validcategory').html("Enter your category *");
						$('#validcategory').css('color','red');
						return false;
					}else if(hotel_name == ''){
						$('#validname').html("Enter your name *");
						$('#validname').css('color','red');
						return false;
					}else if(hotel_address == ''){
						$('#validaddress').html("Enter your address *");
						$('#validaddress').css('color','red');
						return false;
					}else if(description == ''){
						$('#validdescription').html("Enter your description *");
						$('#validdescription').css('color','red');
						return false;
					}else if(policies == ''){
						$('#validpolicies').html("Enter your policies *");
						$('#validpolicies').css('color','red');
						return false;
					}else if(price == ''){
						$('#validprice').html("Enter your price *");
						$('#validprice').css('color','red');
						return false;
					}else if(imagea == ''){
						$('#validimagea').html("Select your imaga *");
						$('#validimagea').css('color','red');
						return false;
					}else if(imageb == ''){
						$('#validimageb').html("Select your imagb *");
						$('#validimageb').css('color','red');
						return false;
					}else if(imagec == ''){
						$('#validimagec').html("Select your imagc *");
						$('#validimagec').css('color','red');
						return false;
					}else if(imaged == ''){
						$('#validimaged').html("Select your imagd *");
						$('#validimaged').css('color','red');
						return false;
					}else if(imagee == ''){
						$('#validimagee').html("Select your image *");
						$('#validimagee').css('color','red');
						return false;
					}else if(discount == ''){
						$('#validdiscount').html("Enter your discount *");
						$('#validdiscount').css('color','red');
						return false;
					}else if(area == ''){
						$('#validarea').html("Enter your area *");
						$('#validarea').css('color','red');
						return false;
					}

				
					var obj = {
						category : category,
						hotel_name : hotel_name,
						hotel_address : hotel_address,
						description : description,
						amenities : join,
						policies : policies,
						price : price, 
						imagea : imagea,
						imageb : imageb,
						imagec : imagec,
						imaged : imaged,
						imagee : imagee,
						discount : discount,
						area : area,
						action : "insert"
					}
					
					$.ajax({
					type : "POST",
					url : "ajax/hotel_ajax.php",
					data : obj,
					success : function(resp)
						{
							if(resp == "success"){
								console.log("successfull");
								//location.reload();
							}else{
								console.log("error");	
							}
						} 
					})
				});
				
				$(".update").click(function(){
					var category = $('#category').val();
					var hotel_name = $('#hotel_name').val();
					var hotel_address = $('#hotel_address').val();
					var description = $('#description').val();
					//var amenities = $('#amenities').val();
					var policies = $('#policies').val();
					var price = $('#price').val();
					var imagea = $('#imagea').val();
					var imageb = $('#imageb').val();
					var imagec = $('#imagec').val();
					var imaged = $('#imaged').val();
					var imagee = $('#imagee').val();
					var discount = $('#discount').val();
					var area = $('#area').val();
					var id = '<?php echo $id ?>';
					var i = '';
					   var array = [];
					   $('.amenities:checked').each(function () {
						   array[i++] = $(this).val();
					   }); 
						//console.log(array, 'array');
						var join = array.join();						
						//console.log(join, 'join');					   
				
					
					var obj = {
						category : category,
						hotel_name : hotel_name,
						hotel_address : hotel_address,
						description : description,
						amenities : join,
						policies : policies,
						price : price,
						imagea : imagea,
						imageb : imageb,
						imagec : imagec,
						imaged : imaged,
						imagee : imagee,
						discount : discount,
						area : area,
						action : "update",
						id : id
					}
					
					$.ajax({
					type : "POST",
					url : "ajax/hotel_ajax.php",
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
				
			})
			
			
		</script>
	
  </body>
</html>
