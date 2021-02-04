<?php 
    session_start();
    include "connection.php";

    if(isset($_POST["btnUpdate"]))
    {
        $pid =$_POST['id'];
        $prodname=$_POST["pname"];
        $prodadd = $_POST["padd"];
        $img_path ="images/".$_FILES["file_upload"]["name"];

        if(move_uploaded_file($_FILES["file_upload"]["tmp_name"],$img_path))
        {
            echo "image added succesfully";
        }

        $query = "update tblproduct set name='$prodname',address='$prodadd',image='$img_path' where id='$pid' ";

        $res = mysqli_query($conn,$query);

        $row= mysqli_fetch_array($res);

    }
?>

6

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        <input type="text" name="pname" placeholder="Product Name" value="<?php echo $row['name']; ?>"/><br><br>
        <input type="text" name="padd" placeholder="Product Address" value="<?php echo $row['address']; ?>"/><br><br>
        <input type="file" name="file_upload" value="<?php echo $row['image ']; ?>"/><br><br>
        <input type="submit" name="btnUpdate" value="Insert"/><br>
    </form>
</body>
</html>