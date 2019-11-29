<?php 
	header('Content-Type: application/json');
	include('database.php');
	
	$p=$_FILES['file'];
	$pimg = $p['name'];
	$od=$_FILES['opfile'];
	$odimg = $p['name'];
	//$ifk = mysqli_real_escape_string($conn,$_POST['ifk']);

	if (!empty($_FILES['file'])){
		$custisql = "INSERT INTO image(`pimg`,`odimg`) VALUES('$pimg','$odimg')";
		$result = mysqli_query($conn, $custisql);

		if ($result) {
			if(file_exists("img/ ".$p['name'])){
	            echo $p['name']. "already exist. Try another";
	        }else if ($p['type']=="image/jpeg"){
	        	move_uploaded_file($p['tmp_name'],"img/".$p['name']);
	        	move_uploaded_file($od['tmp_name'],"img/".$od['name']);
	        }
	        http_response_code(200);
	        
			$result_detail = 1;
			echo json_encode($result_detail);
		} else {
			$result_detail = 0;
			echo json_encode($result_detail);
		}
	}
?>