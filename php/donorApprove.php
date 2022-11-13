<?php
    session_start();
    include_once('conn.php');
    $petID = $_GET['PetID'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date("Y-m-d h:i:s a", time());

    $sql_adopted = "UPDATE `pets` SET `PetStatus`='Adopted' WHERE PetsID = '$petID'";
    // $sql_approve = "UPDATE `donor` SET `Approval` = 'approve' WHERE PetID='$petID'";
    mysqli_query($conn,$sql_adopted);

    $sql_getAdopterID = "SELECT AdopterID FROM pets WHERE PetsID = '$petID'";
    $result = mysqli_query($conn, $sql_getAdopterID);
    $adopter_data = mysqli_fetch_assoc($result);
    $adopterID = $adopter_data['AdopterID'];

    $sql_adopterTable = "INSERT INTO `adopter`(`AdopterID`, `PetID`,`AdoptTime`, `Notification`)
                    VALUES ('$adopterID','$petID','$date', 'Unread')";
    mysqli_query($conn,$sql_adopterTable);
    header("location:donor.php?donate=2");
?>