<?php
/* signup.php */
$con=mysqli_connect("127.0.0.1","root","alohomora","junglebook");
// Check connection
if (mysqli_connect_errno($con))
{
// TODO: Replace this with proper error handling like throwing alert messages- Server Err
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query_user_name = $_GET["user_available"];
if (isset($query_user_name))
{
	$query_user_sql_format = "SELECT username FROM USERS WHERE USERNAME = '%s'";
	$result = mysqli_query($con, sprintf($query_user_sql_format, $query_user_name));
	$user_row = mysqli_fetch_array($result);
	sleep(1);
	if (isset($user_row["username"]))
	{
		echo "UserName Already Taken. Try Another One!!";
	}
	else
	{
		echo "User Available";
	}
	mysqli_close($con);
	return ;
}

$username = $_REQUEST["username"];
$first_name = $_REQUEST["firstname"];
$last_name = $_REQUEST["lastname"];
$password = $_REQUEST["password"];
$email = $_REQUEST["email"];

$new_user_sql_format = "INSERT INTO USERS (username, password, firstname, lastname, email)"
						 . " VALUES ('%s', '%s', '%s', '%s', '%s')";
						 
$new_user_sql = sprintf($new_user_sql_format, $username, $password, $first_name, $last_name, $email);

mysqli_query($con, $new_user_sql);
mysqli_close($con);

// TODO: Replace all urls with variables placed in a php file
session_start();
$_SESSION["junglebook_login"] = $username;
header ('Location: /junglebook/login/');

?>