<?php
	$image_a = $_FILES['imagename'];
	$filename = $_POST['filename'];
	$tempname = $image_a['tmp_name'];
	
	if($filename == ''){
		$random = rand(1000,9999);
		$date = date('Y-m-d');
		$filename = 'shortimage_a-'.$date.'-'.$random.'.jpg';
	}
	
	$move = move_uploaded_file($tempname, '../images/shortimage_a/'.$filename);
	echo $filename;
	
?>