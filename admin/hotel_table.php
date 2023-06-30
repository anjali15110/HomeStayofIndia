<?php

	include "conn/conn.php";

	$sql = "select * from hotels";
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
		   <div class="card-header" style="background:transparent; overflow-x:scroll;">
				<div>
					<h1 class="mt-4">Enter Your Category Name</h1>
					<a class="btn text-light float-right" href="hotel.php"  style="width:fit-content; background:#9e6de2; display:flex; margin-top:-38px; margin-bottom:30px;">Add New Category</a>
				</div>
					<table class="table table-hover table-product mb-6" style="width:100%">
						<tr>
							<th>Id</th>
							<th>Category Id</th>
							<th>Hotel Name</th>
							<th>Hotel Address</th>
							<th>Description</th>
							<th>Amenities</th>
							<th>Policies</th>
							<th>Price</th>
							<th>Discount</th>
							<th>Area</th>
							<th>Imagea</th>
							<th>Imageb</th>
							<th>Imagec</th>
							<th>Imaged</th>
							<th>Imagee</th>
							<th>Created Date</th>
							<th>Statue</th>
							<th>Update</th>
						</tr>
							<?php
								$count = 1;
								while($data = mysqli_fetch_assoc($query)){
							?>
								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $data['category_id']; ?></td>
									<td><?php echo substr($data['hotel_name'],0,25); ?></td>
									<td><?php echo substr($data['hotel_address'],0,25); ?></td>
									<td><?php echo substr($data['description'],0,25); ?></td>
									<td><?php echo substr($data['amenities'],0,25); ?></td>
									<td><?php echo substr($data['policies'],0,25); ?></td>
									<td><?php echo $data['price']; ?></td>
									<td><?php echo $data['discount']; ?></td>
									<td><?php echo $data['area']; ?></td>
									<td><?php echo $data['imagea']; ?></td>
									<td><?php echo $data['imageb']; ?></td>
									<td><?php echo $data['imagec']; ?></td>
									<td><?php echo $data['imaged']; ?></td>
									<td><?php echo $data['imagee']; ?></td>
									<td><?php echo $data['createddate']; ?></td>
									<td><?php echo $data['status'] ? '<a class="btn text-light changecolor" style="background:#9e6de0">Active</a>' : '<a class="btn btn-danger">Dective</a>' ?></td>
									<td><a class="btn btn-info" href="hotel.php?id=<?php echo $data['id'] ?>">Update</a></td>
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
