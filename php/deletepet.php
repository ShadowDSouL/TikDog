<?php
    session_start();
    include_once('conn.php');
    // The type = post, set in mainapage
    // Get the type and post id from the urls
    if(isset($_GET['PetID'])){
        $petID = (int)$_GET['PetID'];
        // detele the post which matches the selected post id 
        $sql_delete1 = "DELETE FROM pets WHERE `PetsID`='$petID'";
        $sql_delete2 = "DELETE FROM donor WHERE `PetID`='$petID'";
        mysqli_query($conn,$sql_delete1);
        mysqli_query($conn,$sql_delete2);
        header("Location: donor.php");
             
    }
    mysqli_close($conn);
?>