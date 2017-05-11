<html>
<head>
	<title>JDC Group Admin</title>
</head>
<body>
<h1>JDC Groupe Admin Login</h1>
<?php
session_start();
if (!isset($_POST['submit'])){
?>
<!-- The HTML login form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="password" /><br />

		<input type="submit" name="submit" value="Login" />
	</form>
<?php
} else {
	require_once("connect.inc");
	

	$username = $_POST['username'];
	$password = $_POST['password'];
	$hash_password = hash('sha256', $password);
	
	$sql = "SELECT * from userAccounts WHERE username LIKE '{$username}'";
	$result = $conn->query($sql);
	$row = $result-> fetch_assoc();
//echo $hash_password;
echo "haha".  $row['password'];

	if($row["password"] == $hash_password){
		echo "<p>Logged in successfully</p>";
	echo $hash_password;	
	$_SESSION['username'] = $username;
	header("Location: admin.php");
		}
	
}
?>		
</body>
</html>
