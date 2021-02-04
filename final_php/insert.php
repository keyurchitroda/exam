<?php
include "connection.php";
    session_start();

if(!isset($_SESSION["user"]))
{
    header('Location: login.php');
} 
  
    if(isset($_POST["btnInsert"]) != null)
    {
        $prodname=$_POST["pname"];
        $prodadd = $_POST["padd"];
        $img_path ="images/".$_FILES["file_upload"]["name"];

        if(move_uploaded_file($_FILES["file_upload"]["tmp_name"],$img_path))
        {
            echo "image added succesfully";
        }

        $query = "insert into tblproduct(name,address,image) values('$prodname','$prodadd','$img_path') ";

        $res = mysqli_query($conn,$query);

        if($res)
        {
            echo "inserted successfully..!";
            header("location: display.php");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION["user"] ?></h1>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="pname" placeholder="Product Name"/><br><br>
        <input type="text" name="padd" placeholder="Product Address"/><br><br>
        <input type="file" name="file_upload"/><br><br>
        <input type="submit" name="btnInsert" value="Insert"/><br>
    </form>

</body>
</html>