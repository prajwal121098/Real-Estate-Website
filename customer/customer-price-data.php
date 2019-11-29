<?php 
	header('Content-Type: application/json');
	include('database.php');

	$sqprice = mysqli_real_escape_string($conn,$_POST['sqprice']);
	$bookamt = mysqli_real_escape_string($conn,$_POST['bookamt']);
	//$pfk = mysqli_real_escape_string($conn,$_POST['pfk']);


	$sql = "SELECT * FROM basicdetail";
	$res = mysqli_query($conn,$sql);
	$queryres = mysqli_num_rows($res);	

	$ssql = "SELECT * FROM basicdetail where detailid=$queryres";
	$sres = mysqli_query($conn,$ssql);
	$srow = mysqli_fetch_assoc($sres);

	$row = $srow['parea'];
	$tprice = ($row * $sqprice);

	if (!empty($_POST['sqprice']) && !empty($_POST['bookamt'])) {

		$custisql = "INSERT INTO price(`tprice`,`sqprice`, `bookamt`) VALUES (?,?,?)";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt,$custisql)) {
			$errorDisplay = "There is sql error, try again.";
		}else{
			mysqli_stmt_bind_param($stmt,"iii",$tprice, $sqprice, $bookamt);
			mysqli_stmt_execute($stmt);
			$custires = mysqli_stmt_store_result($stmt);

			http_response_code(200);
			$result_detail = array();

			if ($custires) {
				$result_detail['status'] = 1;
				$result_detail['tprice'] = $tprice;
				echo json_encode($result_detail);
			}else{
				$result_detail['status'] = 0;
				echo json_encode($result_detail);
			}
		}
	}

?>