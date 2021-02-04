<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
</head>
<body>
	<center>
		<form method="post">
			<a href="./registation.php">Registor page</a>
			<table border="1">
				<tr>
					<td>E_mail</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="text" name="password"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="btn_login" value="Login"></td>
				</tr>
			</table> 
		</form>
	</center>	
</body>
</html>

<?php
session_start();
include('./connection.php');

if (isset($_POST['btn_login'])) {
	
	$email=$_POST['email'];
	$password=$_POST['password'];

	$query="select * from student where email='$email' and password='$password'";
	$result=mysqli_query($con,$query);

	while ($row=mysqli_fetch_assoc($result)) {
		$_SESSION['email']=$row['email'];
	}

	if ($_SESSION['email']) {
		header('Location: admin/index.php');
	} else {
		header('Location: admin/index.php');
	} 
	
} 

?>