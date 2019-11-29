<?php 
	header('Content-Type: application/json');
	include('database.php');

	$pname = mysqli_real_escape_string($conn,$_POST['pname']);
	$ctype = mysqli_real_escape_string($conn,$_POST['ctype']);
	$cname = mysqli_real_escape_string($conn,$_POST['cname']);
	$cnumber = mysqli_real_escape_string($conn,$_POST['cnumber']);	
	$ptype = mysqli_real_escape_string($conn,$_POST['ptype']);
	$parea = mysqli_real_escape_string($conn,$_POST['parea']);
	$punit = mysqli_real_escape_string($conn,$_POST['punit']);
	$floorallow = mysqli_real_escape_string($conn,$_POST['floorallow']);
	$page = mysqli_real_escape_string($conn,$_POST['page']);
	$bath = mysqli_real_escape_string($conn,$_POST['bath']);

	date_default_timezone_get('asia/kolkata');
	$ts = time();
	$time = date('h:i:s',$ts);
	$date = date('Y/m/d',$ts);

	if (!empty($_POST['pname']) && !empty($_POST['ctype']) && !empty($_POST['cname']) &&  !empty($_POST['cnumber']) && !empty($_POST['ptype']) && !empty($_POST['parea']) && !empty($_POST['punit'])) {

		$custisql = "INSERT INTO basicdetail(`pname`,`ctype`,`cname`,`cnumber`,`ptype`, `parea`, `punit`, `floorallow`, `page`, `bath`,`time`,`date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt,$custisql)) {
			$errorDisplay = "There is sql error, try again.";
		}else{
			mysqli_stmt_bind_param($stmt,"sssssisiiiss",$pname, $ctype, $cname, $cnumber, $ptype, $parea, $punit, $floorallow, $page, $bath, $time, $date);
			mysqli_stmt_execute($stmt);
			$custires = mysqli_stmt_store_result($stmt);

			/*$sql = "SELECT * FROM basicdetail where pname=$pname and ctype=$ctype and cname=$cname";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($custires);*/

			$result_detail = array();

			if ($custires) {
				$result_detail['status'] = 1;
				echo json_encode($result_detail);
			}else{
				$result_detail['status'] = 0;
				echo json_encode($result_detail);
			}
		}
	}

?>