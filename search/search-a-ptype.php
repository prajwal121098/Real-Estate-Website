<?php 
	header('Content-Type: application/json');
	include('database.php');

	$apartment = mysqli_real_escape_string($conn,$_POST['apartment']);

	if (!empty($apartment)) {
		$asql = "SELECT * FROM basicdetail";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt,$asql)) {
			$errorDisplay = "There is sql error, try again.";
		}else{
			mysqli_stmt_execute($stmt);
			$aresult = mysqli_stmt_get_result($stmt);
			$arow = mysqli_fetch_assoc($aresult);

			if ($arow) {
				$aresult_detail = $arow;
				echo json_encode($result_detail);
			}else{
				$aresult_detail = $arow;
				echo json_encode($result_detail);
			}
		}
	}
?>