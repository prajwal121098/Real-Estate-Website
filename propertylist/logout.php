<?php
	session_start();

	if (isset($_POST['logout'])) {
		session_unset();
		session_destroy();
		//header("Location: ../property/property.php");
		header("Location:".$_SERVER['HTTP_REFERER']);
	}
?>  