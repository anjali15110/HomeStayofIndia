<?php
	
	include "conn/conn.php";

	$id = $_GET['icon'];
	$sqlicon = "select * from icons";
	$queryicon = mysqli_query($conn, $sqlicon);
	
	$sql = "select * from category";
	$query = mysqli_query($conn, $sql);
	
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
		   <div class="card-header" style="background:transparent;">
				<!--<div>
					<h1 class="mt-4">Enter Your Category Name</h1>
					<a class="btn text-light float-right" href="category.php"  style="width:fit-content; background:#9e6de2; display:flex; margin-top:-38px; margin-bottom:30px;">Add New Icons</a>
				</div>-->
					<table class="table table-hover table-product mb-6" style="width:100%">
						<tr>
							<th>Id</th>
							<th>Icon</th>
							<th>Icon Name</th>
							<th>Created Date</th>
							<th>Status</th>
							<th>Update</th>
						</tr>
							<?php
								$count = 1;
								while($data = mysqli_fetch_assoc($queryicon)){
							?>
								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $data['icon']; ?></td>
									<td><?php echo $data['iconname']; ?></td>
									<td><?php echo $data['createddate']; ?></td>
									<td><?php echo $data['status'] ? '<a class="btn text-light" style="background:darkcyan">Active</a>' : '<a class="btn btn-danger">Dective</a>' ?></td>
									<td><a class="btn btn-info" href="amenities.php?id=<?php echo $data['id'] ?>">Update</a></td>
								</tr>
							<?php
							$count++;							
								}
							?>
						
						
					</table>
			</div>
        </div>
		
          <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p class="text-center">
                &copy; <span id="copy-year"></span> Copyright Web Developer by <a class="text-primary" href="#" >Anjali Kashyap</a>.
              </p>
            </div>
          </footer>
		  

      </div>
    </div>
    
                   


	<?php 
		include "include/footer_script.php";
	?>


  </body>
</html>
