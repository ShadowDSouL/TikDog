<?php
    session_start();
    include_once('conn.php');
    $adopterID = (int)$_GET['UserID'];
    $petID = (int)$_GET['PetID'];
    $sql_read = "UPDATE `adopter` SET `Notification` = 'Read' WHERE `AdopterID` = '$adopterID' AND `PetID` = '$petID'";
    mysqli_query($conn,$sql_read);
    header('location:adopter.php');
?>