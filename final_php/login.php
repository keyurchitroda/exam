<?php 
    session_start();
    include "connection.php";
    $errmsg="";
    if(isset($_POST["btnLogin"]) != null)
    {
        $errmsg="";
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "select * from tbluser where email='$email' and password='$password'";

        $result=mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            $_SESSION["user"] = $row["email"];
            $_SESSION["pass"] = $row["password"];
            header("location: insert.php");
        }
        $errmsg="invalid email or password";

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
    <form method="POST">
        <input type="text" name="email" placeholder="Email"/><br>
        <input type="text" name="password" placeholder="Password"/><br>
        <input type="submit" name="btnLogin" value="Login"/>
    </form>
</body>
</html>