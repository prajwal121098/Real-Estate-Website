<!DOCTYPE html>
<html>
<head>
	<title>Registration Status - page</title>
	<!-- Bootstrap core CSS -->
  	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php	 
	session_start();

	if (isset($_POST['login'])){
		include_once('database.php');

		$uemail = mysqli_real_escape_string($conn,$_POST['useremail']);
		$upassword = mysqli_real_escape_string($conn,$_POST['userpassword']);
		
		if(empty($uemail) || empty($upassword)){
			header("Location: ../index/index.php?login=incorrectfirst");
			exit();
		}else{
			$sql = "select * from registration where email='$uemail'";
			$stmt = mysqli_stmt_init($conn);

			if(!mysqli_stmt_prepare($stmt, $sql)){
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
			} else {
					
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$queryresult = mysqli_num_rows($result);
					
				
				if($queryresult < 1) {
					header("Location: ../index/index.php?login=incorrectsecond");
					exit();
				}else{
					if ($row = mysqli_fetch_assoc($result)){
						//echo $row['password']."<br>";
						//echo $password;
						$passcheck = password_verify($upassword,$row['password']);
						if($passcheck == false)   //$password != $row['password']
						{
						?>
							<div class="container mt-5 mb-3">
								<div class="card">
									<h1 class="card-header justify font-weight-normal" style="background-color: #ff4444;height: 100px;">Login Status</h1>
									<div class="card-body">
										<div class="alert alert-primary" role="alert">
										 	Password Or Email is Wrong, try again.. 
										</div>
										<button class="btn btn-danger" onclick="goBack()">Go Previous</button>
									</div>
								</div>
							</div>
						<?php
							exit();
						}
						else if($passcheck == true)  //$password == $row['password']
						{	
							$_SESSION['user_firstname'] = $row['firstname'];
							$_SESSION['user_lastname'] = $row['lastname'];
							$_SESSION['user_email'] = $row['email'];
							$_SESSION['user_phone'] = $row['phone'];
							
							header("Location: ".$_SERVER['HTTP_REFERER']."?login=correct");
							//header("Location: ../property/customer.php?login=correct");
							
							exit();
						}
					}
				}
			}
		}
	}
	else
	{
		header("Location: ../index/index.php?signup=error");
		exit();
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