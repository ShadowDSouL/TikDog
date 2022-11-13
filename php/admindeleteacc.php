<?php 

    session_start();


    include_once("conn.php");

    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];

        $sql_delete = "DELETE FROM user WHERE `UserID`='$id'";
        $result = mysqli_query($conn,$sql_delete);

        header("Location: adminaccount.php?del=1");
         
    }


    mysqli_close($conn)
?>