<?php
/* login.php */
$con=mysqli_connect("127.0.0.1","root","alohomora","junglebook");
// Check connection
if (mysqli_connect_errno($con))
{
// TODO: Replace this with proper error handling like throwing alert messages- Server Err
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user_name = $_REQUEST["username"];
$password = $_REQUEST["password"];

$new_user_sql_format = "SELECT password FROM users WHERE username = '%s'";
$new_user_sql = sprintf($new_user_sql_format, $user_name);

$result = mysqli_query($con, $new_user_sql);

$login_user_row = mysqli_fetch_array($result);
if ($login_user_row['password'] == $password)
{
	//Login Success
	header ('Location: home.html');
}
else
{
	//Login Fail
	header ('Location: index.html');
}

mysqli_close($con);

?>