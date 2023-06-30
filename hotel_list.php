<?php

	include "admin/conn/conn.php";
	
	$hotellistsql = "select * from hotels";
	$hotellistquery = mysqli_query($conn, $hotellistsql);
	//print_r($hotellistquery);
	//$hotellistrow = mysqli_fetch_assoc($hotellistquery);
	
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php include "include/header_script.php";?>
	</head>
	<body>
		<?php include "include/header.php";?>
	
		<section>
			<div class="container">
				<div class="row">
					<?php
						while($hotellistrow = mysqli_fetch_assoc($hotellistquery)){
					?>
						<div class="col-md-3">
							<div>
								<img src="" />
							</div>
						</div>
					<?php
						}
					?>
				</div>
			</div>
		</section>

       	<?php include "include/footer.php";?>
		<?php include "include/footer_script.php";?>
		
	</body>
</html>
