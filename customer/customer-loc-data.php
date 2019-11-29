<?php 
	header('Content-Type: application/json');
	include('database.php');

	$city = mysqli_real_escape_string($conn,$_POST['city']);
	$state = mysqli_real_escape_string($conn,$_POST['state']);
	$houseno = mysqli_real_escape_string($conn,$_POST['houseno']);
	//$lfk = mysqli_real_escape_string($conn,$_POST['lfk']);

	if (!empty($_POST['city']) && !empty($_POST['houseno'])) {

		$custisql = "INSERT INTO location(`city`,`state`, `houseno`) VALUES (?,?,?)";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt,$custisql)) {
			$errorDisplay = "There is sql error, try again.";
		}else{
			mysqli_stmt_bind_param($stmt,"sss",$city, $state, $houseno);
			mysqli_stmt_execute($stmt);
			$custires = mysqli_stmt_store_result($stmt);

			http_response_code(200);
			
			if ($custires) {
				$result_detail = 1;
				echo json_encode($result_detail);
			}else{
				$result_detail = 0;
				echo json_encode($result_detail);
			}
		}

	}

?>