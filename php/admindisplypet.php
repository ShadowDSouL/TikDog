<?php include_once("conn.php")?>
<?php

if(isset($_GET['petID'])){
    $id = mysqli_real_escape_string($conn,$_GET['petID']);


    $sql = "SELECT pets.PetsID, pets.PetName, pets.PetBody, pets.Color, pets.Vaccinated, pets.Spayed, pets.Species, pets.Gender, pets.PetCondition, pets.Dewormed, pets.Image, pets.PetAge, pets.PetStatus, pets.DonorID, pets.AdopterID, pets.Description, user.UserID, user.Location 
            FROM pets
            INNER JOIN user
            ON pets.DonorID = user.UserID 
            WHERE PetsID = $id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
        $pets = mysqli_fetch_array($result);

        $res = [
            'status' => 444,
            'message' => 'Pet ID Get',
            'data' => $pets
        ];
        echo json_encode($res);
        return false;
    
    }else{
        $res = [
            'status' => 404,

        ];
        echo json_encode($res);
        return false;
    }

} 



?>