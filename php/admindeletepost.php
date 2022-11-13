<?php 

    session_start();


    include_once("conn.php");

    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];

        $sql_delete = "DELETE FROM announcement WHERE `AnnouncementID`='$id'";
        $result = mysqli_query($conn,$sql_delete);
        
        header("Location: adminnewpost.php?type=1");
         
    }


    mysqli_close($conn)
?>