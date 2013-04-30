<?php
/* login.php */
session_start();
if (isset($_SESSION["junglebook_login"]))
{
	header ('Location: /junglebook/home/');
	return ;
}

$user_name = $_REQUEST["username"];
$password = $_REQUEST["password"];

// TODO: Validate username+password and then only connect to database

$con=mysqli_connect("127.0.0.1","root","alohomora","junglebook");
// Check connection
if (mysqli_connect_errno($con))
{
// TODO: Replace this with proper error handling like throwing alert messages- Server Err
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$new_user_sql_format = "SELECT password FROM users WHERE username = '%s'";
$new_user_sql = sprintf($new_user_sql_format, $user_name);

$result = mysqli_query($con, $new_user_sql);

$login_user_row = mysqli_fetch_array($result);
if ($login_user_row['password'] == $password)
{
	//Login Success
	mysqli_close($con);
	$_SESSION["junglebook_login"] = $user_name;
	header ('Location: /junglebook/home/');
}
else
{
	//Login Fail
	mysqli_close($con);
	header ('Location: /junglebook/');
}

?>