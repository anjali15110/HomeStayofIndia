<?php
	
	
	session_start();
	
	if(!isset($_SESSION['token']) || ($_SESSION['token'] == '') || ($_SESSION['type'] == 0)){
		header("Location: login.php");
	}
	
	
	include "conn/conn.php";

	$idcats = null;
	$datacats = null;

	if(isset( $_GET['id'])){
	$idcats = $_GET['id'];
	$sqlcats = "select * from category where id = '$idcats'";
	$querycats = mysqli_query($conn, $sqlcats);
	$datacats = mysqli_fetch_assoc($querycats);
	 // echo '<pre>';
	 // print_r ($data);
	// echo '</pre>';

	}

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
							<h1>Enter Your Category Name</h1>
							<a class="btn text-light float-right" href="category_table.php" style="width:fit-content; background:#9e6de2; display:flex; place-self:flex-end">View List</a>
						</div>
						
						<div class="card-body">
							<div class="form-group">
								<label for="cname">Category Name</label>
								<input type="text" class="form-control rounded-0 bg-light" id="cname" placeholder="Enter Name" value="<?php echo $datacats != null ? $datacats['category_name'] : '' ?>">
							</div>
							<div id="validcategory"></div>
							  
							<div class="form-group">
								<label for="image">Image</label>
								
								<?php
								if($datacats){
								?>
									<div id="showimg" class="mb-3" style="width:100px; height:100px;"><img src="<?php echo 'images/category/'.$datacats['category_image']; ?>" style="width:100%; height:100%;" /></div>
								<?php	
								}else{
								?>
									<div id="showimg" class="mb-3"></div>
								<?php	
								}
								?>
								
								<input type="file" class="form-control-file" id="image" value="<?php echo $datacats != null ? $datacats['category_image'] : '' ?>">
								<input type="hidden" class="form-control-file" id="filename" value="<?php echo $datacats != null ? $datacats['category_image'] : ''; ?>">
							</div>
							<div id="validimage"></div>

							<div class="form-footer">
								<?php 
									if($datacats){	
								?>
									<button type="submit" class="btn btn-secondary btn-pill update">Update</button>
								<?php
									}else{
								?>
								  <button type="submit" class="btn btn-secondary btn-pill submit">Submit</button>
								<?php
									}
								?>
							</div>
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
				
				$("#image").change(function(){
					var filename = $("#filename").val();
					//console.log($(this));
					
					var file = $(this)[0].files[0];
					
					
					//console.log(file);
					
					var formdata = new FormData();
					formdata.append('imagefile', file);
					formdata.append('filename', filename);
					
					$.ajax({
						type : "POST",
						url : "ajax/upload_category.php",
						data : formdata,
						processData: false,
						contentType: false,
						success : function(resp)
						{
							//console.log(resp);
							if(resp != ""){
								var path = 'images/category/'+resp;
								console.log(path);
								$('#filename').val(resp);
								$("#showimg").html('<img src="'+path+'?v4" width="100px" height="100px" />');
							}
						} 
					})
					
				});
				
				
				$('.submit').click(function(){
					var category = $('#cname').val();
					var image = $('#filename').val();
					
					if(category == ''){
						$('#validcategory').html("Enter your name *");
						$('#validcategory').css('color','red');
						return false;
						 
					}else if(image == ''){
						$('#validimage').html("Enter your email *");
						$('#validimage').css('color','red');
						return false;
					}
					
					//console.log(image);
					
					var obj = {
						category : category,
						image : image,
						action : "insert"
					}
					
					// console.log(obj);
					
					$.ajax({
					type : "POST",
					url : "category_ajax.php",
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
				
				$('.update').click(function(){
					var category = $('#cname').val();
					var image = $('#filename').val();
					var id = '<?php echo $idcats ?>';
					
					var obj = {
						category : category,
						image : image,
						id : id,
						action : "update"
					}
					
					// console.log(obj);
					
					$.ajax({
					 type : "POST",
					 url : "category_ajax.php",
					data : obj,
					success : function(resp)
						{
							if(resp == "success"){
								console.log("successfull");
							}else{
								console.log("error");	
							}
						} 
					})
					
				});
	
			});
		</script>

  </body>
</html>
