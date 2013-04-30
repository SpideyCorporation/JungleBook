<?php
session_start();
if (!isset($_SESSION["junglebook_login"]))
{
	header ("Location: /junglebook/");
	return ;
}

$username = $_SESSION["junglebook_login"];
$con=mysqli_connect("127.0.0.1","root","alohomora","junglebook");

// Check connection
if (mysqli_connect_errno($con))
{
	// TODO: Replace this with proper error handling like throwing alert messages- Server Err
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user_info_sql_format = "SELECT firstname,lastname FROM users WHERE username = '%s'";
$user_info_sql = sprintf($user_info_sql_format, $username);

$result = mysqli_query($con, $user_info_sql);

if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}

$login_user_row = mysqli_fetch_array($result);

$user_first_name = $login_user_row['firstname'] . " " . $login_user_row['lastname'];

mysqli_close($con);
?>
<html>
<head>
<title>JungleBook | Home</title>
</head>
<body>
<h1>Welcome <?php echo $user_first_name ?> to the Jungle Home</h1>
<a href="/junglebook/logout/" title="Logout">Logout</a>
</body>
</html>