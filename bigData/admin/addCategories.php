<!DOCTYPE html>
<html>
<head>
	<title>Add Categories</title>
</head>
<body>
	<table border="1">
		<form method="post" enctype="multipart/form-data">
			<tr>
				<td>Categories Name</td>
				<td>
					<input type="text" name="cate_name">
				</td>
			</tr>
			<tr>
				<td>Price</td>
				<td>
					<input type="text" name="price">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="btn_add" value="Add">
				</td>
			</tr>
		</form>
	</table>
</body>
</html>

<?php
session_start();
include('../connection.php');

if (isset($_POST['btn_add'])) {
	$cate_name=$_POST['cate_name'];
	$price=$_POST['price'];
	
	$result="insert into categories(cate_name,price) values('$cate_name','$price')";
	$query=mysqli_query($con,$result);

	// $_SESSION['cate_name']=$cate_name;
	if ($query) {
		header("Location: listCategories.php");
	} else {
		echo "Error in categories ".$query;
	}
	
}

?>