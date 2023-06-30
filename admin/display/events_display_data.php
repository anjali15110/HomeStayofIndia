<?php
	include "../conn/conn.php";

	$sql = "select * from events_form";
	$query = mysqli_query($conn, $sql);
	//print_r($query);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php include "../include/header_script.php";?>
	</head>
	
	<body class="navbar-fixed sidebar-fixed" id="body">
		<div class="wrapper">
			<?php 
			include "../include/sidenav.php";
			?>
			
		<div class="page-wrapper">
			<?php 
				include "../include/topnav.php";
			?>

        <div class="content-wrapper">
		   <div class="card-header" style="background:transparent; overflow-x:scroll;">
				<div>
					<a class="btn text-light float-right" href="event_form.php"  style="width:fit-content; background:#9e6de2; margin-bottom:30px;">Add New Event</a>
				</div>
					<table id="productsTable" class="table table-hover table-product mb-6" style="width:100%">
						<tr>
							<th>Id</th>
							<th>List</th>
							<th>List image</th>
							<th>Event Name</th>
							<th>Event Date</th>
							<th>Price</th>
							<th>Detail Image</th>
							<th>Description</th>
							<th>Features</th>
							<th>Created Date</th>
							<th>Status</th>
							<th>Update</th>
							
						</tr>
							<?php
								$count = 1;
								while($data = mysqli_fetch_assoc($query)){
							?>
								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $data['lists']; ?></td>
									<td><?php echo $data['list_image']; ?></td>
									<td><?php echo $data['event_name']; ?></td>
									<td><?php echo $data['event_date']; ?></td>
									<td><?php echo $data['price']; ?></td>
									<td><?php echo $data['detail_image']; ?></td>
									<td><?php echo $data['description']; ?></td>
									<td><?php echo $data['features']; ?></td>
									<td><?php echo $data['createddate']; ?></td>
									<td><?php echo $data['status'] ? '<a class="btn text-light changecolor" style="background:#9e6de0">Active</a>' : '<a class="btn btn-danger">Dective</a>' ?></td>
									<td><a class="btn btn-info" href="event_form.php?id=<?php echo $data['id'] ?>">Update</a></td>
								</tr>
							<?php
							$count++;							
								}
							?>
							
						<tr>
							<th>Id</th>
							<th>List</th>
							<th>List image</th>
							<th>Event Name</th>
							<th>Event Date</th>
							<th>Price</th>
							<th>Detail Image</th>
							<th>Description</th>
							<th>Features</th>
							<th>Created Date</th>
							<th>Status</th>
							<th>Update</th>
						</tr>
						
						
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
		include "../include/footer_script.php";
	?>


  </body>
</html>
