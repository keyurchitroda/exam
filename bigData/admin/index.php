<?php
 session_start();
 include('../connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
</head>
<body>
 <center>
 	<h1><?php echo $_SESSION['email'] ?></h1>
 </center>
	<a href="../logout.php">Logout</a><br/>
	<a href="./addCategories.php">Add Categories</a> | <a href="./listCategories.php">List Categories</a>
</body>
</html>