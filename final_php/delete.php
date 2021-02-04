<?php 
    session_start();
    include "connection.php";

    if(isset($_GET['id']))
    {
        $pid = $_GET['id'];

        $query="delete from tblproduct where id='$pid'";

        $res=mysqli_query($conn,$query);

        if($res)
        {
            header("location: display.php");
        }
    }

?>