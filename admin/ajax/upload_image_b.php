<?php
	$image_b = $_FILES['imagenamea'];
	$filenamea = $_POST['filenamea'];
	$tempname = $image_b['tmp_name'];
	
	if($filenamea == ''){
		$random = rand(1000,9999);
		$date = date('Y-m-d');
		$filenamea = 'shortimage_b-'.$date.'-'.$random.'.jpg';
	}
	
	$move = move_uploaded_file($tempname, '../images/shortimage_b/'.$filenamea);
	echo $filenamea;
	
?>