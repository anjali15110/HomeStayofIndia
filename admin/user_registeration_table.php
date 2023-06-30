<?php
	
	session_start();
	
	if( !isset($_SESSION['token']) || $_SESSION['token'] == ''){
		header("Location: login.php");
	}

	include "conn/conn.php";
	
	$userssql = "select * from user";
	$usersquery = mysqli_query($conn, $userssql);
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
				<div class="card-header" style="background:transparent; overflow-x:scroll;">
					<div>
						<h1>User List</h1>
						<a class="btn text-light float-right" href="user_registeration.php"  style="width:fit-content; background:#9e6de2; margin-top:-38px; margin-bottom:30px;">Add New User</a>
					</div>
					<table id="productsTable" class="table table-hover table-product mb-6" style="width:100%">
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>City</th>
								<th>State</th>
								<th>Pincode</th>
								<th>Type</th>
								<th>Created Date</th>
								<th>Status</th>
								<th>Update</th>
							</tr>
							
							<?php
								$count = 1;
								while($usersdata = mysqli_fetch_array($usersquery)){
							?>
								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $usersdata['name']; ?></td>
									<td><?php echo $usersdata['email']; ?></td>
									<td><?php echo $usersdata['phone']; ?></td>
									<td><?php echo $usersdata['city']; ?></td>
									<td><?php echo $usersdata['state']; ?></td>
									<td><?php echo $usersdata['pincode']; ?></td>
									<td><?php echo $usersdata['type']; ?></td>
									<td><?php echo $usersdata['createddate']; ?></td>
									<td><?php echo $usersdata['status'] == 1 ? '<a class="btn text-light changecolor" style="background:#9e6de0">Active</a>' : '<a class="btn btn-danger">Dective</a>' ?></td>
									<td><a class="btn btn-info" href="user_registration.php?id=<?php echo $usersdata['id'] ?>">Update</a></td>
								</tr>
							<?php
								$count++;
								}
							?>
					</table>
				</div>
					<footer class="footer mt-auto text-center">
						<div class="copyright bg-white">
							<p>
							&copy; <span id="copy-year"></span> Copyright Web Developer by <a class="text-primary" href="#" target="_blank" >Anjali Kashyap</a>.
							</p>
						</div>
					</footer>		
			</div>
		</div>
    </div>
    
        <?php include "include/footer_script.php";?>
		
	</body>
</html>
