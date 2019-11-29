<!DOCTYPE html>
<html>
<head>
	<title>Registration Status - page</title>
	<!-- Bootstrap core CSS -->
  	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
	include_once('database.php');
	
	$firstname = mysqli_real_escape_string($conn,$_POST['reg-firstname']);
	$lastname = mysqli_real_escape_string($conn,$_POST['reg-lastname']);
	$email = mysqli_real_escape_string($conn,$_POST['reg-email']);
	$password = mysqli_real_escape_string($conn,$_POST['reg-password']);
	$phone = mysqli_real_escape_string($conn,$_POST['reg-phone']);	


	date_default_timezone_get('asia/kolkata');
	$ts = time();
	$submittime = date('h:i:s',$ts);
	$submitdate = date('Y/m/d',$ts);

	$sql = "select * from registration where email='$email'";
	$result = mysqli_query($conn,$sql);
	$resultcheck = mysqli_num_rows($result);

	if ($resultcheck > 0) {
	?>
		<div class="container mt-5 mb-3">
			<div class="card">
				<h1 class="card-header justify font-weight-normal" style="background-color: #ff4444;height: 100px;">Registration Status</h1>
				<div class="card-body">
					<div class="alert alert-primary" role="alert">
					 	Email Is Already Exit, try again.. 
					</div>
					<button class="btn btn-danger" onclick="goBack()">Go Previous</button>
				</div>
			</div>
		</div>
	<?php	
	}
	else
	{
		$hashedpwd = password_hash($password,PASSWORD_DEFAULT);
		$isql = "INSERT INTO `registration`(`firstname`, `lastname`, `email`, `password`, `phone`, `submittime`, `submitdate`) VALUES (?,?,?,?,?,?,?)";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $isql)){
		?>
			<div class="container mt-5 mb-3">
				<div class="card">
					<h1 class="card-header justify font-weight-normal" style="background-color: #ff4444;height: 100px;">Error Message</h1>
					<div class="card-body">
						<div class="alert alert-primary" role="alert">
						 	There is SQL error, try again.. 
						</div>
						<button class="btn btn-danger" onclick="goBack()">Go Previous</button>
					</div>
				</div>
			</div>	
		<?php
		} else{
			mysqli_stmt_bind_param($stmt,"sssssss", $firstname, $lastname, $email, $hashedpwd, $phone, $submittime, $submitdate);
			mysqli_stmt_execute($stmt);
			$ires = mysqli_stmt_store_result($stmt);

			if($ires){
			?>
				<div class="container mt-5 mb-3">
					<div class="card">
						<h1 class="card-header justify font-weight-normal" style="background-color: #ff4444;height: 100px;">Registration Status</h1>
						<div class="card-body">
							<div class="alert alert-primary" role="alert">
							 	Registration Is Successfully Done. Click below button to Login.. 
							</div>
							<button class="btn btn-danger" onclick="goBack()">Go Previous</button>
						</div>
					</div>
				</div>

			<?php
			}else{
			?>
				<div class="container mt-5 mb-3">
					<div class="card">
						<h1 class="card-header justify font-weight-normal" style="background-color: #ff4444;height: 100px;">Registration Status</h1>
						<div class="card-body">
							<div class="alert alert-primary" role="alert">
							 	Registration Is Failure. Click below button to register again..
							</div>
							<button class="btn btn-danger" onclick="goBack()">Go Previous</button>
						</div>
					</div>
				</div>
			<?php
			}
		}
	}		
?>

	<!-- JQuery --> 
  	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  	<!-- Bootstrap core JavaScript -->
  	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  	<script type="text/javascript">
		function goBack() {
		  window.history.back();
		}
	</script>
</body>
</html>