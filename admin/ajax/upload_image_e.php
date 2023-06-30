<?php
	$image_e = $_FILES['imagenamee'];
	$filenamee = $_POST['filenamee'];
	$tempname = $image_e['tmp_name'];
	
	if($filenamee == ''){
		$random = rand(1000,9999);
		$date = date('Y-m-d');
		$filenamee = 'shortimage_e-'.$date.'-'.$random.'.jpg';
	}
	
	$move = move_uploaded_file($tempname, '../images/shortimage_e/'.$filenamee);
	echo $filenamee;
	
?>