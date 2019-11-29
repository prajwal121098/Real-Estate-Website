<?php 
	header('Content-Type: application/json');
	include_once('database.php');

	if( isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone'])){

		$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		
		if (empty($firstname)){
			$nameError = "First Name is required";
		} else{
			$firstname = test_input($firstname); // check name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$firstname)){
				$firstnameError = "Only letters and white space allowed";
			}
		} // Checking null values in firstname.

		if (empty($lastname)){
			$nameError = "Last Name is required";
		} else{
			$lastname = test_input($lastname); // check name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$lastname)){
				$lastnameError = "Only letters and white space allowed";
			}
		} // Checking null values in lastname.

		if (empty($email)){
			$emailError = "Email is required";
		} else{
			$email = test_input($email);
			$email =filter_var($email, FILTER_SANITIZE_EMAIL);
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		} // Checking null values in email.

		if(empty($password)){
			$password = "Password is required";
		} else {
			$password = test_input($password);
			if(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,15}$/", $password)) {
			    $passwordError = "Minimum 8 digits";
			}
		} // Checking null values in password.

		if (empty($phone)){
			$phoneError = "Email is required";
		} else{
			$phone = test_input($phone);
			if(!preg_match("/^[0-9]{10}+$/", $phone)){
				$phoneError = "Only number is required";
			}
		} // Checking null values in phone.
		
		if( !($firstname=='') && !($lastname=='') && !($email=='') && !($password=='') & !($phone=='') ){ // Checking valid email.
			$to = $email; // this is the visiter Email address
	        $from = "prajwalkhanke10@gmail.com"; // this is sender Email address 
	                          
	        //$subject = "Copy of your Contact-us submission";
	        $subject2 = "Register Verification";

	        $otp = rand(10000,99999);                          
	        
	        //$message = "Message from ".$email."\nMessage is ...  ".$message;
	        $message2 = "Hi ".$to."\n"."Here is your One Time Password is :  ".$otp;

	        //$headers = "From:" . $to;
	        $headers2 = "From:" . $from;
	                            
	        //$webmail = mail($from,$subject,$message,$headers);
	        //$sendmail = mail($to,$subject2,$message2,$headers2); //sending mail to user
			$result_data = array();

			if(!$sendmail){
				$result_data['status'] = 0;
				$result_data['otp'] = null;
				echo json_encode($result_data);
			}else {
				$result_data['status'] = 1;
				$result_data['otp'] = $otp;
				echo json_encode($result_data);
			}
		}
	}
	function test_input($data)
	{
		$data =trim($data);
		$data =stripslashes($data);
		$data =htmlspecialchars($data);
		return $data;
	}
?>