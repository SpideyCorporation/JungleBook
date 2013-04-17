<?php
/* signup.php */
$con=mysqli_connect("127.0.0.1","root","alohomora","junglebook");
// Check connection
if (mysqli_connect_errno($con))
{
// TODO: Replace this with proper error handling like throwing alert messages- Server Err
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user_name = $_REQUEST["username"];
$name = $_REQUEST["firstname"] . $_REQUEST["lastname"];
$password = $_REQUEST["password"];
$email = $_REQUEST["email"];

$new_user_sql_format = "INSERT INTO USERS (username, password) VALUES ('%s', '%s')";
$new_user_sql = sprintf($new_user_sql_format, $user_name, $password);

mysqli_query($con, $new_user_sql);
header ('Location: home.html');
mysqli_close($con);

?>