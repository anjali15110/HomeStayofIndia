<?php
	$image_c = $_FILES['imagenamec'];
	$filenamec = $_POST['filenamec'];
	$tempname = $image_c['tmp_name'];
	
	if($filenamec == ''){
		$random = rand(1000,9999);
		$date = date('Y-m-d');
		$filenamec = 'shortimage_c-'.$date.'-'.$random.'.jpg';
	}
	
	$move = move_uploaded_file($tempname, '../images/shortimage_c/'.$filenamec);
	echo $filenamec;
	
?>