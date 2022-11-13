<?php
    session_start();
    include_once("conn.php");
    if(isset($_FILES["filename"]["name"])){
        $userID = $_SESSION['userID'];
        $name = ucwords($_POST['name']);
        $age = $_POST['age'];
        $body = ucwords($_POST['body']);
        $species = ucwords($_POST['species']);
        $color = ucwords($_POST['color']);
        $condition = ucwords($_POST['condition']);
        $gender = ucfirst($_POST['gender']);
        $vaccinated = ucfirst($_POST['vaccinated']);
        $dewormed = ucfirst($_POST['dewormed']);
        $spayed = ucfirst($_POST['spayed']);
        $description = ucfirst($_POST['description']);
  
        $imageName = $_FILES["filename"]["name"];
        $imageSize = $_FILES["filename"]["size"];
        $tmpName = $_FILES["filename"]["tmp_name"];
  
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));


            
        
        $sql_1 = "INSERT INTO `pets`(`PetName`, `PetBody`, `Color`, `Vaccinated`, `Spayed`, `Species`, `Gender`, `PetCondition`, `Dewormed`, `Image`, `PetAge`, `PetStatus`, `DonorID`, `AdopterID`, `Description`) 
                VALUES  ('$name','$body','$color','$vaccinated','$spayed','$species','$gender','$condition','$dewormed','$imageName','$age','Available','$userID','0','$description')";
        mysqli_query($conn, $sql_1);
        move_uploaded_file($tmpName, '../petimg/' . $imageName);

        $sql_2 = "SELECT PetsID 
                FROM pets 
                GROUP BY PetsID
                ORDER BY PetsID DESC
                LIMIT 1";
        $result = mysqli_query($conn,$sql_2);

        $petdata = mysqli_fetch_assoc($result);
        $petID = $petdata['PetsID'];
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date = date("Y-m-d h:i:s a", time());

        $sql_3 = "INSERT INTO `donor`(`DonorID`,`PetID`,`DonateTime`)
                VALUES ('$userID','$petID','$date')";
        mysqli_query($conn, $sql_3);

        header("location: donor.php?donate=1");
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Pet</title>
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .wrapper {
            width: 1000px;
            display: grid;
            justify-content: center;
            margin: 0 auto;
            margin-top: 10px;
            background-color: #fff;
        }

        .wrapper2{
            background-color: rgb(255,182,193);
            padding: 15px;
            margin-top: 20px;
            border-radius: 10px;
        }
        .wrapper2 input{
            border-radius: 5px;
        }

        input[type='reset']{
            background-color:black;
            border: 3px solid black;
            float: right;
            padding: 5px;
            width: 80px;
            color: white;
        }

        input[type='reset']:hover{
            cursor: pointer;
            background-color: white;
            color: black;
        }

        input[type='submit']{
            background-color:white;
            border: 3px solid black;
            float: right;
            padding: 5px;
            width: 80px;
            color: black;
        }

        input[type='submit']:hover{
            cursor: pointer;
            background-color: black;
            color: white;
        }

        button[type='button']{
            float: left;
            background-color:black;
            border: 3px solid black;
            padding: 5px;
            width: 80px;
            color: 	rgb(255,105,180);
            border-radius: 5px;
        }

        button[type='button']:hover{
            background-color: rgb(255,105,180);
            color: black;
            cursor: pointer;
            border: 3px solid pink;
        }
        
        .leftBtn{
            margin-left: 10px;
        }
        .rightBtn{
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="wrapper">
        <div class="wrapper2">
        <h1><i>New Pet</i> </h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <table cellspacing="10">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Age</b></td>
                </tr>
                <tr>
                    <td><input type="text" name="name" required></td>
                    <td><input type="text" name="age" required></td>
                </tr>
                <tr>
                    <td><b>Body</b></td>
                    <td><b>Species</b></td>
                </tr>
                <tr>
                    <td><input type="text" name="body" required></td>
                    <td><input type="text" name="species" required></td>
                </tr>
                <tr>
                    <td><b>Color</b></td>
                    <td><b>Condition</b></td>
                </tr>
                <tr>
                    <td><input type="text" name="color" required></td>
                    <td><input type="text" name="condition" required></td>
                </tr>
                <tr>
                    <td><b>Gender</b></td>
                    <td><b>Vaccinated</b></td>
                </tr>
                <tr>
                    <td><input type="radio" name="gender" value="Male"><b><i>Male</i></b><input type="radio" name="gender" value="Female" required><b><i>Female</i></b></td>
                    <td><input type="radio" name="vaccinated" value="Yes"><b><i>Yes</i></b> <input type="radio" name="vaccinated" value="No" required><b><i>No</i></b></td>

                </tr>
                <tr>
                    <td><b>Dewormed</b></td>
                    <td><b>Spayed</b></td>
                </tr>
                <tr>
                    <td><input type="radio" name="dewormed" value="Yes"><b><i>Yes</i></b> <input type="radio" name="dewormed" value="No" required><b><i>No</i></b></td>
                    <td><input type="radio" name="spayed" value="Yes"><b><i>Yes</i></b> <input type="radio" name="spayed" value="No" required><b><i>No</i></b></td>
                </tr>
                <tr>
                    <td><b>Image</b></td>
                </tr>
                <tr>
                    <td><input style="border-radius:0 ;" type="file" name="filename" required></td>
                </tr>
                <tr>
                    <td><b>Description</b></td>
                </tr>
                <tr>
                    <td colspan="2"><textarea name="description" id="" cols="60" rows="5" required></textarea></td>
                </tr>   
            </table>
            <div class="allBtn">
                <div class="leftBtn">
                    <button type="button" onclick="history.back()">Back</button>
                </div>

                <div class="BtnWrapper">
                    <div class="rightBtn">
                        <input type="submit"  value="Donate" name="addpet"> 
                        <input type="reset">
                    </div>
                </div>
                

            </div>
            
        

          
        </form>
        </div>
    </div>
    
</body>
</html>