<?php
 include('../connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Categories List</title>
</head>
<body>
	<center>
		<a href="./index.php">Index</a>
		<table border="1">
			<tr>
				<td>Cate_id</td>
				<td>Cate_name</td>
				<td>Price</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
			<?php
				session_start();

				// $cate_name=$_SESSION['cate_name'];
				// $query="select * from categories where cate_name='$cate_name'";
				$query="select * from categories";
				$result=mysqli_query($con,$query);

				while ($row=mysqli_fetch_assoc($result)) { ?>
					<tr>
						<td><?php echo $row['cate_id'] ?></td>
						<td><?php echo $row['cate_name'] ?></td>
						<td><?php echo $row['price'] ?></td>
						<td>
							<a href="removeStudent.php?id=<?php echo $row['stud_id'] ?>">Edit</a>
						</td>
						<td>
							<a href="removeCategories.php?id=<?php echo $row['cate_id'] ?>">Delete</a>
						</td>
					</tr>
				<?php } ?>
			<tr>
				
			</tr>
		</table>
	</center>
</body>
</html>