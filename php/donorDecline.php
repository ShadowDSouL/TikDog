<?php 
    session_start();
    include_once('conn.php');

    $petID = $_GET['PetID'];
    $sql_decline = "UPDATE `pets` SET `PetStatus` = 'Available', `AdopterID`='0' WHERE PetsID = '$petID' ";
    mysqli_query($conn,$sql_decline);
    header("location:donor.php?donate=3");
?>