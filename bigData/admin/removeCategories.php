<!DOCTYPE html>
<html>
<head>
	<title>Remove Categories</title>
</head>
<body>
	<?php 
		include('../connection.php');

		if (isset($_GET['id'])) {
			$cate_id=$_GET['id'];

			$query="delete from categories where cate_id='$cate_id'";
			$result=mysqli_query($con,$query);

			if ($result) {
				header("Location: listCategories.php");
			} else {
				echo "Error Remove Categories ".$result;
			}
			
		} 
		
	?>
</body>
</html>