<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'realestate';

$conn = mysqli_connect($hostname, $username, $password, $database);

/*$visit_s_query = "SELECT * FROM visitor_table";

$result = mysqli_query($conn,$visit_s_query);

if (!($row = mysqli_fetch_assoc($result))) {
	$view = 1;
	$visit_i_query = "INSERT INTO visitor_table(`view`) VALUES ('$view')";
  	mysqli_query($conn,$visit_i_query);
}

if (!isset($_COOKIE['viewvisit'])) {
  $time = time() + 18000;
  $cookie_value = md5('trickbuzz');
  setcookie('viewvisit',$cookie_value,$time);
  $visit_u_query = "UPDATE visitor_table SET `view`=`view`+1";
  mysqli_query($conn,$visit_u_query); 
}*/

?>