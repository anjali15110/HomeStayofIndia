<?php
	$image_d = $_FILES['imagenamed'];
	$filenamed = $_POST['filenamed'];
	$tempname = $image_d['tmp_name'];
	
	if($filenamed == ''){
		$random = rand(1000,9999);
		$date = date('Y-m-d');
		$filenamed = 'shortimage_d-'.$date.'-'.$random.'.jpg';
	}
	
	$move = move_uploaded_file($tempname, '../images/shortimage_d/'.$filenamed);
	echo $filenamed;
	
?>