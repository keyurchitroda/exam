<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome</h1>

    <form>
        <table border="2">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Images</th>
            </tr>

            <?php 
                include "connection.php";
                $query = "select * from tblproduct";
                $res= mysqli_query($conn,$query);

                while($row=mysqli_fetch_array($res))
                {
            ?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><img src="<?php echo $row['image'] ?>" width="100px" height="100px" /></td>
                        <td><a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                        <td><a href="update.php?id=<?php echo $row['id'] ?>">Edit</a></td>

                    </tr>
              <?php  } ?>
        </table>
    </form>

</body>
</html>