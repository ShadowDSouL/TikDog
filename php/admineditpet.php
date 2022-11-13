<?php include_once("conn.php") ?>
<?php

if(isset($_POST["update_pet"])){
    $id = mysqli_real_escape_string($conn,$_POST['editpetID']);
    $name = mysqli_real_escape_string($conn,$_POST['editname']);
    $species = mysqli_real_escape_string($conn,$_POST['editspecies']);
    $gender = mysqli_real_escape_string($conn,$_POST['editgender']);
    $age = mysqli_real_escape_string($conn,$_POST['editage']);
    $condition = mysqli_real_escape_string($conn,$_POST['editcondition']);
    $body = mysqli_real_escape_string($conn,$_POST['editbody']);
    $color = mysqli_real_escape_string($conn,$_POST['editcolor']);
    $location = mysqli_real_escape_string($conn,$_POST['editlocation']);
    $description = mysqli_real_escape_string($conn,$_POST['editdescription']);
    $vaccinated = mysqli_real_escape_string($conn,$_POST['editvaccinated']);
    $dewormed = mysqli_real_escape_string($conn,$_POST['editdewormed']);
    $spayed = mysqli_real_escape_string($conn,$_POST['editspayed']);
    $status = mysqli_real_escape_string($conn,$_POST['editstatus']);
    $donorID = mysqli_real_escape_string($conn,$_POST['editdonorID']);

    if($name == NULL || $species == NULL || $gender == NULL || $age == NULL || $condition == NULL || $body == NULL || $color == NULL 
        || $location == NULL || $description == NULL || $vaccinated == NULL || $dewormed == NULL || $spayed == NULL || $status == NULL){
        $res = [
            'status' => 0,
            
        ];
        echo json_encode($res);
        return false;
    }

    $sql = "UPDATE `pets` SET `PetName` = '$name', `PetBody` = '$body', `Color` = '$color', `Vaccinated` = '$vaccinated',
            `Spayed` = '$spayed', `Species` = '$species', `Gender` = '$gender', `PetCondition` = '$condition',
            `Dewormed` = '$dewormed', `PetAge` = '$age', `Description` = '$description', `PetStatus` = '$status' WHERE PetsID = $id ";
    
    $result = mysqli_query($conn,$sql);
    $sql2 = "UPDATE `user` SET `Location` = '$location' WHERE UserID = $donorID";
    $result2 = mysqli_query($conn,$sql2);

    if($result && $result2){
        $res =[
            'status' => 1,
            'message' => 'Updated Successfully'
            
        ];
        
        echo json_encode($res);
        return false;

    }else{
        $res =[
            'status' => 2,
            'message' => 'Not Updated'
        ];
        echo json_encode($res);
        return false;

    }
}




if(isset($_GET['petID'])){
    $id = mysqli_real_escape_string($conn,$_GET['petID']);


    $sql = "SELECT pets.PetsID, pets.PetName, pets.PetBody, pets.Color, pets.Vaccinated, pets.Spayed, pets.Species, pets.Gender, pets.PetCondition, pets.Dewormed, pets.Image, pets.PetAge, pets.PetStatus, pets.DonorID, pets.AdopterID, pets.Description, user.UserID, user.Location 
            FROM pets
            INNER JOIN user
            ON pets.DonorID = user.UserID
            WHERE PetsID = $id ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
        $pet = mysqli_fetch_array($result);

        $res = [
            'status' => 444,
            'message' => 'Pet ID Get',
            'data' => $pet
        ];
        echo json_encode($res);
        return false;
    
    }else{
        $res = [
            'status' => 404,
            'message' => 'Pet ID not found'
        ];
        echo json_encode($res);
        return false;
    }

} 






?>





