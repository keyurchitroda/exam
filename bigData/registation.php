<!DOCTYPE html>
<html>
<head>
	<title>Registation</title>
</head>
<body>
	<center>
		<form method="post">
			<a href="./login.php">login page</a>
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
					<td><input type="submit" name="btn_register" value="Register"></td>
				</tr>
			</table> 
		</form>
	</center>
</body>
</html>

<?php

include('./connection.php');


if (isset($_POST['btn_register'])) {
	
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$query="insert into student(email,password) values('$email','$password')";
	$result=mysqli_query($con,$query);

	// echo $result;

	if ($result) {
		header("Location: ./login.php");
	} else {
		echo "Query is not work"+$result;
	}
	
} 

?>