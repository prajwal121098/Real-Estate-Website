<?php 
	header('Content-Type: application/json');
	include('database.php');
	$feature = mysqli_real_escape_string($conn,$_POST['feature']);

	$custisql = "INSERT INTO feature(`feature`) VALUES ('$feature')";
	$result = mysqli_query($conn,$custisql);

	if ($result) {
		$result_detail = 1;
		echo json_encode($result_detail);
	}else{
		$result_detail = 0;
		echo json_encode($result_detail);
	}
	

?>